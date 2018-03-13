<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Avaliar extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
        redirect ("home");
      }
      $this->load->model('avaliar_model');
      $this->load->model('unidade_model');
    }

    public function index()
    {
      $id = $this->session->userdata('id_professor');
      $data['unidades']       = $this->unidade_model->listarUnidades();
      $data['avaliacoes']     = $this->avaliar_model->listarAvaliacoes($id);
      $this->load->view('home2_header_view');
      $this->load->view('avaliar_professor_view',$data);
      $this->load->view('home2_footer_view');
    }

    public function insert()
    {
        $this->avaliar_model->insert();
        $this->session->set_flashdata('msg','Registro inserido com sucesso!');
        redirect('avaliar/index');
    }

    public function relatorios()
    {
      $this->load->view('home2_header_view');
      $this->load->view('avaliar_relatorios_view');
      $this->load->view('home2_footer_view');
    }

    public function gerarRelatorioExcel()
    {
        $id = $this->session->userdata('id_professor');
        $flag = $this->input->post('click');
        //$data['avaliacoes'] = $this->avaliar_model->listarAvaliacoes($id);
        
        if( $flag == 'sim')
        {

            // Incluimos a classe PHPExcel
            include  "'".base_url()."assets/phpexcel/Classes/PHPExcel.php'";

            // Instanciamos a classe
            $objPHPExcel = new PHPExcel();

            // Definimos o estilo da fonte
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            // Criamos as colunas
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Listagem de Credenciamento' )
                        ->setCellValue('B1', "Nome " )
                        ->setCellValue("C1", "Sobrenome" )
                        ->setCellValue("D1", "E-mail" );

            // Podemos configurar diferentes larguras paras as colunas como padrão
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(90);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

            // Também podemos escolher a posição exata aonde o dado será inserido (coluna, linha, dado);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 2, "Fulano");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 2, " da Silva");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 2, "fulano@exemplo.com.br");

            // Exemplo inserindo uma segunda linha, note a diferença no segundo parâmetro
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 3, "Beltrano");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 3, " da Silva Sauro");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 3, "beltrando@exemplo.com.br");

            // Podemos renomear o nome das planilha atual, lembrando que um único arquivo pode ter várias planilhas
            $objPHPExcel->getActiveSheet()->setTitle('Credenciamento para o Evento');

            // Cabeçalho do arquivo para ele baixar
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="arquivo_de_exemplo01.xls"');
            header('Cache-Control: max-age=0');
            // Se for o IE9, isso talvez seja necessário
            header('Cache-Control: max-age=1');

            // Acessamos o 'Writer' para poder salvar o arquivo
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

            // Salva diretamente no output, poderíamos mudar arqui para um nome de arquivo em um diretório ,caso não quisessemos jogar na tela
            $objWriter->save('php://output'); 

            exit;
        }

    }

    public function getAvaliacao()
    {
        $id_avaliador = $this->input->post('id_avaliador');
        $id_avaliado  = $this->input->post('id_avaliado');

        $data['avaliacoes'] = $this->avaliar_model->listarAvaliacoes($id_avaliador);
        $data['avaliacao']  = $this->avaliar_model->getAvaliacao($id_avaliador,$id_avaliado);
        
        $data['c'] = 1;

        $this->load->view('home2_header_view');
        $this->load->view('avaliar_relatorios_view',$data);
        $this->load->view('home2_footer_view');
    }

}


/* End of file avaliar.php */
/* Location: ./application/controllers/avaliar.php */
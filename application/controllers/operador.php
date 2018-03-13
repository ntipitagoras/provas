<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Operador extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
        redirect ("home");
      }
    }

    public function index()
    {
      $this->load->model('curso_model','curso');
      $this->load->library('table');


      $data['cursos'] = $this->curso->list_curso();
      $this->load->view('home2_header_view');
      $this->load->view('operador_view',$data);
      $this->load->view('home2_footer_view');
    }

    public function list_prova_id_curso(){
      
      $this->load->model('operador_model','operador');
      $this->load->model('curso_model','curso');

      $id_curso           = $this->input->post('curso');
      $data['cursos']     = $this->curso->list_curso();
      $data['documentos'] = $this->operador->get_documento($id_curso);
      $data['provas']     = $this->operador->list_prova_id_curso($id_curso);

      $this->load->view('home2_header_view');
      $this->load->view('operador_view',$data);
      $this->load->view('home2_footer_view');
    }

    public function add_documento(){

      $this->load->model('operador_model','operador');
      $idProva     = $this->input->post('id_prova');
      $idCurso     = $this->input->post('id_curso');
      $idOperador  = $this->input->post('id_operador');

      if(isset($_POST['btnSubmit']))
      {
      
            //INFO DA PROVA
            $file     = $_FILES['userfile'];
            $numFile  = count(array_filter($file['name']));
            
            //PASTA
            $folder   = 'uploads/listas/2015.1/';
              
            //REQUISITOS
            $permite  = array('application/pdf');
            $maxSize  = 1024 * 1024 * 5;
              
            //MENSAGENS
            $msg    = array();
            $errorMsg = array(
              1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
              2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
              3 => 'o upload do arquivo foi feito parcialmente',
              4 => 'Não foi feito o upload do arquivo'
            );

            $path = '';
              
            if( $numFile > 0 )
            {
              for($i = 0; $i < $numFile; $i++)
              {
                $name   = $file['name'][$i];
                $type   = $file['type'][$i];
                $size   = $file['size'][$i];
                $error  = $file['error'][$i];
                $tmp    = $file['tmp_name'][$i];
            
                $extensao = @end(explode('.', $name));
                $novoNome = rand().".$extensao";
                  
                if($error != 0){
                  $msg[] = "<strong>$name :</strong> ".$errorMsg[$error];
                }elseif(!in_array($type, $permite)){
                  $msg[] = "<strong>$name :</strong> Erro imagem não suportada!";
                }elseif($size > $maxSize){
                  $msg[] = "<strong>$name :</strong> Erro imagem ultrapassa o limite de 5MB";
                }else{
                  if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
                    $msg[] = "<strong>$name :</strong> Upload Realizado com Sucesso!";
                    $path .=  $folder.''.$novoNome . "#";
                  }else{
                    $msg[] = "<strong>$name :</strong> Desculpe! Ocorreu um erro...";          
                  }
                }
                
                foreach($msg as $pop){
                  //echo $pop.'<br>';
                }

              }
            }
        }

        $total_arquivos = $numFile;

      if( $this->operador->add_documento($idOperador,$idProva,$idCurso,$path,$total_arquivos) ){
        redirect('operador/index');
      }else{
        die('Não foi possivel adicionar a prova');
      }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/operador.php */

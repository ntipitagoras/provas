<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prova extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
      redirect ("home");
    }
    $this->load->model('prova_model','provas');
    $this->load->model('curso_model','cursos');
    $this->load->model('periodo_model','periodos');
    $this->load->model('dia_model','dias');
    $this->load->model('turno_model','turnos');
    $this->load->model('disciplina_model','disciplinas');
    $this->load->model('tipo_model','tipos');
    $this->load->model('turma_model','turmas');
    $this->load->library('table');
  }

  public function index()
  {
  
    $id_professor = $this->session->userdata('id_professor');
    $data['periodos']     =  $this->periodos->list_periodo();
    $data['dias']         =  $this->dias->list_dia();
    $data['turnos']       =  $this->turnos->list_turno();
    $data['disciplinas']  =  $this->disciplinas->list_disciplina();
    $data['tipos']        =  $this->tipos->list_tipo();
    $data['provas']       =  $this->provas->get_prova($id_professor);
    $data['cursos']       =  $this->cursos->list_curso();
    $data['turmas']       =  $this->turmas->list_turma();
    $this->load->view('home2_header_view');
    $this->load->view('prova_view',$data);
    $this->load->view('home2_footer_view');
  }

  public function add_prova()
  {
        $this->load->model('prova_model','provas');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('curso','Curso','required');
        $this->form_validation->set_rules('nomeDisciplina','Nome da Disciplina','required');
        $this->form_validation->set_rules('turno','Turno','required');
        $this->form_validation->set_rules('dia','Dia da Semana','required');
        $this->form_validation->set_rules('periodo','Período','required');
        $this->form_validation->set_rules('tipo','Tipo de Prova','required');
        $this->form_validation->set_rules('qtdalunos','Quantidade de Alunos','required');

        if( $this->form_validation->run() == FALSE )
        {
          $this->index();
        }
        else
        {
          $idProfessor      = $this->session->userdata('id_professor');
          $idCurso          = $this->input->post('curso');
          $nomeDisciplina   = $this->input->post('nomeDisciplina');
          $idTurno          = $this->input->post('turno');
          $idDia            = $this->input->post('dia');
          $idPeriodo        = $this->input->post('periodo');
          $tipoProva        = $this->input->post('tipo');
          $turma            = $this->input->post('turma');
          $sala             = $this->input->post('sala');
          $qtdalunos        = $this->input->post('qtdalunos');
          $idStatus         = 1;
          //$path             = 'uploads/provas/2015.1/';
          $totalarquivos    = 1;
          $datahora         = date("Y-m-d H:i:s");

             if(isset($_POST['btnSubmit']))
             {
          
                //INFO DA PROVA
                $file     = $_FILES['userfile'];
                $numFile  = count(array_filter($file['name']));
                
                //PASTA
                if( $this->session->userdata('unidade') == 2 )
                {
                    $folder   = 'uploads/unidade_sao_luis/';  
                }
                
                  
                //REQUISITOS
                $permite  = array('application/pdf');
                $maxSize  = 1024 * 1024 * 2;
                  
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

                    if( $extensao <> 'pdf' || $extensao <> 'PDF' )
                    {
                        $id_professor = $this->session->userdata('id_professor');

                        $data['periodos']     =  $this->periodos->list_periodo();
                        $data['dias']         =  $this->dias->list_dia();
                        $data['turnos']       =  $this->turnos->list_turno();
                        $data['disciplinas']  =  $this->disciplinas->list_disciplina();
                        $data['tipos']        =  $this->tipos->list_tipo();
                        $data['provas']       =  $this->provas->get_prova($id_professor);
                        $data['cursos']       =  $this->cursos->list_curso();
                        $data['turmas']       =  $this->turmas->list_turma();
                        $this->session->set_flashdata('msg', 'O formato do arquivo é inválido, o formato deve ser do tipo <b>PDF</b>');

                        $this->load->view('home2_header_view');
                        $this->load->view('prova_view',$data);
                        $this->load->view('home2_footer_view');
                    }
                    if( $extensao == 'pdf' || $extensao == 'PDF' )
                    {
                      if( move_uploaded_file($tmp, $folder.'/'.$novoNome) )
                      {
                        $path .=  $folder.''.$novoNome . "#";  
                        $this->provas->add_prova($idProfessor,$idCurso,$nomeDisciplina,$idTurno,$idDia,$idPeriodo,$qtdalunos,$idStatus,$tipoProva,$turma,$path,$numFile,$datahora);
                        $this->session->set_flashdata('msg', 'Prova enviada com sucesso!');
                        redirect('prova');
                      }
                    }


                  }
                }
                else
                {
                  $id_professor = $this->session->userdata('id_professor');
                  $data['periodos']     =  $this->periodos->list_periodo();
                  $data['dias']         =  $this->dias->list_dia();
                  $data['turnos']       =  $this->turnos->list_turno();
                  $data['disciplinas']  =  $this->disciplinas->list_disciplina();
                  $data['tipos']        =  $this->tipos->list_tipo();
                  $data['provas']       =  $this->provas->get_prova($id_professor);
                  $data['cursos']       =  $this->cursos->list_curso();
                  $data['turmas']       =  $this->turmas->list_turma();
                  $this->session->set_flashdata('msg', 'Nenhum arquivo foi enviado!');
                  $this->load->view('home2_header_view');
                  $this->load->view('prova_view',$data);
                  $this->load->view('home2_footer_view');
                }
            }
        }
  }

  function mensagem_erro_envio_prova()
  {
    $this->load->view('mensagem_erro_envio_prova');
  }


}

/* End of file welcome.php */
/* Location: ./application/controllers/prova.php */
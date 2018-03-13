<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mensagem extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
      redirect ("home");
    }
    $this->load->model('mensagem_model','mensagem');
  }

  public function index()
  {
  }

  public function listarMensagem()
  {
      $data['mensagens']  = $this->mensagem->listarMensagem();

      $this->load->view('home2_header_view');
      $this->load->view('mensagem_view',$data);
      $this->load->view('home2_footer_view'); 
  }

  public function novaMensagem()
  {
    //Carregando o ckeditor_helper.php recém criado
      $this->load->helper('ckeditor'); 

      // Array com as configurações pra essa instância do CKEditor
      $data['ckeditor_mensagem'] = array(

                                        'id'   => 'mensagem',
                                        'path' => 'application/libraries/ckeditor',
                                        'config' => array
                                        (
                                            'toolbar' => "Full",
                                            'width'   => "100%",
                                            'height'  => "200px",
                                        )
      );

      $data['mensagens']  = $this->mensagem->listarMensagem();

      $this->load->view('home2_header_view');
      $this->load->view('mensagem_view',$data);
      $this->load->view('home2_footer_view'); 
  }

  public function cadastrarMensagem()
  {
    unset($_POST['btnSubmit']);
    $this->mensagem->cadastrarMensagem();
    $this->session->set_flashdata('msg', 'Mensagem inserida com Sucesso!');
    redirect('mensagem/novaMensagem');
  }

  public function removerMensagem($id)
  {
    $this->mensagem->removerMensagem($id);
    $this->session->set_flashdata('msg', 'Mensagem removida com Sucesso!');
    redirect('mensagem/novaMensagem');
  }


}

/* End of file welcome.php */
/* Location: ./application/controllers/Configuracao.php */
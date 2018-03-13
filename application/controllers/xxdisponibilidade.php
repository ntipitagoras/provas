<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Disponibilidade extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
      redirect ("home");
    }
    $this->load->model('disponibilidade_model');
    $this->load->model('titulacao_model');
  }

  public function index()
  {
    $idProfessor = $this->session->userdata('id_professor');
    $data['disponibilidade'] = $this->disponibilidade_model->listaIdData($idProfessor);
    $data['titulacao'] = $this->titulacao_model->lista();
    
    $this->load->view('home2_header_view');
    $this->load->view('disponibilidade_view',$data);
    $this->load->view('home2_footer_view');
  }

  public function listaDisponibilidadeProfessores()
  {
    $data['disponibilidades'] = $this->disponibilidade_model->lista();
    $this->load->view('home2_header_view');
    $this->load->view('disponibilidade_professores_view',$data);
    $this->load->view('home2_footer_view'); 

  }

  public function insert()
  {
    $data  = $this->disponibilidade_model->insert();
    if( $data == true )
    {
      $this->session->set_flashdata('msg', 'Dados inseridos com sucesso!');
      redirect('disponibilidade');
    }
  }

  public function update()
  {
    //pesquisa se id da disponibilidade já existe
    $id = $this->input->post('id_professor');
    $verifica = $this->disponibilidade_model->listaId($id);

    if( $verifica == 1 )
    {
      $retorno = $this->disponibilidade_model->delete($id);  
        if( $retorno == 1 )
        {
          $data = $this->disponibilidade_model->insert();
          if( $data == true )
          {
            $this->session->set_flashdata('msg', 'Dados atualizados com sucesso!');
            redirect('disponibilidade');
          } 
        }  
    }
    
  }

}

/* End of file disponibilidade.php */
/* Location: ./application/controllers/disponibilidade.php */
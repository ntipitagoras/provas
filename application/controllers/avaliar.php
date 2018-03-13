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
      $idUnidade = $this->session->userdata('unidade');

      if( $id == '698' )
      {
          $data['unidades']       = $this->unidade_model->listar();
          $data['avaliacoes']     = $this->avaliar_model->listar();
      }
      else
      {
          $data['unidades']       = $this->unidade_model->listarUnidades($idUnidade);
          $data['avaliacoes']     = $this->avaliar_model->listarAvaliacoes($id);
      }

      

      $this->load->view('home2_header_view');
      $this->load->view('avaliar_coordenador_view',$data);
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
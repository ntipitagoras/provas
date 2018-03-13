<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CoordenadorAdm extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
      redirect ("home");
    }
    $this->load->model('coordenador_model','coordenadores');
    $this->load->library('table');
  }

  public function index()
  {
    //$this->load->model('coordenador_model','coordenadores');
    $id_coordenador       = $this->session->userdata('id_professor');
    $data['provas']       =  $this->coordenadores->get_prova_coordenador($id_coordenador);
    
    $this->load->view('home2_header_view');
    $this->load->view('coordenador_view',$data);
    $this->load->view('home2_footer_view');
  }

  public function ajaxDisciplinas($idCurso)
  {

      require_once("../Trinity.load.php");
      Trinity::getInstance();  
      $idProdAdicSolicitacao = $_GET[idProdAdicSolicitacao];
      $sql  = "   SELECT procod,pronom FROM produtos WHERE procod = $idProdAdicSolicitacao ";
      $data = Trinity::select($sql);
      $rows = Trinity::rowCount($data);

      if( $rows > 0 )  
      {  
          echo json_encode($data);
      }
      else
      {
          echo json_encode(false);
      }

  }

  public function upload_prova(){

      $config['upload_path']    =   './uploads/provas/2015.1/';
      $config['allowed_types']  =   'pdf|PDF'; 
      $config['max_size']       =   '0';
      $config['max_width']      =   '0';
      $config['max_height']     =   '0';
      $config['encrypt_name']   =   true;
      
      $this->load->library('upload',$config);

      if( !$this->upload->do_upload() ) {
        $error = array('error' => $this->upload->display_errors() );
        print_r($error);
        exit();
      }
      else{
        $data = array('upload_data' => $this->upload->data() );
        return $data['upload_data']['file_name'];
      }

  }

  public function aceita($id){

      if( $this->coordenadores->aceite($id) ){
        redirect('coordenador/index');
      }else{
        die('Não foi possivel adicionar a prova');
      }
      $data = $this->provas->get_prova($id);
      $this->load->view('home2_header_view');
      $this->load->view('coordenador_view',$data);
      $this->load->view('home2_footer_view');

  }

  public function rejeita(){

    $id = $this->input->post('id');
    $motivo = $this->input->post('motivo');

    if( $this->coordenadores->rejeita($id,$motivo) ){
        redirect('coordenador/index');
      }else{
        die('Não foi possivel adicionar a prova');
      }
      $data = $this->provas->get_prova($id);
      $this->load->view('home2_header_view');
      $this->load->view('coordenador_view',$data);
      $this->load->view('home2_footer_view');

  }

  public function delete_prova($id)
  {
      if( $this->provas->delete_prova($id)){
        redirect('prova/index');
      }else{
        die('Não foi possivel deletar a prova.');
      }


  }


}

/* End of file welcome.php */
/* Location: ./application/controllers/prova.php */

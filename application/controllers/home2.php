<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home2 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
			redirect ("home");
		}
		$this->load->model('mensagem_model','mensagem');
	}

	public function index()
	{
		$data['mensagens']  = $this->mensagem->listarMensagem();
		$this->load->view('home2_header_view');
		$this->load->view('admin_main_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function logout() {
		$this->session->sess_destroy();

		redirect('/');
	}

}

/* End of file home2.php */
/* Location: ./application/controllers/home2.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Impressao extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
				redirect ("home");
			}
			$this->load->model('impressao_model','impressao');
			$this->load->model('operador_model','operador');
			$this->load->model('curso_model','curso');
		}

		public function index()
		{
			$this->load->model('impressao_model','impressao');
			$this->load->model('curso_model','curso');
			$this->load->library('table');

			$data['cursos'] = $this->curso->list_curso();
			$this->load->view('home2_header_view');
			$this->load->view('impressao_view',$data);
			$this->load->view('home2_footer_view');
		}

		public function list_prova_id_curso()
		{
			$data['cursos']         	= $this->curso->list_curso();
			$data['documentos']   	= $this->operador->get_documento($this->input->get('id_curso'));
			$data['provas']         	= $this->impressao->list_prova_id_curso($this->input->get('id_curso'));

			$this->load->view('home2_header_view');
			$this->load->view('impressao_view',$data);
			$this->load->view('home2_footer_view');
		}



		public function sim($id_prova)
		{
			$this->load->model('impressao_model','impressao');
			$this->load->model('curso_model','curso');

		

			if( $this->impressao->sim($id_prova) ){

				$data['cursos'] = $this->curso->list_curso();

				echo "<script>javascript:window.location = document.referrer;</script>";
			}
		}

		public function nao()
		{
			$this->load->model('impressao_model','impressao');
			$this->load->model('curso_model','curso');

			$id_prova = $this->input->post('id');
			$motivo   = $this->input->post('motivo');

			if( $this->impressao->nao($id_prova,$motivo) )
			{
				$data['cursos'] = $this->curso->list_curso();
				
				echo "<script>javascript:window.location = document.referrer;</script>";
			}
		}

}

/* End of file welcome.php */
/* Location: ./application/controllers/impressao.php */

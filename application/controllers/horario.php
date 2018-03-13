<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
			redirect ("home");
		}
		$this->load->model('horario_model','horario');
		$this->load->model('usuario_model','usuario');
	}

	public function index()
	{

		$id_matricula = $this->session->userdata('id_novo_matricula');
		$data['horarios'] = $this->horario->listaHorarioUsuario($id_matricula);

		//% DE HORARIOS JA PREENCHIDOS
		//$totalH = $this->horario->totalHorario();
		//$totalHP = $this->horario->totalHorarioPreenchido();
		//$data['porcento'] = ceil(($totalHP[0]->total / $totalH[0]->total) * 100);

		$this->load->view('home2_header_view');
		$this->load->view('horario_professor_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function ensalamento()
	{
		$data['ensalamentos'] = $this->horario->listarEnsalamento();
		$this->load->view('home2_header_view');
		$this->load->view('horario_ensalamento_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function editarEnsalamento($id)
	{
		$this->db->where('id',$id);
		$data['horarios'] = $this->db->get('ensalamento')->result();

		$this->load->view('home2_header_view');
		$this->load->view('editar_ensalamento_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function editarEnsalamentoSala()
	{
			$id               		= $this->input->post('id');
			$d['dia']         		= $this->input->post('dia');
			$d['id_docente']  	= $this->input->post('id_docente');
			$d['docente']     		= $this->input->post('docente');
			$d['sala']        		= $this->input->post('sala');

			$this->db->where('id',$id);
			$this->db->update('ensalamento',$d);
			$data['horarios'] = $this->horario->listarEnsalamento();
			$this->load->view('home2_header_view');
			$this->load->view('horario_ensalamento_view',$data);
			$this->load->view('home2_footer_view');

	}

	public function searchId()
	{
		$id_matricula = $this->input->post('id_professor');
		$data['horario'] = $this->horario->listaHorarioUsuario($id_matricula);
		$data['professores'] = $this->usuario->listaProfessor();
		$this->load->view('home2_header_view');
		$this->load->view('horario_professores_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function professores()
	{
		//TODOS OS USUARIOS
		$data['professores'] = $this->usuario->listaProfessor();

		$this->load->view('home2_header_view');
		$this->load->view('horario_professores_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function cargaHoraria()
	{
			$data['professores'] = $this->horario->cargaHoraria('ensalamento');
			$data['professoresA'] = $this->horario->cargaHoraria('ensalamento20152');

			$this->load->view('home2_header_view');
			$this->load->view('carga_horaria_view',$data);
			$this->load->view('home2_footer_view');
	}

}
/* End of file horario.php */
/* Location: ./application/controllers/horario.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Disponibilidade extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
			redirect ("home");
		}
		$this->load->model('disponibilidade_model');
		$this->load->model('titulacao_model');
		$this->load->model('disciplina_model');
	}

	public function index()
	{
		$idProfessor 				= $this->session->userdata('id_professor');
		$data['disponibilidade'] 		= $this->disponibilidade_model->listaIdData($idProfessor);
		$data['disciplinas'] 			= $this->disciplina_model->lista();

		$this->load->view('home2_header_view');
		$this->load->view('disponibilidade_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function listaDisponibilidadeProfessores()
	{
		$data['disponibilidades'] 	= $this->disponibilidade_model->lista();
		$data['disciplinas'] 			= $this->disciplina_model->get_disciplinas();
		$this->load->view('home2_header_view');
		$this->load->view('disponibilidade_professores_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function relatorios()
	{

		//$data[] = $this->disciplinas_model->countDisciplinas();
		$data['disponibilidades'] = $this->disponibilidade_model->countDisponibilidadeDisciplinas();
		//$data[] = $this->disponibilidade_model->countDisponibilidadeTurnos();
		//$data[] = $this->disponibilidade_model->countDisponibilidades();
		//$data[] = $this->disponibilidade_model->countDisciplinas();

		$this->load->view('home2_header_view');
		$this->load->view('disponibilidade_relatorio_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function insert()
	{
			$data  = $this->disponibilidade_model->insert();
		if( $data == true )
		{
			//$this->session->set_flashdata('msg', 'Dados inseridos com sucesso!');
			$this->load->view('home2_header_view');
			$this->load->view('mensagem_disponibilidade_enviada_view');
			$this->load->view('home2_footer_view');
			//redirect('disponibilidade');
		}
	}

	public function update(){
		//pesquisa se id da disponibilidade já existe
		$id = $this->input->post('id_professor');
		$verifica = $this->disponibilidade_model->listaId($id);

		if( $verifica == true ){
			$retorno = $this->disponibilidade_model->delete($id);
			if( $retorno == 1 ){
				$data = $this->disponibilidade_model->insert();
				if( $data == true ){
					//$this->session->set_flashdata('msg', 'Dados atualizados com sucesso!');
					$this->load->view('home2_header_view');
					$this->load->view('mensagem_disponibilidade_enviada_view');
					$this->load->view('home2_footer_view');
				}
			}
		}
	}

}

/* End of file disponibilidade.php */
/* Location: ./application/controllers/disponibilidade.php */
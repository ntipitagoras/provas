<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prova extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
			redirect ("home");
		}
		$this->load->model('usuario_model','usuario');
		$this->load->model('prova_model','provas');
		$this->load->model('curso_model','cursos');
		$this->load->model('periodo_model','periodos');
		$this->load->model('dia_model','dias');
		$this->load->model('turno_model','turnos');
		//$this->load->model('disciplina_model','disciplinas');
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
		//$data['disciplinas']  =  $this->disciplinas->list_disciplina();
		$data['tipos']        =  $this->tipos->list_tipo();
		$data['provas']       =  $this->provas->get_prova($id_professor);
		$data['cursos']       =  $this->cursos->list_curso();
		$data['turmas']       =  $this->turmas->list_turma();
		$this->load->view('home2_header_view');
		$this->load->view('prova_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function mensagem_prova_enviada()
	{
		$this->load->view('home2_header_view');
		$this->load->view('mensagem_prova_enviada_view');
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
			$sala             = $this->input->post('sala');
			$qtdalunos        = $this->input->post('qtdalunos');
			$datahora         = date("Y-m-d H:i:s");

				if(isset($_POST['btnSubmit']))
				{
					$caminho          = "uploads/unidade_sao_luis/";
					$path             = "";
					$path1            = "";
					$path2            = "";

					//ENVIO DE TIPO DE ARQUIVO 1
					$nomeArquivo1    = $_FILES["userfile1"]["name"];
					$tamanhoArquivo1 = $_FILES["userfile1"]["size"];
					$nomeTemporario1 = $_FILES["userfile1"]["tmp_name"];

					if (!empty($nomeArquivo1))
					{
						$numFile   = 1;
						$novoNome1 = rand().".pdf";
						move_uploaded_file($nomeTemporario1, ($caminho . $novoNome1) );
						$path1     .= $caminho.$novoNome1."#";
					}

					//ENVIO DE TIPO DE ARQUIVO 2
					$nomeArquivo2    = $_FILES['userfile2']['name'];
					$tamanhoArquivo2 = $_FILES['userfile2']['size'];
					$nomeTemporario2 = $_FILES['userfile2']['tmp_name'];

					if (!empty($nomeArquivo2))
					{
						$numFile++;
						$novoNome2 = rand().".pdf";
						move_uploaded_file($nomeTemporario2, $caminho . $novoNome2);
						$path2     .= $caminho.$novoNome2."#";
					}

				}

				$path = $path1.$path2;
				$idStatus = 1;
				$this->provas->add_prova($idProfessor,$idCurso,$nomeDisciplina,$idTurno,$idDia,$idPeriodo,$qtdalunos,$idStatus,$tipoProva,$path,$numFile,$datahora);

				// ENVIA EMAIL PARA O COORDENADOR DO CURSO, INFORMANDO O ENVIO DA PROVA
				$coordenador 	= $this->usuario->searchIdCursoCoordenador($idCurso);
				$professor 		= $this->usuario->searchIdProfessor($idProfessor);

				if($tipoProva == 1 ){ $tipo = 'Oficial 1';}
				if($tipoProva == 2 ){ $tipo = 'Oficial 2';}
				if($tipoProva == 3 ){ $tipo = '2ª Chamada';}
				if($tipoProva == 4 ){ $tipo = 'Exame Final';}

				//INFORMAÇÕES DO COORDENADOR
				foreach($coordenador as $c)
				{
					$email =  $c->email;
					$nome =  $c->nome;
				}

				//INFORMAÇÕES DO PROFESSOR
				foreach($professor as $p)
				{
					$nomeProfessor = $p->nome;
				}

				//ENVIO DE MENSAGEM POR EMAIL
				$from		= "contato@sse.pitagorasslz.com.br";
				$subject 	= "Prova enviada via Portal";
				$message   = "<br><br> Olá coordenador(a)	  <b>" . $nome ."</b>,<br><br>";
				$message .= "O professor ".strtoupper($nomeProfessor)." enviou a prova do tipo ".strtoupper($tipo)." da disciplina ".strtoupper($nomeDisciplina). " as ".date('d/m/Y H:m:s')." para o seu deferimento.<br><br>";
				$message .= "<h5><em>Coordenação de Ciência da Computação <br> Copyright - Sistema de Envio de Provas</em></h5>";
				$this->load->library('email');
				$this->email->initialize();
				$this->email->subject($subject);
				$this->email->from($from);
				$this->email->to($email);
				$this->email->message($message);
				$this->email->send();

				redirect('prova/mensagem_prova_enviada');
		}
	}

	function mensagem_erro_envio_prova()
	{
		$this->load->view('mensagem_erro_envio_prova');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/prova.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
			redirect ("home");
		}
		$this->load->model('relatorio_model','relatorio');

	}

	public function index()
    {

$dados = array(
 'enviadas' => $this->relatorio->totalProvasEnviadas(),
 'aceitas'  => $this->relatorio->totalProvasAceitas(),
 'rejeitadas' => $this->relatorio->totalProvasRejeitadas(),
 'cursos'   =>   $this->relatorio->getAllCursos()

);


$this->load->view('home2_header_view');
$this->load->view('relatorio_view', $dados);
$this->load->view('home2_footer_view');
 
	}



public function getDetails(){
$curso_id = $this->input->post("cursos");
$enviadas = $this->relatorio->getCurseEnviados($curso_id);
$aceitos  = $this->relatorio->getCurseAceitos($curso_id);
$rejeitados = $this->relatorio->getCurseRejeitados($curso_id);
$dados = array(
'curso_enviados' => $this->relatorio->getCurseEnviados($curso_id),
'cursos_aceitos' =>$this->relatorio->getCurseAceitos($curso_id),
'cursos_rejeitado'=>$this->relatorio->getCurseRejeitados($curso_id)
);

header('Content-Type: application/json'); 
echo json_encode($dados);


}



	



}

/* End of file relatorio.php */
/* Location: ./application/controllers/Relatorio.php */
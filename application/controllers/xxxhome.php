<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('parametro_model');
	}

	public function index()
	{
		$this->load->view('home_header_view');
		$this->load->view('login_de_usuario');
		$this->load->view('home_footer_view');
	}

	public function login()
	{
		$cpf   = $this->input->post('cpf');
		$senha = $this->input->post('senha');

		//pesquisa se ja existe usuario com CPF
		$data = $this->usuario_model->searchCpf($cpf);

		//verifica se a pesquisa encontrou algum cpf
		if( count($data) === 1 )
		{
			//percorre o vetor e compara cpf e senha digitada
			foreach( $data as $q )
			{
				if( $q->cpf == $cpf and $q->senha <> $senha )
				{
					$this->session->set_flashdata('msg','Senha não confere!');
					redirect('home');
				}
				if( $q->cpf == $cpf and $q->senha == $senha )
				{
					$usuario 	= $this->usuario_model->login($cpf,$senha);
					$parametros = $this->parametro_model->getParametros();

					if( count($usuario) ===  1 )
					{
						$dados =  array(
										'id_professor' 					=> $usuario[0]->id,
										'id_matricula' 					=> $usuario[0]->id_professor,
										'id_novo_matricula' 				=> $usuario[0]->id_novo_professor,
										'nome' 						=> $usuario[0]->nome,
										'ativo' 						=> $usuario[0]->ativo,
										'nivel_professor' 				=> $usuario[0]->nivel_professor,
										'nivel_coordenador'				=> $usuario[0]->nivel_coordenador,
										'nivel_operador' 				=> $usuario[0]->nivel_operador,
										'nivel_tercerizado'				=> $usuario[0]->nivel_tercerizado,
										'nivel_diretor'					=> $usuario[0]->nivel_diretor,
										'nivel_regulatorio'				=> $usuario[0]->nivel_regulatorio,
										'nivel_rh'					=> $usuario[0]->nivel_rh,
										'nivel_administrador'				=> $usuario[0]->nivel_administrador,
										'unidade'					=> $usuario[0]->unidade,
										'data_limite_envio_prova_professor' 	=> $parametros[0]->valor,
										'data_limite_analise_coordenador' 		=> $parametros[1]->valor,
										'data_limite_disponibilidade' 			=> $parametros[2]->valor,
										'data_limite_avaliacao_coordenador'	=> $parametros[3]->valor,
										'logado' 					=> TRUE
										);
							$this->session->set_userdata($dados);
							redirect('home2/index');
					}
				}
			}
		}
		else
		{
			$this->session->set_flashdata('msg','CPF não cadastrado no sistema. Entre em contato com o seu coordenador!');
			redirect('home');
		}

	}

	public function search_password()
	{
		$this->load->view('home_header_view');
		$this->load->view('search_password_view');
		$this->load->view('home_footer_view');
	}

	public function send_email(){

		$cpf = $this->input->post('cpf');
		$professor 	= $this->usuario_model->searchCpf($cpf);

		if( count($professor) === 1){

			foreach($professor as $p){
				$nome 	= $p->nome;
				$to 		= $p->email;
				$senha = $p->senha;
			}

			//ENVIO DE MENSAGEM POR EMAIL
			$from		= "contato@sse.pitagorasslz.com.br";
			$subject 	= "Reenvio de senha";
			$message   = "<br><br> Olá <b>" . $nome ."</b>,<br><br>";
			$message .= "Segue sua senha de acesso ao portalprovaspitagoras.vai.la <br><br>";
			$message .= "Senha:".$senha."<br><br>";
			$message .= "<h5><em>Coordenação de Ciência da Computação <br> Copyright - Sistema de Envio de Provas</em></h5>";
			$this->load->library('email');
			$this->email->initialize();
			$this->email->subject($subject);
			$this->email->from($from);
			$this->email->to($to);
			$this->email->message($message);
			$this->email->send();

			redirect('home/index');

		}else{
			redirect('home/index');
		}



	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

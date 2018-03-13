<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('parametro_model');
		$this->load->library('encrypt');
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
			{   $senhatemp = $q->senha;
				$senhadecriptografada = $this->encrypt->decode($senhatemp);
				if( $q->cpf == $cpf and $senhadecriptografada <> $senha )
				{
					$this->session->set_flashdata('msg','Senha não confere!');
					echo "2";
				}
				if( $q->cpf == $cpf and $senhadecriptografada == $senha )
				{
					$usuario 	= $this->usuario_model->login($cpf,$senhadecriptografada);
					$parametros = $this->parametro_model->getParametros();

					if( count($usuario) ===  1 )
					{


						$dados =  array(
										'id_professor' 		=> $usuario[0]->id,
										'celular'           => $usuario[0]->celular,
										'id_matricula' 											=> $usuario[0]->id_professor,
										'id_novo_matricula' 								=> $usuario[0]->id_novo_professor,
										'nome' 															=> $usuario[0]->nome,
										'ativo' 														=> $usuario[0]->ativo,
										'nivel_professor' 									=> $usuario[0]->nivel_professor,
										'nivel_coordenador'									=> $usuario[0]->nivel_coordenador,
										'nivel_operador' 										=> $usuario[0]->nivel_operador,
										'nivel_tercerizado'									=> $usuario[0]->nivel_tercerizado,
										'nivel_diretor'											=> $usuario[0]->nivel_diretor,
										'nivel_regulatorio'									=> $usuario[0]->nivel_regulatorio,
										'nivel_rh'													=> $usuario[0]->nivel_rh,
										'nivel_administrador'								=> $usuario[0]->nivel_administrador,
										'unidade'														=> $usuario[0]->unidade,
										'data_limite_envio_prova_professor' => $parametros[0]->valor,
										'data_limite_analise_coordenador' 	=> $parametros[1]->valor,
										'data_limite_disponibilidade' 			=> $parametros[2]->valor,
										'data_limite_avaliacao_coordenador'	=> $parametros[3]->valor,
										'data_limite_grupo_1' 							=> $parametros[4]->valor,
										'data_limite_grupo_2'								=> $parametros[5]->valor
										

										);
                       // print_r($dados);
						$this->session->set_userdata($dados);
						//redirect('token', $dados);
						echo "1";

					}
				}
			}
		}
		else
		{

			echo "3";

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
    $professor   = $this->usuario_model->searchCpf($cpf);

    if( count($professor) === 1){

      foreach($professor as $p){
        $nome   = $p->nome;
        $to     = $p->email;
        $senha = $p->senha;
      }
     //Gerar uma nova senha para o usuário
      $novasenha = substr(str_shuffle ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, '10');


      $this->usuario_model->salvarnovasenha($cpf, $this->encrypt->encode($novasenha));


      //ENVIO DE MENSAGEM POR EMAIL
      $from    = "contato@sse.pitagorasslz.com.br";
      $subject   = "Reenvio de senha";
      $message   = "<br><br> Olá <b>" . $nome ."</b>,<br><br>";
      $message .= "Segue sua senha de acesso ao http://pitagorasslz.com.br/provas/ <br><br>";
      $message .= "Senha: ".$novasenha."<br><br>";
      $message .= "Após realizar login, por favor crie uma nova senha em -> Atualização cadastral -> Acadêmico <br>";
      $message .= "<h5><em>Núcleo de Tecnologia da Informação <br> Copyright - Sistema de Envio de Provas</em></h5>";
      $this->load->library('email');
      $this->email->initialize();
      $this->email->subject($subject);
      $this->email->from($from);
      $this->email->to($to);
      $this->email->message($message);
      $this->email->send();
 
     echo"<script language='javascript' type='text/javascript'>alert('Uma nova senha foi enviada para seu E-mail');window.location.href='/provas';</script>";
      

    }else{
      redirect('home/index');
    }



	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

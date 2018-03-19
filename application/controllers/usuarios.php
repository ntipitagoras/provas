<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuarios extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
				redirect ("home");
			}
			$this->load->model('usuario_model','usuario');
			$this->load->helper('gerarlogs_helper');
			$this->load->library('encrypt');
		}

		public function index()
		{

			
			$this->load->view('home2_header_view');
			$this->load->view('update_dados_usuarios');
			$this->load->view('home2_footer_view');
		}

		public function searchCpf(){
	   $cpf = $this->input->post('cpf_search');
       $data['usuarios'] = $this->usuario->searchCpf($cpf);
       if ($data['usuarios'] !=NULL) {
         	$this->load->view('home2_header_view');
			$this->load->view('update_dados_usuarios',$data);
			$this->load->view('home2_footer_view');      	
       }else{
       	$this->session->set_flashdata('msg', "CPF não encontrado");
       	redirect(base_url('/usuarios'));

       }


		}
		public function addusuario(){
        
        $dados = array(
        'nome' => strtoupper($this->input->post('nome')),
        'cpf'  => $this->input->post('cpf'),
        'rg'   => $this->input->post('rg'),
        'email'=> $this->input->post('email'),
        'celular'=> $this->input->post('celular'),
        'senha' => $this->encrypt->encode($this->input->post('senha')),
        'nivel_professor' => 1
        );
        
        $adicionar = $this->usuario->addDados($dados);
        $this->session->set_flashdata('msg', "Usuário adicionado");
       	redirect(base_url('/usuarios'));


		}

		
		public function atualizaDados(){
        $cpf = $this->input->post('cpf');

        $dados = array(
        'nome'  => strtoupper($this->input->post('nome')),
        'rg'    => $this->input->post('cpf'),
        'email' => $this->input->post('email'),
        'celular' => $this->input->post('celular'),
        'senha'   => $this->encrypt->encode($this->input->post('senha'))
        );

        $salvar = $this->usuario->updateDados($cpf, $dados);
        if ($salvar=true) {
        
        gravarLogs($this->session->userdata('id_professor'),$this->session->userdata('nome'), $this->session->userdata('nivel_professor'), $this->session->userdata('nivel_coordenador') , $this->session->userdata('nivel_operador'),  $this->session->userdata('nivel_tercerizado'), $this->session->userdata('nivel_administrador')  , 'Alteração de dados usuário: '.$cpf);

        	$this->session->set_flashdata('msg', "Dados atualizados com sucesso");
        	redirect(base_url('/usuarios'));
        }else{
        	$this->session->set_flashdata('msg', "Erro ao atualizar os dados");
        	redirect(base_url('/usuarios'));
        }


		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/impressao.php */

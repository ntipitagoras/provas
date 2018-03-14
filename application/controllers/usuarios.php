<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuarios extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
				redirect ("home");
			}
			$this->load->model('usuario_model','usuario');
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

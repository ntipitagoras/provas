<?php

class Configuracao_model extends CI_Model {

	var $id_professor;
	var $novasenha;


    function __construct(){
        parent::__construct();
    }

	public function novasenha($id_professor,$novasenha){
		$data =  array('senha' => $novasenha);		
		$this->db->where('id',$id_professor);
		$this->db->update('usuario', $data);
		redirect('home2/logout');
	}

	public function searchCPF()
	{
		$cpf = $this->input->post('cpf');
		$this->db->where('cpf',$cpf);
		$data = $this->db->get('usuario')->result();
		return $data;
	}

}
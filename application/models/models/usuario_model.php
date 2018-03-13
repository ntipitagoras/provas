<?php

class Usuario_model extends CI_Model {

	var $cpf;
	var $senha;
	

    function __construct(){
        parent::__construct();
    }

    public function login($cpf,$senha){
    	$this->db->where('cpf',$cpf);
	 	$this->db->where('senha',$senha);
	 	$data = $this->db->get('usuario')->result();
	 	return $data;
    }

    public function searchCpf($cpf){ 
    	$this->db->where('cpf',$cpf);
    	$data = $this->db->get('usuario')->result();
    	return $data;
    }

}
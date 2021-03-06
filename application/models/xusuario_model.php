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

	public function listaProfessor(){
		$this->db->order_by('nome','ASC');
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function listaIdProfessor($ids){

		$this->db->order_by('nome','ASC');
		$this->db->where_in('id',$ids);
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function listaDocumentoProfessor(){
		$this->db->order_by('nome','ASC');
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function searchCpf($cpf){
		$this->db->where('cpf',$cpf);
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function searchIdProfessor($id){
		$this->db->where('id',$id);
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function searchIdCursoCoordenador($id){
		$this->db->where('id_curso_1',$id);
		$this->db->or_where('id_curso_2',$id);
		$this->db->or_where('id_curso_3',$id);
		$this->db->or_where('id_curso_4',$id);
		$this->db->or_where('id_curso_5',$id);
		$this->db->or_where('id_curso_6',$id);
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function totalUsuarios()
	{
		$this->db->select('count(*)');
		$data = $this->db->from('usuario');
		return $data;
	}

}
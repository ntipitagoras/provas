<?php

class Disponibilidade_model extends CI_Model {

	function __construct(){
			parent::__construct();
	}

	public function lista(){
		$this->db->select(' *, a.id_professor as id, b.nome as nome ');
		$this->db->from('disponibilidade a ');
		$this->db->join('usuario b', 'b.id = a.id_professor','inner');
		$this->db->order_by('b.nome','ASC');
		return $this->db->get()->result();
	}

	public function listaTodas(){
		return $this->db->get('titulacao')->result();
	}

	public function listaIdData($id){
		$this->db->where('id_professor',$id);
		return $this->db->get('disponibilidade')->result();
	}

	public function totalDisponibilidades(){
		$this->db->select('count(*) as total');
		$data = $this->db->from('disponibilidade');
		return $data;
	}

	public function listaId($id){
		$this->db->where('id_professor',$id);
		if($this->db->get('disponibilidade')->result())
		{
			return true;
		}else{
			return false;
		}
	}

	public function insert(){

		$cod_disciplinas = '';

		if( !empty($_POST['cod_disciplinas']) )
		{
			foreach( $_POST['cod_disciplinas'] as $c)
			{
				$cod_disciplinas .= $c .",";
			}
		}else{
			$cod_disciplinas .= "";
		}



		unset($_POST['btnSubmit']);
		$_POST['cod_disciplinas'] = $cod_disciplinas;
		$data = $_POST;
		if($this->db->insert('disponibilidade',$data))
		{
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		//apaga registro com as informações anteriores
		$this->db->where('id_professor',$id);
		return $this->db->delete('disponibilidade');
	}

	public function countDisponibilidadeDisciplinas(){
		return $this->db->count_all('disponibilidade');
	}

}
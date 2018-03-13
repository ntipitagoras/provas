<?php

class Horario_model extends CI_Model {


	function __construct(){
			parent::__construct();
	}


	public function listaHorario($param1 = '')
	{
		$this->db->select('*');
		$this->db->from('ensalamento_2017_1');
		$this->db->where('cod_docente',$param1);
		$this->db->order_by('turno','ASC');
		return $this->db->get()->result();
	}

	public function listarEnsalamento()
	{
		$this->db->select(' * ');
		$this->db->from('ensalamento_2017_1');
		$this->db->order_by('curso','ASC');
		$this->db->order_by('turno','ASC');
		//$this->db->order_by('serie','ASC');
		//$this->db->order_by('cod_turma','ASC');
		return $this->db->get()->result();
	}

	public function pesquisarEnsalamentoSala($sala)
	{
			$this->db->select('*');
			$this->db->from('ensalamento_2017_1');
			$this->db->where('sala',$sala);
			return $this->db->get()->result();
	}

	public function listaHorarioUsuario($param1 = '')
	{
		$this->db->select('*');
		$this->db->from('ensalamento_2017_1');
		//$this->db->like('cod_docente', $param1, 'after');
		$this->db->where('cod_docente',$param1);
		$this->db->order_by('cod_dia','ASC');
		return $this->db->get()->result();
	}

	public function totalHorario()
	{
			$this->db->select('COUNT(*) as total');
			$this->db->from('ensalamento');
			return $this->db->get()->result();
	}

	public function totalHorarioNaoPreenchido()
	{
			$this->db->select('COUNT(*) as total');
			$this->db->from('ensalamento');
			$this->db->where('id_docente =','');
			return $this->db->get()->result();
	}

	public function totalHorarioPreenchido()
	{
			$this->db->select('COUNT(*) as total');
			$this->db->from('ensalamento');
			$this->db->where('id_docente !=','');
			return $this->db->get()->result();
	}

	public function cargaHoraria($tabela)
	{
			$this->db->select('docente, SUM(ch) as total');
			$this->db->from($tabela);
			$this->db->group_by('docente');
			$this->db->order_by('docente','ASC');
			return $this->db->get()->result();
	}


}

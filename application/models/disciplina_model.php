<?php

class Disciplina_model extends CI_Model
{

	function __construct()
	{
			parent::__construct();
	}

	public function lista()
	{
		$this->db->select(' DISTINCT(cod_disciplina), desc_disciplina, desc_curso ');
		$this->db->from('serializacao_2016_1');
		$this->db->where('desc_tipo_disciplina','NORMAL');
		$this->db->or_where('desc_tipo_disciplina','OPTATIVA');
		$this->db->or_where('desc_tipo_disciplina','DISCIPLINA INTEGRADA');
		$this->db->or_where('desc_tipo_disciplina','ESTÁGIO SUPERVISIONADO');
		$this->db->order_by('desc_curso','ASC');
		$this->db->order_by('desc_disciplina','ASC');
		return $this->db->get()->result();
	}

	public function get_disciplinas()
	{
		$this->db->select('DISTINCT(cod_disciplina),desc_disciplina');
		$this->db->from('serializacao_2016_1');
		return $this->db->get()->result();
	}

}
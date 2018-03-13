<?php

class Prova_model extends CI_Model {

	var $id;
	var $id_professor;
	var $id_curso;
	var $nomeDisciplina;
    var $id_turno;
	var $id_dia;
	var $id_periodo;
	var $qtdalunos;
	var $id_status;
	var $tipoProva;
	var $path;
	var $totalarquivos;
	var $datahora;

    function __construct(){
        parent::__construct();
    }

    public function list_prova(){

    	$this->db->select('	a.id as id, 
    						b.descricao as professor, 
    						c.descricao as curso, 
    						a.nomeDisciplina as disciplina, 
    						e.descricao as turno, 
    						f.descricao as dia,
    						g.descricao as periodo,
    						f.descricao as dia,
    						a.qtdalunos,
    						h.id as id_status,
    						a.motivo,
    						a.path,
    						a.datahora_coordenador,
    						a.datahora
    					');
		$this->db->from('prova a ');   				
		$this->db->join('professor b ', 'b.id = a.id_professor','inner');
		$this->db->join('curso c ','c.id = a.id_curso','inner');
		//$this->db->join('disciplina d',' d.id = a.id_disciplina ','inner');
		$this->db->join('turno e ',' e.id = a.id_turno','inner');
		$this->db->join('dia f ',' f.id = a.id_dia','inner');
		$this->db->join('periodo g ',' g.id = a.id_periodo','inner');
		$this->db->join('prova_status h ',' h.id = a.id_status','inner');

        return $this->db->get('prova')->result();
    }

	function get_prova($id_professor)
	{
		$this->db->where('id_professor',$id_professor);
		$provas = $this->db->get('prova')->result();

		if( count($provas) > 0 )
		{
			$this->db->select('	a.id as id, 
	    						b.nome as professor, 
	    						c.descricao as curso,
	    						a.id_professor, 
	    						a.nomeDisciplina as disciplina, 
	    						e.descricao as turno, 
	    						f.descricao as dia,
	    						g.descricao as periodo,
	    						f.descricao as dia,
	    						a.qtdalunos as quantidade,
	    						h.id as id_status,
	    						a.motivo,
	    						a.tipoProva as tipoProva,
	    						a.path as path,
	    						a.totalarquivos as totalarquivos,
	    						a.datahora_coordenador,
	    						a.datahora
	    					');
			$this->db->from('prova a');   				
			$this->db->join('usuario b ', 'b.id = a.id_professor','inner');
			$this->db->join('curso c ','c.id = a.id_curso','inner');
			$this->db->join('turno e ',' e.id = a.id_turno','inner');
			$this->db->join('dia f ',' f.id = a.id_dia','inner');
			$this->db->join('periodo g ',' g.id = a.id_periodo','inner');
			$this->db->join('prova_status h ',' h.id = a.id_status','inner');
			$this->db->where('a.id_professor',$id_professor);
        	return $this->db->get()->result();
		}
	}

	public function add_prova($idProfessor,$idCurso,$nomeDisciplina,$idTurno,$idDia,$idPeriodo,$qtdalunos,$idStatus,$tipoProva,$path,$totalarquivos,$datahora){
		
		$this->id = null;
		$this->id_professor 	= $idProfessor;
		$this->id_curso			= $idCurso;
		$this->nomeDisciplina 	= $nomeDisciplina;
		$this->id_turno 		= $idTurno;
		$this->id_dia 			= $idDia;
		$this->id_periodo 		= $idPeriodo;
		$this->qtdalunos 		= $qtdalunos;
		$this->id_status		= $idStatus;
		$this->tipoProva		= $tipoProva;
		$this->path 			= $path;
		$this->totalarquivos	= $totalarquivos;
		$this->datahora			= $datahora;

		return $this->db->insert('prova', $this);
	}

	public function update_prova($id,$idProfessor,$idCurso,$nomeDisciplina,$idTurno,$idDia,$idPeriodo,$qtdalunos,$idStatus,$path,$datahora){

		$this->id  				= $id;
		$this->id_professor 	= $idProfessor;
		$this->id_curso			= $idCurso;
		$this->nomeDisciplina 	= $nomeDisciplina;
		$this->id_turno 		= $idTurno;
		$this->id_dia 			= $idDia;
		$this->id_periodo 		= $idPeriodo;
		$this->qtdalunos 		= $qtdalunos;
		$this->id_status		= $idStatus;
		$this->path 			= $path;
		$this->datahora			= $datahora;

		$this->db->where('id',$this->id);
		return $this->db->update('prova', $this);
	}

	function delete_prova($id){
		$this->db->where('id',$id);
		return $this->db->delete('prova',$this);
	}
}
<?php

class Coordenador_model extends CI_Model {

	var $id;
	var $id_professor;
	var $id_curso;
	var $nomeDisciplina;
    var $id_turno;
	var $id_dia;
	var $id_periodo;
	var $qtdalunos;
	var $id_status;
	var $path;
	var $datahora;

    function __construct(){
        parent::__construct();
    }

    public function list_prova(){

    	$this->db->select('	a.id as id, 
    						b.descricao as professor, 
    						c.descricao as curso, 
    						d.descricao as disciplina, 
    						b.descricao as professor,
    						e.descricao as turno, 
    						f.descricao as dia,
    						g.descricao as periodo,
    						f.descricao as dia,
    						a.qtdalunos,
    						h.id as id_status,
    						a.path,
    						a.datahora
    					');

		$this->db->from('prova a ');   				
		$this->db->join('professor b ', 'b.id = a.id_professor','inner');
		$this->db->join('curso c ','c.id = a.id_curso','inner');
		$this->db->join('disciplina d',' d.id = a.nomeDisciplina ','inner');
		$this->db->join('turno e ',' e.id = a.id_turno','inner');
		$this->db->join('dia f ',' f.id = a.id_dia','inner');
		$this->db->join('periodo g ',' g.id = a.id_periodo','inner');
		$this->db->join('prova_status h ',' h.id = a.id_status','inner');
		$this->db->order_by('curso','ASC');

        return $this->db->get()->result();
    }

    public function get_prova_coordenador($id_coordenador){

    	$this->db->where('id',$id_coordenador);
		$usuarios = $this->db->get('usuario')->result();

		foreach( $usuarios as $u){
			$id_curso_1 = $u->id_curso_1;
			$id_curso_2 = $u->id_curso_2;
			$id_curso_3 = $u->id_curso_3;
			$id_curso_4 = $u->id_curso_4;
			$id_curso_5 = $u->id_curso_5;
			$id_curso_6 = $u->id_curso_6;
			$id_curso_7 = $u->id_curso_7;
			$id_curso_8 = $u->id_curso_8;
			$id_curso_9 = $u->id_curso_9;
			$id_curso_10 = $u->id_curso_10;
		}

		$this->db->select('	a.id as id, 
							c.descricao as curso,
							a.nomeDisciplina as disciplina,
							b.nome as professor, 
							e.descricao as turno,
							f.descricao as dia,
							g.descricao as periodo,
							a.qtdalunos,
							h.id as id_status,
							a.motivo as motivo,
							a.path as path,
							a.totalarquivos as totalarquivos,
							a.datahora,
							a.datahora_coordenador
						');

		$this->db->from('prova a ');   				
		$this->db->join('usuario b ', 'b.id = a.id_professor','inner');
		$this->db->join('curso c ','c.id = a.id_curso','inner');
		$this->db->join('turno e ',' e.id = a.id_turno','inner');
		$this->db->join('dia f ',' f.id = a.id_dia','inner');
		$this->db->join('periodo g ',' g.id = a.id_periodo','inner');
		$this->db->join('prova_status h ',' h.id = a.id_status','inner');

		if($id_curso_1 > 0){
			$this->db->or_where('a.id_curso',$id_curso_1);		
		}
		if($id_curso_2 > 0){
			$this->db->or_where('a.id_curso',$id_curso_2);		
		}
		if($id_curso_3 > 0){
			$this->db->or_where('a.id_curso',$id_curso_3);		
		}
		if($id_curso_4 > 0){
			$this->db->or_where('a.id_curso',$id_curso_4);		
		}
		if($id_curso_5 > 0){
			$this->db->or_where('a.id_curso',$id_curso_5);		
		}
		if($id_curso_6 > 0){
			$this->db->or_where('a.id_curso',$id_curso_6);		
		}
		if($id_curso_7 > 0){
			$this->db->or_where('a.id_curso',$id_curso_7);		
		}
		if($id_curso_8 > 0){
			$this->db->or_where('a.id_curso',$id_curso_8);		
		}
		if($id_curso_9 > 0){
			$this->db->or_where('a.id_curso',$id_curso_9);		
		}
		if($id_curso_10 > 0){
			$this->db->or_where('a.id_curso',$id_curso_10);		
		}

	    return $this->db->get()->result();
    }

	

	function aceite($id){
		$dataHoraCoordenador = date("Y-m-d h:i:s");
		$data =  array('id_status' => 2, 'datahora_coordenador' => $dataHoraCoordenador);
		$this->id = $id;		
		$this->db->where('id',$this->id);
		return $this->db->update('prova',$data);
	}

	function rejeita($id,$motivo){

		$dataHoraCoordenador = date("Y-m-d h:i:s");
		$data =  array('id_status' => 3, 'datahora_coordenador' => $dataHoraCoordenador,'motivo' => $motivo);		
		$this->db->where('id',$id);
		return $this->db->update('prova', $data);
	}

}
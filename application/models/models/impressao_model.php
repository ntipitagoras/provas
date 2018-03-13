<?php

class Impressao_model extends CI_Model {

	var $id;

    function __construct(){
        parent::__construct();
    }

    public function list_prova(){

    	$this->db->select('	a.id as id, 
    						b.nome as professor, 
    						c.descricao as curso, 
    						a.nomeDisciplina as disciplina, 
    						e.descricao as turno, 
    						f.descricao as dia,
    						g.descricao as periodo,
    						f.descricao as dia,
    						a.qtdalunos,
    						h.id as id_status,
    						a.path,
    						a.datahora,
    						a.datahora_coordenador,
    						a.totalarquivos as totalarquivos
    					');

		$this->db->from('prova a ');   				
		$this->db->join('usuario b ', 'b.id = a.id_professor','inner');
		$this->db->join('curso c ','c.id = a.id_curso','inner');
		$this->db->join('turno e ',' e.id = a.id_turno','inner');
		$this->db->join('dia f ',' f.id = a.id_dia','inner');
		$this->db->join('periodo g ',' g.id = a.id_periodo','inner');
		$this->db->join('prova_status h ',' h.id = a.id_status','inner');
		$this->db->where('id_status', 2);
		$this->db->order_by('professor','ASC');

		return $this->db->get()->result();
    }

	function list_prova_id_curso($id_curso){

		$this->db->select('	a.id as id, 
    						b.nome as professor, 
    						c.descricao as curso, 
    						a.nomeDisciplina as disciplina, 
    						e.descricao as turno, 
    						f.descricao as dia,
    						g.descricao as periodo,
    						f.descricao as dia,
    						a.qtdalunos,
    						h.id as id_status,
                            a.id_status_impressao as id_status_impressao,
    						a.path,
    						a.datahora,
    						a.datahora_coordenador,
    						a.totalarquivos as totalarquivos,
                            a.id_curso
    					');

		$this->db->from('prova a ');   				
		$this->db->join('usuario b ', 'b.id = a.id_professor','inner');
		$this->db->join('curso c ','c.id = a.id_curso','inner');
		$this->db->join('turno e ',' e.id = a.id_turno','inner');
		$this->db->join('dia f ',' f.id = a.id_dia','inner');
		$this->db->join('periodo g ',' g.id = a.id_periodo','inner');
		$this->db->join('prova_status h ',' h.id = a.id_status','inner');
		$this->db->where('id_status', 2);
		$this->db->where('a.id_curso',$id_curso);
        $this->db->order_by('professor','ASC');

		return $this->db->get()->result();
		
	}

	function sim($id_prova){
        $dataHoraImpressao = date("Y-m-d h:i:s");
        $data =  array('id_status_impressao' => 4, 'datahora_impressao' => $dataHoraImpressao); 
        $this->db->where('id',$id_prova);
        return $this->db->update('prova',$data);
    }

    function nao($id_prova,$motivo){

        $dataHoraImpressao = date("Y-m-d h:i:s");
        $data =  array('id_status_impressao' => 5, 'datahora_impressao' => $dataHoraImpressao,'motivo_impressao' => $motivo);       
        $this->db->where('id',$id_prova);
        return $this->db->update('prova', $data);
    }

}
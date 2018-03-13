<?php

class Relatorio_model extends CI_Model {

	var $id;
	

    function __construct(){
        parent::__construct();
    }

    public function lista(){

    	$this->db->select('	*, a.id_professor as id, b.nome as nome ');
		$this->db->from('disponibilidade a ');   				
		$this->db->join('usuario b', 'b.id = a.id_professor','inner');
		$this->db->order_by('b.nome','ASC');
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
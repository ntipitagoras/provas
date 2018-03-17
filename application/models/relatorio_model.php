<?php

class Relatorio_model extends CI_Model {

	

    function __construct(){
        parent::__construct();
    }

    public function totalProvasEnviadas(){

    	$this->db->select('*');
    	$this->db->where('id_status',1);
		$this->db->from('prova');   				
        return count($this->db->get()->result());
    }
    public function totalProvasAceitas(){

    	$this->db->select('*');
    	$this->db->where('id_status',2);
		$this->db->from('prova');   				
        return count($this->db->get()->result());
    }
    public function totalProvasRejeitadas(){

    	$this->db->select('id_status');
    	$this->db->where('id_status',3);
		$this->db->from('prova');   				
        return count($this->db->get()->result());
    }


	function aceite($id){
		$dataHoraCoordenador = date("Y-m-d h:i:s");
		$data =  array('id_status' => 2, 'datahora_coordenador' => $dataHoraCoordenador);
		$this->id = $id;		
		$this->db->where('id',$this->id);
		return $this->db->update('prova',$data);
	}

function getAllCursos(){

$this->db->select('id, descricao');
$this->db->from('curso');
return $this->db->get()->result();

}

function getTotalCurseEnviados($id){

$this->db->select('*');
$this->db->where('id_status',1);
$this->db->where('id_curso',$id);
$this->db->from('prova');
return count($this->db->get()->result());


}

function getTotalCurseAceitos($id){

$this->db->select('*');
$this->db->where('id_status',2);
$this->db->where('id_curso',$id);
$this->db->from('prova');
return count($this->db->get()->result());


}

function getTotalCurseRejeitados($id){
$this->db->select('*');
$this->db->where('id_status',3);
$this->db->where('id_curso',$id);
$this->db->from('prova');
return count($this->db->get()->result());

}

function getTotalProvasImpressas(){
$this->db->select('id_status_impressao');
$this->db->where('id_status_impressao',4);
$this->db->from('prova');
return count($this->db->get()->result());

}

function getTotalProvasNaoImpressas(){
$this->db->select('id_status_impressao');
$this->db->where('id_status_impressao',5);
$this->db->from('prova');
return count($this->db->get()->result());

}

function getTotalProvasAguardando(){
$this->db->select('id_status_impressao');
$this->db->where('id_status_impressao',0);
$this->db->from('prova');
return count($this->db->get()->result());

}

}
<?php

class Turma_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_turma(){

    	$this->db->select(' id, descricao');
		$this->db->from('turma');  
		$this->db->order_by('descricao','ASC') ;				
        return $this->db->get()->result();
    }

}
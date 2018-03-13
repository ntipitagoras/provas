<?php

class Turma_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_turma(){

    	$this->db->distinct();
    	$this->db->select('turma');
		$this->db->from('ensalamento');  
		$this->db->order_by('turma','ASC') ;				
        return $this->db->get()->result();
    }

}
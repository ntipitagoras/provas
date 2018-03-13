<?php

class Curso_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_curso(){

    	$this->db->select('c.id as id, c.descricao as nome');
		$this->db->from('curso c '); 
        $this->db->order_by('nome','ASC');  				
        return $this->db->get()->result();
    }

}
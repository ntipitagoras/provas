<?php

class Turno_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_turno(){

    	$this->db->select('id, descricao');
		$this->db->from('turno');   				
		//$this->db->join('turno t ', 't.id = c.id_turno','inner');
		//$data['conexoes'] = $this->db->get()->result(); 
        return $this->db->get()->result();
    }

}
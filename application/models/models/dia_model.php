<?php

class Dia_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_dia(){

    	$this->db->select('id, descricao');
		$this->db->from('dia');   				
		//$this->db->join('turno t ', 't.id = c.id_turno','inner');
		//$data['conexoes'] = $this->db->get()->result(); 
        return $this->db->get()->result();
    }

}
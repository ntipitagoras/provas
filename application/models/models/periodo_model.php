<?php

class Periodo_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_periodo(){

    	$this->db->select('id, descricao');
		$this->db->from('periodo');   				
		//$this->db->join('turno t ', 't.id = c.id_turno','inner');
		//$data['conexoes'] = $this->db->get()->result(); 
        return $this->db->get()->result();
    }

}
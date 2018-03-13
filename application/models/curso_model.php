<?php

class Curso_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    
    public function list_curso(){
            
            $this->db->select('
            									c.id as id, 
            									c.descricao as nome, 
            									c.data_liberacao as data_liberacao, 
            									c.grupo as grupo');
            $this->db->from('curso c ');
            $this->db->order_by('nome','ASC');  				
            return $this->db->get()->result();
    }

}
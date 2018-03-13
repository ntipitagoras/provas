<?php

class Unidade_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    public function listarUnidades($idUnidade)
    {
    	$this->db->order_by('descricao', 'ASC');
    	$this->db->where('id',$idUnidade);
    	return $this->db->get('unidade')->result();
    }

    public function listar()
    {
    	$this->db->order_by('descricao', 'ASC');
    	return $this->db->get('unidade')->result();
    }

}
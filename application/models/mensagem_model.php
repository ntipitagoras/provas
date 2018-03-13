<?php

class Mensagem_model extends CI_Model 
{


    function __construct()
    {
        parent::__construct();
    }

    
    public function listarMensagem()
    {
    	$this->db->select('*');
		$this->db->from('mensagem');
        $this->db->order_by('id','DESC');  				
        return $this->db->get()->result();
    }

    public function cadastrarMensagem()
    {
    	$data = $_POST;
    	return $this->db->insert('mensagem',$data);
    }

    public function removerMensagem($id)
    {
    	$this->db->where('id',$id);
    	return $this->db->delete('mensagem');
    }

}
<?php

class Avaliar_model extends CI_Model {

	var $id;

    function __construct(){
        parent::__construct();
    }

    public function listarCoordenadores(){

    	$this->db->where('nivel_coordenador','1');
    	$this->db->order_by('nome', 'ASC');
    	return $this->db->get('usuario')->result();
    }

    public function listar(){

        $this->db->select(  'a.id_avaliador as id_avaliador, 
                            a.id_avaliado as id_avaliado, 
                            b.nome as avaliador, 
                            c.nome as avaliado,
                            a.p11 as p11,a.p12 as p12,
                            a.p21 as p21,a.p22 as p22, 
                            a.p31 as p31,a.p32 as p32,
                            a.p41 as p41,a.p42 as p42,a.p43 as p43, 
                            a.p51 as p51, 
                            a.p61 as p61,a.p62 as p62,
                            a.data as data'
                        );
        $this->db->from('avaliar a ');                  
        $this->db->join('usuario b ', 'b.id = a.id_avaliador','inner');
        $this->db->join('usuario c ','c.id = a.id_avaliado','inner');
        $this->db->order_by('avaliador','ASC');
        return $this->db->get()->result();
    }

    public function listarAvaliacoes($id){

    	$this->db->select(	'a.id_avaliador as id_avaliador, 
    						a.id_avaliado as id_avaliado, 
    						b.nome as avaliador, 
    						c.nome as avaliado,
    						a.p11 as p11,a.p12 as p12,
    						a.p21 as p21,a.p22 as p22, 
    						a.p31 as p31,a.p32 as p32,
    						a.p41 as p41,a.p42 as p42,a.p43 as p43, 
    						a.p51 as p51, 
    						a.p61 as p61,a.p62 as p62,
    						a.data as data'
    					);
		$this->db->from('avaliar a ');   				
		$this->db->join('usuario b ', 'b.id = a.id_avaliador','inner');
		$this->db->join('usuario c ','c.id = a.id_avaliado','inner');
		$this->db->where('a.id_avaliador', $id);
		//$this->db->order_by('soma','DESC');
        return $this->db->get()->result();
    }

    public function getAvaliacao($avaliador,$avaliado){

    	$this->db->select('*');
		$this->db->from('avaliar');   				
		$this->db->where('id_avaliador', $avaliador);
		$this->db->where('id_avaliado', $avaliado);
        return $this->db->get()->result();
    }

	function insert(){
		$data = $_POST;
		return $this->db->insert('avaliar',$data);
	}
	
	function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('avaliar',$this);
	}
}
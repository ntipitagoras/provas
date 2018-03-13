<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function login($cpf,$senha) {        
		$this->db->where('cpf',$cpf);
		$this->db->where('senha',$senha);
        $usuario = $this->db->get('usuario')->result();
		return $usuario; // RETORNA usuario         
    }

    function verificaCpf($cpf){
        $this->db->where('cpf',$cpf);
        $usuario = $this->db->get('usuario')->result();
        return $usuario;  
    }
    
    function cadastro($dados){    	
        return $this->db->insert('usuario', $dados);
    }

    function getUsuarioId($id){
        $rows = array(); //esta variavel manterá todos os resultados
        $this->db->where('id',$id);
        $query = $this->db->get('usuario');

        foreach($query->result_array() as $row){    
            $rows[] = $row; //adicionar o resultado buscado para o vetor rows;
        }
       return $rows; // retorna rows, e nao a variavel row
    }     

    public function lista_usuarios()
    {
        $this->db->order_by('nome','ASC');
        $query = $this->db->get('usuario');
        return $query->result();
    }

    public function lista_usuarios_evento($id_evento)
    {
        $this->db->select('b.nome, b.cpf');
        $this->db->from('eventos_usuario a');
        $this->db->join('usuario b','b.id = a.id_usuario','inner');
        $this->db->where('a.id_evento_cadas', $id_evento);
        $this->db->order_by('nome','ASC');
        //$query = $this->db->get('eventos_usuario');
        return $this->result();
    }
}
<?php

class Tipo_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

    public function list_tipo(){
        return $this->db->get('tipo')->result();
    }


}
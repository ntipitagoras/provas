<?php

class Titulacao_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    public function lista()
    {
        return $this->db->get('titulacao')->result();
    }

}
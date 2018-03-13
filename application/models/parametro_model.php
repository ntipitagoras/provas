<?php

class Parametro_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }


	public function getParametros()
	{
		$data = $this->db->get('parametros')->result();
		return $data;
	}

}
<?php

class Logs_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    
public function salvarLogs($dados)
{


   $this->db->insert('logs',$dados);



}




}
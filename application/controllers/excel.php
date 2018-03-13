<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Controller 
{
     
    public function __construct () 
    {
        parent::__construct();
        $this->load->library('Classes/PHPExcel.php');
    }
    
}

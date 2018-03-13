<?php

 function __construct()
	{
		parent::__construct();
     
	    
		
	}




function gravarLogs($id, $usuario, $nivel_professor, $nivel_coordenador, $nivel_operador, $nivel_tercerizado, $nivel_administrador, $funcao)
 {

$CI =& get_instance();
$CI->load->library('user_agent');

$datahora  = date('m-m-Y h:i:s');
$hostname  = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip        = $_SERVER["REMOTE_ADDR"];


if ($CI->agent->is_browser())
{
    $navegador = $CI->agent->browser().' '.$CI->agent->version();
}

$os = $CI->agent->platform();



$dados = array (
          'id_usuario'          => $id,
          'usuario'             => $usuario,
          'nivel_professor'     => $nivel_professor,
          'nivel_coordenador'   => $nivel_coordenador,
          'nivel_operador'      => $nivel_operador,
          'nivel_tercerizado'   => $nivel_tercerizado,
          'nivel_administrador' => $nivel_administrador,
          'funcao'              => $funcao,
          'data_hora'           => $datahora,
          'hostname'            => $hostname,
          'ip_adress'           => $ip,
          'navegador'           => $navegador,
          'sistema_operacional' => $os,
     );
$CI =& get_instance();
$CI->load->model('logs_model', 'logs');
$CI->logs->salvarLogs($dados);

}






?>
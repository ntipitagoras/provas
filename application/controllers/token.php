<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {

	function __construct(){
	   parent::__construct();

	   if (!$this->session->userdata('session_id') || !$this->session->userdata('id_professor')) {
			redirect ("home");
		}

    $this->load->helper('enviasms_helper');
    $this->load->helper('gerarlogs_helper');
    $this->load->library('encrypt');
	}

	public function index()	{



 $celular = $this->session->userdata('celular');
 if ($celular==NULL || strlen($celular)!=11) {
 	echo "<script>alert('Nenhum número de celular cadastrado ou número incorreto, favor procurar o coordenador para atualizar os dados');window.location='home';</script>";

 }


$this->load->view('home_header_view');
$this->load->view('token_view');
$this->load->view('home_footer_view');


if (isset($_COOKIE['token_sms'])) {

	
	
}else{
//gera pin de 6 dígitos para enviar por sms
$pin_sms = "";
for($a=0; $a<6; $a++){
$pin_sms .= rand(1,9);//sorteia 1 numero de 0 a 9
}
$pin_codificado = $this->encrypt->encode($pin_sms);
setcookie("token_sms", $pin_codificado, time()+120);
//echo $pin_sms;
sendsms($pin_sms, $celular);
}



	}// fim da função


public function validaToken(){

   
if (isset($_COOKIE['token_sms'])) {
$token   = $this->input->post('token');
$pin_decodificado = $this->encrypt->decode($_COOKIE['token_sms']);


$igual = strcmp($token, $pin_decodificado);
if ($igual==0) {
	echo '1';
	$dados = array('logado' => TRUE );
	$this->session->set_userdata($dados);

gravarLogs($this->session->userdata('id_professor'),$this->session->userdata('nome'), $this->session->userdata('nivel_professor'), $this->session->userdata('nivel_coordenador') , $this->session->userdata('nivel_operador'),  $this->session->userdata('nivel_tercerizado'), $this->session->userdata('nivel_administrador')  , 'Login no sistema');



}else{
	echo "2";
	gravarLogs($this->session->userdata('id_professor'),$this->session->userdata('nome'), $this->session->userdata('nivel_professor'), $this->session->userdata('nivel_coordenador') , $this->session->userdata('nivel_operador'),  $this->session->userdata('nivel_tercerizado'), $this->session->userdata('nivel_administrador')  , 'Tentativa de Login - Código Pin incorreto');
}

	
}else{
echo "3";  // Se não existir o cookie quando a função for chamada

}












}








}

<?php

class Gerarsenha extends CI_Controller {
	



 function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	    
		
	}


 function index(){
$senha = $this->input->post('senha');
$newsenha = $this->encrypt->encode($senha);
 
echo "Insira uma senha\n";
echo "<form id='gerar' action='".base_url()."gerarsenha'". "method='post'>";
echo "<input type='text' name='senha' placeholder='digite a senha'> ";
echo "<input type='submit' value='Gerar Senha' name='enviar'>";
echo "<textarea name='resultado' form='gerar' rows='4' cols='40'>";
if (isset($_POST['enviar'])) {
	echo $newsenha;
}
echo "</textarea>"; 
echo "</form>";






}
}



?>
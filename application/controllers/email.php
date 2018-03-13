<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

 	public function index()
	{
		$this->load->view('email');
	}

	public function enviar($subject,$from,$message)
	{
		$to 	= 'contato@sse.pitagorasslz.com.br';
		//$para 	= $this->input->post('txt_para', TRUE);
		//$msg 	= $this->input->post('txt_msg', TRUE);

		$this->load->library('email');
		$this->email->initialize();
		$this->email->subject($subject);
		$this->email->from($to);
		$this->email->to($from);
		$this->email->message($message);

		$this->email->send();
		//echo $this->email->print_debugger();


	}
}
<?php

class Configuracao_model extends CI_Model {

	var $id_professor;
	var $novasenha;
	var $cpf;
	var $rg;
	var $email;
	var $celular;
	var $senha;

	function __construct(){
		parent::__construct();
	}

	public function updateDadosUsuario($id_professor,$rg,$email,$celular,$senha,$tepms,$teped,$tepfm,$appca,$titulacao,$appcoa,$lclpa,$lclpoa,$tpac,$tpar,$tlclap,$pid,$pir,$pptac,$pdprpn,$dataHora)
	{
		$data =  array(
						'rg' 		=> $rg,
						'email' 	=> $email,
						'celular' 	=> $celular,
						'senha'	 	=> $senha,
						'tepms'	 	=> $tepms,
						'teped'	 	=> $teped,
						'tepfm'	 	=> $tepfm,
						'appca'	 	=> $appca,
						'titulacao'	=> $titulacao,
						'appcoa' 	=> $appcoa,
						'lclpa'     => $lclpa,
						'lclpoa'    => $lclpoa,
						'tpac'	 	=> $tpac,
						'tpar'	 	=> $tpar,
						'tlclap' 	=> $tlclap,
						'pid'	 	=> $pid,
						'pir'	 	=> $pir,
						'pptac'	 	=> $pptac,
						'pdprpn'	=> $pdprpn,
																'data'                  => $dataHora
						);

		$this->db->where('id',$id_professor);
		$this->db->update('usuario', $data);
	}

	public function insertDocumentoUsuario($id_usuario,$id_documento,$path,$dataHora)
	{
		$data =  array(
						'id_usuario'      => $id_usuario,
						'id_documento'  => $id_documento,
						'path'            => $path,
						'data'            => $dataHora,
						);

		$this->db->insert('documento', $data);
	}

	public function novasenha($id_professor,$novasenha){
		$data =  array('senha' => $novasenha);
		$this->db->where('id',$id_professor);
		$this->db->update('usuario', $data);
		redirect('home2/logout');
	}

	public function searchCPF()
	{
		$cpf = $this->input->post('cpf');
		$this->db->where('cpf',$cpf);
		$data = $this->db->get('usuario')->result();
		return $data;
	}

	public function documento()
	{
		$this->db->order_by('descricao','ASC');
		return $this->db->get('documento_tipo')->result();
	}

	public function searchDocumento($idUsuario)
	{
		$this->db->where('id_usuario',$idUsuario);
		$this->db->order_by('id_documento','ASC');
		return $this->db->get('documento')->result();
	}

}
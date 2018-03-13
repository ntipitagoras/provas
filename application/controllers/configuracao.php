<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
			//redirect ("home");
		//}
		$this->load->model('usuario_model','usuario');
		$this->load->model('configuracao_model','configuracao');
		$this->load->model('titulacao_model');
		$this->load->helper('gerarlogs_helper');
		$this->load->library('encrypt');
	}

	public function index()
	{
	}


	public function gerarPlanilhaExcel()
	{
			$data['professores']  = $this->usuario->listaProfessor();

			$this->load->view('home2_header_view');
			$this->load->view('gerar_planilha_excel_view',$data);
			$this->load->view('home2_footer_view');
	}

	public function gerarPlanilhaProfessor()
	{

		$ids  = $this->input->post('ids');
		$data = $this->usuario->listaIdProfessor($ids);

		//INSTANCIA DA BIBLIOTECA PHPEXCEL
		$this->load->library('Classes/PHPExcel.php');

		$this->phpexcel->getProperties()->setCreator("Prof. Allisson Jorge Silva Almeida")
																		->setLastModifiedBy("Prof. Allisson Jorge Silva Almeida")
																		->setTitle("Documento do Excel")
																		->setSubject("Documento do Excel")
																		->setDescription("Regulatório")
																		->setKeywords("Regulatório")
																		->setCategory("Regulatório");

		$this->phpexcel->setActiveSheetIndex(0)
									->setCellValue('B1', 'Nome do Professor')
									->setCellValue('C1', 'CPF')
									->setCellValue('D1', 'Titulação')
									->setCellValue('E1', 'Regime de Trabalho')
									->setCellValue('F1', 'Tempo de Experiência Profissional no Magisterio Superior')
									->setCellValue('G1', 'Tempo de Experiência Profissional na Educação Básica')
									->setCellValue('H1', 'Tempo de Experiência Profissional Fora do Magisterio')
									->setCellValue('I1', 'Docente com formação/capacitação/experiência pedagógica?')
									->setCellValue('J1', 'Nº de Artigos publicados em periódicos científicos na área')
									->setCellValue('K1', 'Nº de Artigos publicados em periódicos científicos em outras áreas')
									->setCellValue('L1', 'Nº de Livros ou capítulos em livros publicados na área')
									->setCellValue('M1', 'Nº de Livros ou capítulos em livros publicados em outras áreas')
									->setCellValue('N1', 'Nº de Trabalhos publicados em anais (completos)')
									->setCellValue('O1', 'Nº de Trabalhos publicados em anais (resumos)')
									->setCellValue('P1', 'Nº de Traduções de livros, capítulos de livros ou artigos publicados')
									->setCellValue('Q1', 'Nº de  Propriedade intelectual depositada')
									->setCellValue('R1', 'Nº de Propriedade intelectual registrada')
									->setCellValue('S1', 'Nº de Projetos e/ou produções técnicas artísticas e culturais')
									->setCellValue('T1', 'Nº de Produção didático-pedagógica relevante, publicada ou não');

				$styleArray = array(
														'font'  => array(
																							'bold'  => false,
																							'color' => array('rgb' => '000000'),
																							'size'  => 8,
																							'name'  => 'Arial'
														),
														'alignment' => array(
																									'wrap' => (TRUE),
																									'shrinkToFit' => (TRUE),
																									'indent' => (0)
																								)
				);


				$this->phpexcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('K1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('L1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('M1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('N1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('O1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('P1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('Q1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('R1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('S1')->applyFromArray($styleArray);
				$this->phpexcel->getActiveSheet()->getStyle('T1')->applyFromArray($styleArray);
		$l = 1;
		$i = 0;
		foreach ( $data as $d )
		{
				$l++;
				$i++;
				$colunaA = 'A'.$l;        $colunaB = 'B'.$l;        $colunaC = 'C'.$l;        $colunaD = 'D'.$l;        $colunaE = 'E'.$l;
				$colunaF = 'F'.$l;        $colunaG = 'G'.$l;        $colunaH = 'H'.$l;        $colunaI = 'I'.$l;        $colunaJ = 'J'.$l;
				$colunaK = 'K'.$l;        $colunaL = 'L'.$l;        $colunaM = 'M'.$l;        $colunaN = 'N'.$l;        $colunaO = 'O'.$l;
				$colunaP = 'P'.$l;        $colunaQ = 'Q'.$l;        $colunaR = 'R'.$l;        $colunaS = 'S'.$l;        $colunaT = 'T'.$l;

				if( $d->titulacao == 0 ){ $titulacao =  'Não informado';}
				if( $d->titulacao == 1 ){ $titulacao =  'Graduação'; }
				if( $d->titulacao == 2 ){ $titulacao =  'Especialista';}
				if( $d->titulacao == 3 ){ $titulacao =  'Mestrado';}
				if( $d->titulacao == 4 ){ $titulacao =  'Doutorado';}
				if( $d->titulacao == 5 ){ $titulacao =  'Pos-doutorado';}


				$this->phpexcel->setActiveSheetIndex(0)
				->setCellValue($colunaA, $i)
				->setCellValue($colunaB, $d->nome)
				->setCellValue($colunaC, $d->cpf)
				->setCellValue($colunaD, $titulacao)
				->setCellValue($colunaE, '')
				->setCellValue($colunaF, $d->tepms)
				->setCellValue($colunaG, $d->teped)
				->setCellValue($colunaH, $d->tepfm)
				->setCellValue($colunaI, '')
				->setCellValue($colunaJ, $d->appca)
				->setCellValue($colunaK, $d->appcoa)
				->setCellValue($colunaL, $d->lclpa)
				->setCellValue($colunaM, $d->lclpoa)
				->setCellValue($colunaN, $d->tpac)
				->setCellValue($colunaO, $d->tpar)
				->setCellValue($colunaP, $d->tlclap)
				->setCellValue($colunaQ, $d->pid)
				->setCellValue($colunaR, $d->pir)
				->setCellValue($colunaS, $d->pptac)
				->setCellValue($colunaT, $d->pdprpn);

				$styleArray2 = array(
														'font'  => array(
														'bold'  => false,
														'color' => array('rgb' => '000000'),
														'size'  => 8,
														'name'  => 'Arial'
														)
				);

				$this->phpexcel->getActiveSheet()->getStyle($colunaA)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaB)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaC)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaD)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaE)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaF)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaG)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaH)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaI)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaJ)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaK)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaL)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaM)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaN)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaO)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaP)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaQ)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaR)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaS)->applyFromArray($styleArray2);
				$this->phpexcel->getActiveSheet()->getStyle($colunaT)->applyFromArray($styleArray2);



		}

		$this->phpexcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('P1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('Q1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('R1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('S1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('T1')->getFont()->setBold(true);
		$this->phpexcel->getActiveSheet()->getStyle('U1')->getFont()->setBold(true);



		$this->phpexcel->getActiveSheet()->setTitle('PLANILHA DE PROFESSORES');
		$this->phpexcel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
		$objWriter->save('php://output');

	}


	public function dadosProfessor()
	{
		$idUsuario                  = $this->session->userdata('id_professor');
		$data['usuario']            = $this->usuario->searchIdProfessor($idUsuario);
		$data['titulacao']          = $this->titulacao_model->lista();
		$data['documentos']         = $this->configuracao->documento();
		$data['documentosUsuario']  = $this->configuracao->searchDocumento($idUsuario);

		$this->load->view('home2_header_view');
		$this->load->view('update_dados_professor_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function envioDocumento()
	{
		$data['usuario']            = $this->usuario->searchIdProfessor($this->session->userdata('id_professor'));
		$data['documentos']         = $this->configuracao->documento();
		$data['documentosUsuario']  = $this->configuracao->searchDocumento($this->session->userdata('id_professor'));

		$this->load->view('home2_header_view');
		$this->load->view('update_dados_documento_professor_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function documentoProfessor()
	{

			$x = $this->input->post('btnPesquisar');

			if( $x == 'Pesquisar' )
			{
					$idProfessor              	= $this->input->post('idProfessor');
					$data['usuarios']         	= $this->usuario->listaProfessor();
					$data['documentos']   	= $this->configuracao->searchDocumento($idProfessor);

					$this->load->view('home2_header_view');
					$this->load->view('documentos_professor_view',$data);
					$this->load->view('home2_footer_view');
			}
			else
			{
					$data['usuarios']   = $this->usuario->listaProfessor();

					$this->load->view('home2_header_view');
					$this->load->view('documentos_professor_view',$data);
					$this->load->view('home2_footer_view');
			}

	}


	public function updateDadosProfessor()
	{

			//DADOS DO POST
			$id_usuario     	= $this->session->userdata('id_professor');
			$rg             		= $this->input->post('rg');
			$email          = $this->input->post('email');
			$celular        = $this->input->post('celular');
			$senha          = $this->encrypt->encode($this->input->post('senha')); 
			$tepms          = $this->input->post('tepms');
			$teped          = $this->input->post('teped');
			$tepfm          = $this->input->post('tepfm');
			$appca          = $this->input->post('appca');
			$titulacao      = $this->input->post('titulacao');
			$appcoa         = $this->input->post('appcoa');
			$lclpa          = $this->input->post('lclpa');
			$lclpoa         = $this->input->post('lclpoa');
			$tpac           = $this->input->post('tpac');
			$tpar           = $this->input->post('tpar');
			$tlclap         = $this->input->post('tlclap');
			$pid            = $this->input->post('pid');
			$pir            = $this->input->post('pir');
			$pptac          = $this->input->post('pptac');
			$pdprpn         = $this->input->post('pdprpn');

				if( $this->input->post('acao') == 'Atualizar' )
				{
					$dataHora = date('Y-m-d H:m:s');

					$this->configuracao->updateDadosUsuario($id_usuario,$rg,$email,$celular,$senha,$tepms,$teped,$tepfm,$appca,$titulacao,$appcoa,$lclpa,$lclpoa,$tpac,$tpar,$tlclap,$pid,$pir,$pptac,$pdprpn,$dataHora);
					$this->session->set_flashdata('msg', 'Dados atualizados com sucesso!');

					gravarLogs($this->session->userdata('id_professor'),$this->session->userdata('nome'), $this->session->userdata('nivel_professor'), $this->session->userdata('nivel_coordenador') , $this->session->userdata('nivel_operador'),  $this->session->userdata('nivel_tercerizado'), $this->session->userdata('nivel_administrador')  , 'Alteração de dados cadastrais');
	
					redirect('configuracao/dadosProfessor');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Erro ao atualizar os dados!');
					redirect('configuracao/dadosProfessor');
				}
	}

	public function updateDadosDocumentoProfessor()
	{

			//DADOS DO POST
			$id_documento = $this->input->post('id_documento');

			//UPLOADS DE ARQUIVOS DO USUARIO
			$file     = $_FILES['userfile'];
			$numFile  = count(array_filter($file['name']));

			//PASTA DE LOCALIZAÇÃO
			$folder   = 'uploads/documentos/';

			//REQUISITOS
			$permite  = array('application/pdf','image/png','image/jpeg');
			$maxSize  = 1024 * 1024 * 1024 * 5;

			//MENSAGENS
			$msg    = array();
			$errorMsg = array(
				1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
				2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
				3 => 'o upload do arquivo foi feito parcialmente',
				4 => 'Não foi feito o upload do arquivo'
			);

			$path = '';

			if( $numFile > 0 )
			{
					for($i = 0; $i < $numFile; $i++)
					{
							$name   = $file['name'][$i];
							$type   = $file['type'][$i];
							$size   = $file['size'][$i];
							$error  = $file['error'][$i];
							$tmp    = $file['tmp_name'][$i];

							$extensao = @end(explode('.', $name));
							$novoNome = rand().".$extensao";

							if($error != 0)
							{
								$msg[] = "<strong>$name :</strong> ".$errorMsg[$error];
							}elseif(!in_array($type, $permite))
							{
								$msg[] = "<strong>$name :</strong> Erro imagem não suportada!";
							}elseif($size > $maxSize)
							{
								$msg[] = "<strong>$name :</strong> Erro imagem ultrapassa o limite de 5MB";
							}else
							{
								if(move_uploaded_file($tmp, $folder.''.$novoNome))
								{
									$path .=  $folder.''.$novoNome;
								}
								else
								{
									$path .=  'Erro';
								}
							}
							foreach( $msg as $m)
							{
								echo $m;
							}
					}
				}
				//FIM - UPLOADS DE ARQUIVOS DO USUARIO

				if( $this->input->post('acao') == 'Enviar' )
				{
					$dataHora = date('Y-m-d H:m:s');
					$id_usuario = $this->session->userdata('id_professor');
					$this->configuracao->insertDocumentoUsuario($id_usuario,$id_documento,$path,$dataHora);
					$this->session->set_flashdata('msg', 'Dados atualizados com sucesso!');
					redirect('configuracao/envioDocumento');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Erro ao atualizar os dados!');
					redirect('configuracao/envioDocumento');
				}
	}

	public function searchPasswordEmail()
	{
		$this->load->view('home_header_view');
		$this->load->view('search_password_view');
		$this->load->view('home_footer_view');
	}

	public function sendPasswordForEmail()
	{

			if($this->input->post('acao') == 'enviar')
			{
				$cpf = $this->input->post('cpf');
				$this->load->model('configuracao_model','configuracao');
				$data =  $this->configuracao->searchCpf($cpf);

				foreach( $data as $d )
				{
					$id     = $d->id;
					$email  = $d->email;
					$senha  = $d->senha;
				}

				if( !isset($id) )
				{
					$id = 0;
				}

				if( $id > 0 )
				{

						$de     = 'provas@see.pitagorasslz.com.br';
						$para   = $email;
						$msg    = "<br>";
						$msg    = "Segue senha de acesso ao Sistema de Provas da Faculdade Pitágoras <br><br>";
						$msg   .= "Senha: ".$senha;

						$this->load->library('email');

						$this->email->from($de, 'PortalProvasPitagoras.vai.la');
						$this->email->to($para);
						$this->email->subject('Lembrete de Senha');
						$this->email->message($msg);

						if( $this->email->send() )
						{
							echo "OK";
							//$this->session->set_flashdata('msg', 'Senha enviada com Sucesso!');
							//redirect('configuracao/searchPasswordEmail');
						}
						else
						{
							echo "Erro";
						}
						/*else{
							$this->session->set_flashdata('msg', 'CPF não encontrado!');
							redirect('configuracao/searchPasswordEmail');
						}*/
				}else{
					$this->session->set_flashdata('msg', 'CPF não existe!');
					redirect('configuracao/searchPasswordEmail');
				}

				echo $this->email->print_debugger();

			}
	}

	public function searchNewPassword($msg = null)
	{
		$data['msg'] = $msg;
		$this->load->view('home2_header_view');
		$this->load->view('search_new_password_view.php',$data);
		$this->load->view('home2_footer_view');
	}

	public function updateNewPassword()
	{
		$this->load->model('configuracao_model','configuracao');
		$id_professor = $this->session->userdata('id_professor');
		$novasenha    = $this->input->post('password');

		if( $this->input->post('acao') == 'atualizar' ){
			$this->configuracao->novasenha($id_professor,$novasenha);
			$msg = 'Dados atualizados com sucesso!';
		}else{
			$msg = 'Erro ao atualizar os dados!';
		}
		$this->searchNewPassword($msg);
	}

	public function searchDataProfile($msg = null)
	{
		$id_professor = $this->session->userdata('id_professor');
		$this->db->where('id', $id_professor);
		$data['usuario'] =  $this->db->get('usuario')->result();
		$data['msg'] = $msg;
		$this->load->view('home2_header_view');
		$this->load->view('edit_data_profile_view',$data);
		$this->load->view('home2_footer_view');
	}

	public function updateDataProfile(){

		$id_professor = $this->input->post('id_professor');

		if( $this->input->post('acao') == 'atualizar' ){
			$data['email'] = $this->input->post('email');
			$this->db->where('id',$id_professor);
			$this->db->update('usuario',$data);
			$msg = 'Dados atualizados com sucesso!';
		}else{
			$msg = 'Erro ao atualizar os dados!';
		}
		$this->searchDataProfile($msg);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/Configuracao.php */
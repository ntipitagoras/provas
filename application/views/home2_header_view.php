<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pitágoras - São Luis MA</title>
	<?php
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'PROVAS - Sistemas de Impressao Pitagoras'),
				array('name' => 'keywords', 'content' => 'PROVAS -Sistemas de Impressao Pitagoras'),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html;charset=utf-8', 'type' => 'equiv')
					);
	echo meta($meta);
	?>
		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

		<link href="<?php echo base_url();?>assets/dist/css/timeline.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Morris Charts CSS -->
		<link href="<?php echo base_url();?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script src="<?php echo base_url();?>chart/dist/Chart.bundle.js"></script>
		<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
		<style>
			canvas {
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
			}
		</style>

		<style type="text/css">
		.carregando{
				color:#666;
				display:none;
		}
		</style>
<?php
//Prevent page caching
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Cache-Control: no-cache");
 header("Pragma: no-cache");
?>



<!--End Scripts -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/dataTables.bootstrap.min.js"></script>

		<script>
		$(document).ready(function() {
		$('#tabela').DataTable( {
		initComplete: function () {

			var coluna_filtro = 0;

			this.api().columns().every( function (mostra) {

				var column = this;
				coluna_filtro += 1;
				if (coluna_filtro==1){
					var select = $('<select><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex($(this).val());

							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );

					column.data().unique().sort().each( function ( d, j ) {
						 select.append( '<option value="'+d+'">'+d+'</option>' )

					} );
				}

			} );
		}
		} );
		} );
		</script>

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url(); ?>home2/index">Faculdade Pitágoras - São Luís - MA
				</a>
			</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
							<!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
							</a>-->

									<li><a href="<?php echo base_url();?>home2/logout"><i class="fa fa-sign-out fa-fw"></i> Sair

							<!--<ul class="dropdown-menu dropdown-user">
									<li><a href="<?php //echo base_url();?>configuracao/dadosProfessor"><i class="fa fa-user fa-fw"></i> Dados do Usuário</a>
									</li>-->
									<!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a></li>
									<li class="divider"></li>
									<li><a href="<?php //echo base_url();?>home2/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
									</li>
							</ul>-->
							<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<!-- FIM MENU DO TOPO DIREITO -->





				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<?php
								$id_matricula           	= $this->session->userdata('id_matricula');
								$nivel_professor      	= $this->session->userdata('nivel_professor');
								$nivel_coordenador    	= $this->session->userdata('nivel_coordenador');
								$nivel_operador       	= $this->session->userdata('nivel_operador');
								$nivel_tercerizado    	= $this->session->userdata('nivel_tercerizado');
								$nivel_diretor        		= $this->session->userdata('nivel_diretor');
								$nivel_regulatorio    	= $this->session->userdata('nivel_regulatorio');
								$nivel_rh             		= $this->session->userdata('nivel_rh');
								$nivel_administrador  	= $this->session->userdata('nivel_administrador');

									echo "<center><img src='".base_url()."assets/imgs/logo-pitagoras.png' width='50%'></center>";
									echo "<li><a href='".base_url()."home2/index'><i class='fa fa-home'></i> &nbsp;Menu Principal</a></li>";

									//echo "<li><a href='".base_url()."configuracao/dadosProfessor' class='text-danger'><i  class='fa fa-user'></i> &nbsp;Atualização Cadastral</a></li>";

									//ACESSO DO PROFESSOR
									if( $nivel_professor == 1 )
									{
										echo "<li><a href='#' class='text-danger'><i class='fa fa-user'></i>&nbsp;Atualização Cadastral<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."configuracao/dadosProfessor'> &nbsp;Acadêmico</a></li>";
													echo "<li><a href='".base_url()."configuracao/envioDocumento'> &nbsp;Documentos </a></li>";
												echo "</ul>";
											echo "</li>";


										echo "<li>";
											echo "<li><a href='".base_url()."prova/index'><i class='fa fa-files-o fa-fw'></i>Enviar Prova</a></li>";
											echo "<li><a href='".base_url()."disponibilidade/index'> <i class='fa fa-calendar-o'></i>&nbsp;Disponibilidade </a></li>";
											echo "<li><a href='".base_url()."horario/index'><i class='fa fa-calendar'></i>&nbsp;Horário Pessoal </a></li>";
										echo "</li>";
									}

									//ACESSO DO COORDENADOR
									if( $nivel_coordenador == 1 )
									{
										echo "<li><a href='".base_url()."prova/index'><i class='fa fa-files-o fa-fw'></i> &nbsp;Enviar Prova</a></li>";
										echo "<li><a href='".base_url()."coordenador/index'><i class='fa fa-files-o fa-fw'></i> &nbsp;Provas Coordenador</a></li>";

										echo "<li><a href='#' class='text-danger'><i class='fa fa-user'></i>&nbsp;Atualização Cadastral<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."configuracao/dadosProfessor'> &nbsp;Acadêmico</a></li>";
													echo "<li><a href='".base_url()."configuracao/envioDocumento'> &nbsp;Documentos </a></li>";

													echo "<li><a href='".base_url()."usuarios/index'><i class='fa fa-user'></i> &nbsp;Usuários</a></li>";
										
												echo "</ul>";

											echo "</li>";


										echo "<li><a href='#'><i class='fa fa-calendar-o'></i>&nbsp;Disponibilidade<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."disponibilidade/index'> &nbsp;Pessoal </a></li>";
													echo "<li><a href='".base_url()."disponibilidade/listaDisponibilidadeProfessores'> &nbsp;Professores </a></li>";
													echo "<li><a href='".base_url()."disponibilidade/graficos'> &nbsp;Gráficos </a></li>";
												echo "</ul>";
											echo "</li>";

										echo "<li><a href='#'><i class='fa fa-calendar'></i>&nbsp;Horário<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."horario/index'>&nbsp;Horário Pessoal </a></li>";
													echo "<li><a href='".base_url()."horario/professores'>&nbsp;Horário Professores</a></li>";
													//echo "<li><a href='".base_url()."horario/cargaHoraria'>&nbsp;Carga Horária</a></li>";
												echo "</ul>";
										echo "</li>";

										echo "<li><a href='#'><i class='fa fa-graduation-cap'></i>&nbsp;Regulatório<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."configuracao/documentoProfessor'>&nbsp;Documentos</a></li>";
													echo "<li><a href='".base_url()."configuracao/gerarPlanilhaExcel'>&nbsp;Gerar Arquivo</a></li>";
												echo "</ul>";
										echo "</li>";


									}



									/*if( $nivel_operador == 1 )
									{

										//echo "<li><a href='#'><i class='fa fa-table fa-fw'></i>&nbsp;Horário<span class='fa arrow'></span></a>";
											echo "<ul class='nav nav-second-level'>";
												echo "<li><a href='".base_url()."horario/index'>&nbsp;Horário Pessoal </a></li>";
												echo "<li><a href='".base_url()."horario/professores'>&nbsp;Horário Professores</a></li>";
												echo "<li><a href='".base_url()."horario/cargaHoraria'>&nbsp;Carga Horária Professores</a></li>";
												echo "<li><a href='".base_url()."horario/listarEnsalamento'>&nbsp;Ensalamento</a></li>";
											echo "</ul>";
										echo "</li>";
									}/*

									/*if( $nivel_diretor == 1 )
									{
										echo "<li>";

											echo "<li><a href='#'><i class='fa fa-group'></i> &nbsp;Avaliação <span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."avaliar/index'> &nbsp;Avaliar </a></li>";
													echo "<li><a href='".base_url()."avaliar/relatorios'> &nbsp;Relatórios </a></li>";
												echo "</ul>";
											echo "</li>";

										echo "</li>";
									}*/

									//ACESSO DO TERCERIZADO
									if( $nivel_tercerizado == 1 )
									{
										echo "<li>";
											echo "<a href='".base_url()."impressao/index'><i class='fa fa-print'></i> &nbsp;Impressão de Provas</a>";
										echo "</li>";
										echo "<li>";
										echo "<a href='".base_url()."usuarios/index'><i class='fa fa-user'></i> &nbsp;Usuários</a>";
										echo "</li>";

									}

									if( $nivel_regulatorio == 1 )
									{

										echo "<li><a href='#'><i class='fa fa-graduation-cap'></i>&nbsp;Regulatório<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."configuracao/documentoProfessor'>&nbsp;Documentos</a></li>";
													echo "<li><a href='".base_url()."configuracao/gerarPlanilhaExcel'>&nbsp;Gerar Arquivo</a></li>";
												echo "</ul>";
										echo "</li>";

									}

									if( $nivel_rh == 1 )
									{
											echo "<li><a href='#'><i class='fa fa-comment'></i>&nbsp;Mensagens<span class='fa arrow'></span></a>";
													echo "<ul class='nav nav-second-level'>";
														echo "<li><a href='".base_url()."mensagem/novaMensagem'>&nbsp;Nova Mensagem</a></li>";
													echo "</ul>";
											echo "</li>";
									}

									if( $nivel_administrador == 1 )
									{

										echo "<li><a href='".base_url()."prova/index'><i class='fa fa-files-o fa-fw'></i> &nbsp;Enviar Prova</a></li>";
										echo "<li><a href='".base_url()."coordenador/index'><i class='fa fa-files-o fa-fw'></i> &nbsp;Provas Coordenador</a></li>";

										echo "<li><a href='#'><i class='fa fa-user'></i>&nbsp;Atualização Cadastral<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."configuracao/dadosProfessor'> &nbsp;Acadêmico</a></li>";
													echo "<li><a href='".base_url()."configuracao/envioDocumento'> &nbsp;Documentos </a></li>";
													echo "<li><a href='".base_url()."configuracao/listarProfessor'> &nbsp;Professores </a></li>";
													echo "<li><a href='".base_url()."configuracao/adicionarProfessor'> &nbsp;+ Adicionar Professor </a></li>";
												echo "</ul>";
										echo "</li>";

										echo "<li><a href='#'><i class='fa fa-calendar-o'></i>&nbsp;&nbsp;Disponibilidade<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."disponibilidade/index'> &nbsp;Pessoal </a></li>";
													echo "<li><a href='".base_url()."disponibilidade/listaDisponibilidadeProfessores'> &nbsp;Professores </a></li>";
													echo "<li><a href='".base_url()."disponibilidade/relatorios'> &nbsp;Relatorios </a></li>";
												echo "</ul>";
											echo "</li>";


										echo "<li><a href='#'><i class='fa fa-table fa-fw'></i>&nbsp;Horário<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."horario/index'>&nbsp;Pessoal </a></li>";
													echo "<li><a href='".base_url()."horario/professores'>&nbsp;Professores</a></li>";
													//echo "<li><a href='".base_url()."horario/cargaHoraria'>&nbsp;Carga Horária</a></li>";
													//echo "<li><a href='".base_url()."horario/pesquisa'>&nbsp;Pesquisar Horário</a></li>";
													echo "<li><a href='".base_url()."horario/ensalamento'>&nbsp;Ensalamento</a></li>";
												echo "</ul>";
											echo "</li>";

										echo "<li>";

											echo "<li><a href='#'><i class='fa fa-group'></i> &nbsp;Avaliação <span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."avaliar/index'> &nbsp;Avaliar </a></li>";
													echo "<li><a href='".base_url()."avaliar/relatorios'> &nbsp;Relatórios </a></li>";
												echo "</ul>";
											echo "</li>";

										echo "</li>";


										echo "<li><a href='#'><i class='fa fa-graduation-cap'></i>&nbsp;Regulatório<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."configuracao/documentoProfessor'>&nbsp;Documentos</a></li>";
													echo "<li><a href='".base_url()."configuracao/gerarPlanilhaExcel'>&nbsp;Gerar Arquivo</a></li>";
												echo "</ul>";
										echo "</li>";

									 echo "<li><a href='#'><i class='fa fa-comment'></i>&nbsp;Mensagens<span class='fa arrow'></span></a>";
												echo "<ul class='nav nav-second-level'>";
													echo "<li><a href='".base_url()."mensagem/novaMensagem'>&nbsp;Nova Mensagem</a></li>";
												echo "</ul>";
										echo "</li>";


										echo "<li>";
											echo "<a href='".base_url()."impressao/index'><i class='fa fa-print'></i> &nbsp;Impressão de Provas</a>";
										echo "</li>";

										echo "<li>";
											echo "<a href='".base_url()."arquivos/index'><i class='fa fa-cubes'></i> &nbsp;Carregamento CSV</a>";
										echo "</li>";
									}

							?>




							</ul>
					</div>
					<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
	</nav>

	<!-- FIM DE MENU -->

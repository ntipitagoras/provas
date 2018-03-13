<!DOCTYPE html>
<html lang="en">

	<head>
		<title></title>
		<?php

			$meta = array(
							array('name' => 'robots', 'content' => 'no-cache'),
							array('name' => 'description', 'content' => 'SISPRINT - Sistemas de Impressao Pitagoras'),
							array('name' => 'keywords', 'content' => 'SISPRINT -Sistemas de Impressao Pitagoras'),
							array('name' => 'robots', 'content' => 'no-cache'),
							array('name' => 'Content-type', 'content' => 'text/html;charset=utf-8', 'type' => 'equiv')
						);
			echo meta($meta);
      echo "<link href='".base_url()."assets/css/bootstrap.min.css' rel='stylesheet'>";
      echo "<link href='".base_url()."assets/css/template.css' rel='stylesheet'>";
      
		?>
  
	</head>
<body>

<div class="container">

<div class="row">
      
      <div class="col-md-12">
        <h4 align="left">Olá,  <?php echo $this->session->userdata('nome'); ?></h4>
      </div>
</div>

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url(); ?>sisprint/home2">Principal</a></li>

              <?php
                
                $nivel_professor    = $this->session->userdata('nivel');
                $nivel_coordenador  = $this->session->userdata('id_coordenador');
                $nivel_operador     = $this->session->userdata('id_operador');
                $nivel_tercerizado  = $this->session->userdata('id_tercerizado');              
                
                if( $nivel_professor == 1 and $nivel_coordenador == 0 and $nivel_operador == 0 and $nivel_tercerizado == 0)
                {
                  echo "<li><a href=".base_url()."prova/index>Enviar Prova</a></li>";
                }

                if( $nivel_professor == 1 and $nivel_coordenador == 1 and $nivel_operador == 0 and $nivel_tercerizado == 0)
                {
                  echo "<li><a href=".base_url()."prova/index>Enviar Prova</a></li>";
                  echo "<li><a href=".base_url()."coordenador/index>Provas Coordenador</a></li>";

                }
                if( $nivel_professor == 0 and $nivel_coordenador == 0 and $nivel_operador == 1 and $nivel_tercerizado == 0)
                {
                  echo "<li><a href=".base_url()."operador/index>Envio de Documentos</a></li>";
                }
                if( $nivel_professor == 0 and $nivel_coordenador == 0 and $nivel_operador == 0 and $nivel_tercerizado == 1)
                {
                  echo "<li><a href=".base_url()."impressao/index>Impressao de Provas</a></li>";
                }

                  echo "<li><a href=".base_url()."configuracao/searchNewPassword>Alterar Senha</a></li>";
                  echo "<li><a href=".base_url()."configuracao/searchDataProfile>Alterar E-mail</a></li>";
                  echo "</ul>";
              
              ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><?php echo anchor("home2/logout","Sair","class=btn btn-dander"); ?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


      <!-- Main component for a primary marketing message or call to action -->


	<div class="row">
  		<div class="col-md-12">
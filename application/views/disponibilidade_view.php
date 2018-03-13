
<?php

$dateActual     = date('Y-m-d');
$dataParameter  = $this->session->userdata('data_limite_disponibilidade');
$d          = explode("-",$dataParameter);
$formateDateBr  = $d[2]."/".$d[1]."/".$d[0];

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">

		<?php

		if( $dataParameter > $dateActual )
		{
			if( !empty($disponibilidade) )
			{
				foreach( $disponibilidade as $d )
        			{
		?>
					<br><br>

		        		<form method="post" action="<?php echo base_url(); ?>disponibilidade/update">

					<input type="hidden" name="id_professor" value="<?php echo $this->session->userdata('id_professor'); ?>">

					<ul class="nav nav-tabs">
	  					<li role="presentation" class="active"><a href="#">DISPONIBILIDADE</a></li>
	  				</ul>

	  					<div class="table-responsive">
						  	<table class="table table-bordered">

						  	<tr>
						  		<th>Turno</th>
						  		<th>Segunda</th>
						  		<th>Terça</th>
						  		<th>Quarta</th>
						  		<th>Quinta</th>
						  		<th>Sexta</th>
						  	</tr>

						  	<tr>
						  		<td align='center'>Matutino</td>
						  		<td align='center'>

							    <input type="checkbox" name="pmsegunda" <?php if($d->pmsegunda ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pmterca"<?php if($d->pmterca ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pmquarta"<?php if($d->pmquarta ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pmquinta"<?php if($d->pmquinta ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pmsexta"<?php if($d->pmsexta ==   'on'){echo 'CHECKED';} ?> >
							 </td>

							 <tr>
						  		<td align='center'>Vespertino</td>
						  		<td align='center'>

							    <input type="checkbox" name="pvsegunda" <?php if($d->pvsegunda ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pvterca"<?php if($d->pvterca ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pvquarta"<?php if($d->pvquarta ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pvquinta"<?php if($d->pvquinta ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pvsexta"<?php if($d->pvsexta ==   'on'){echo 'CHECKED';} ?> >
							 </td>

							</tr>

							<tr>
						  		<td align='center'>Noturno</td>
						  		<td align='center'>

							    <input type="checkbox" name="pnsegunda" <?php if($d->pnsegunda ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pnterca"<?php if($d->pnterca ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pnquarta"<?php if($d->pnquarta ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pnquinta"<?php if($d->pnquinta ==   'on'){echo 'CHECKED';} ?> >
							    </td>
							    <td align='center'>
							    <input type="checkbox" name="pnsexta"<?php if($d->pnsexta ==   'on'){echo 'CHECKED';} ?> >
							 </td>

							</tr>

							</table>
						</div>

					<ul class="nav nav-tabs">
	  					<li role="presentation" class="active"><a href="#">MARQUE A(S) DISCIPLINA(S) PRETENDIDA(S)</a></li>
	  				</ul>

	  				<BR>
	  				<span class="label label-danger">ATENÇÃO ::  Caso queira informar disciplinas diferentes das abaixo, informe na caixa de observação.</span>

	  				<BR><BR>

					<?php
						//DISCIPLINAS
						foreach( $disciplinas as $disc)
						{
							echo "<input type='checkbox' name='cod_disciplinas[]' value='".$disc->cod_disciplina."'";
							$var = explode(',',$d->cod_disciplinas);
							$count = count($var);
							$n = 0;
							while($n < $count){
								if( $var[$n] == $disc->cod_disciplina){
									echo 'CHECKED';
								}
								$n++;
							}

							 echo ">&nbsp;";
							 if($disc->desc_curso == 'ENFERMAGEM'){ $type = 'success';}
							 if($disc->desc_curso == 'FISIOTERAPIA'){ $type = 'success';}
							 if($disc->desc_curso == 'FARMÁCIA'){ $type = 'success';}
							 if($disc->desc_curso == 'ODONTOLOGIA'){ $type = 'success';}
							 if($disc->desc_curso == 'DIREITO'){ $type = 'primary';}
							 if($disc->desc_curso == 'PSICOLOGIA'){ $type = 'primary';}

							 if($disc->desc_curso == 'ADMINISTRAÇÃO'){ $type = 'primary';}
							 if($disc->desc_curso == 'CIÊNCIAS CONTÁBEIS'){ $type = 'primary';}

							 if($disc->desc_curso == 'ENGENHARIA CIVIL'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA MECÂNICA'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA AMBIENTAL'){ $type = 'danger';}
							 if($disc->desc_curso == 'CIÊNCIA DA COMPUTAÇÃO'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA DE CONTROLE E AUTOMAÇÃO'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA DE PRODUÇÃO'){ $type = 'danger';}
							 if($disc->desc_curso == 'ARQUITETURA E URBANISMO'){ $type = 'danger';}

							 if($disc->desc_curso == 'CST EM LOGÍSTICA'){ $type = 'default';}
							 if($disc->desc_curso == 'CST EM REDES DE COMPUTADORES'){ $type = 'default';}

							 if($disc->desc_curso == ''){ $type = 'danger';}
							 if($disc->desc_curso == 'PSICOLOGIA'){ $type = 'success';}
							 echo "<span class='label label-".$type."'>".$disc->desc_curso ."</span> :: 	";
							echo $disc->desc_disciplina;
							echo "<br>";
						}
						echo "<br><br>";
						echo "<label>Observação</label>";
						echo "<br>";
						echo "<textarea name='observacao' class='form_control'>".$d->observacao."</textarea>";

						echo "<br><br>";

						$atributosbtn = array(
						"type" => "submit",
						"name" => "btnSubmit",
						"value" => "Salvar",
						"class" => "btn btn-primary"
						);
						echo form_input($atributosbtn);

						echo "<br><br>";
			      	}
			}
		      else
		      {
		?>
						<br><br>

			        		<form method="post" action="<?php echo base_url(); ?>disponibilidade/insert">

						<input type="hidden" name="id_professor" value="<?php echo $this->session->userdata('id_professor'); ?>">

						<ul class="nav nav-tabs">
		  					<li role="presentation" class="active"><a href="#">DISPONBIILIDADE</a></li>
		  				</ul>

		  					<div class="table-responsive">
							  	<table class="table table-bordered">

							  	<tr>
							  		<th>Turno</th>
							  		<th>Segunda</th>
							  		<th>Terça</th>
							  		<th>Quarta</th>
							  		<th>Quinta</th>
							  		<th>Sexta</th>
							  	</tr>

							  	<tr>
							  		<td align='center'>Matutino</td>
							  		<td align='center'>

								    <input type="checkbox" name="pmsegunda" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pmterca" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pmquarta"?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pmquinta" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pmsexta" ?>
								 </td>

								 <tr>
							  		<td align='center'>Vespertino</td>
							  		<td align='center'>

								    <input type="checkbox" name="pvsegunda" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pvterca" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pvquarta" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pvquinta" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pvsexta" ?>
								 </td>

								</tr>

								<tr>
							  		<td align='center'>Noturno</td>
							  		<td align='center'>

								    <input type="checkbox" name="pnsegunda" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pnterca" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pnquarta" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pnquinta" ?>
								    </td>
								    <td align='center'>
								    <input type="checkbox" name="pnsexta" ?>
								 </td>

								</tr>

								</table>
							</div>

						<ul class="nav nav-tabs">
		  					<li role="presentation" class="active"><a href="#">DISCIPLINAS</a></li>
		  				</ul>

		  				<BR>
	  					<span class="label label-danger">ATENÇÃO :: Caso queira informar disciplinas diferentes das abaixo, informe na caixa de observação.</span>

	  					<BR><BR>

				<?php
							//DISCIPLINAS
							foreach( $disciplinas as $disc)
							{
								echo "<input type='checkbox' name='cod_disciplinas[]' value='".$disc->cod_disciplina."'>&nbsp;	";
							 	//echo "<span class='label label-default'>".$disc->desc_curso ."</span> :: 	";
								//echo $disc->desc_disciplina;
								echo "&nbsp;";
							 if($disc->desc_curso == 'ENFERMAGEM'){ $type = 'success';}
							 if($disc->desc_curso == 'FISIOTERAPIA'){ $type = 'success';}
							 if($disc->desc_curso == 'FARMÁCIA'){ $type = 'success';}
							 if($disc->desc_curso == 'ODONTOLOGIA'){ $type = 'success';}
							 if($disc->desc_curso == 'DIREITO'){ $type = 'primary';}
							 if($disc->desc_curso == 'PSICOLOGIA'){ $type = 'primary';}

							 if($disc->desc_curso == 'ADMINISTRAÇÃO'){ $type = 'primary';}
							 if($disc->desc_curso == 'CIÊNCIAS CONTÁBEIS'){ $type = 'primary';}

							 if($disc->desc_curso == 'ENGENHARIA CIVIL'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA MECÂNICA'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA AMBIENTAL'){ $type = 'danger';}
							 if($disc->desc_curso == 'CIÊNCIA DA COMPUTAÇÃO'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA DE CONTROLE E AUTOMAÇÃO'){ $type = 'danger';}
							 if($disc->desc_curso == 'ENGENHARIA DE PRODUÇÃO'){ $type = 'danger';}
							 if($disc->desc_curso == 'ARQUITETURA E URBANISMO'){ $type = 'danger';}

							 if($disc->desc_curso == 'CST EM LOGÍSTICA'){ $type = 'default';}
							 if($disc->desc_curso == 'CST EM REDES DE COMPUTADORES'){ $type = 'default';}

							 if($disc->desc_curso == ''){ $type = 'danger';}
							 if($disc->desc_curso == 'PSICOLOGIA'){ $type = 'success';}
							 echo "<span class='label label-".$type."'>".$disc->desc_curso ."</span> :: 	";
							echo $disc->desc_disciplina;
								echo "<br>";
							}
							echo "<br><br>";
							echo "<label>Observação</label>";
							echo "<br>";
							echo "<textarea name='observacao' class='form_control' rows='5'></textarea>";

							echo "<br><br>";

							$atributosbtn = array(
							"type" => "submit",
							"name" => "btnSubmit",
							"value" => "Salvar",
							"class" => "btn btn-primary"
							);
							echo form_input($atributosbtn);

							echo "<br><br>";
		      }

		}else{
			echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> Cadastro de disponibilidades encerradas!</div>";
		}

		?>

		</div>
	</div>
</div>
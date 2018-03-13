<?php //echo $this->db->last_query();?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
		<br>

		<?php

		echo "<div class='panel panel-default'>";
			echo "<div class='panel-heading'>";
				echo "<h3 class='panel-title'>Provas </h3>";
			echo "</div>";
			echo "<div class='panel-body'>";

				echo form_open_multipart('impressao/list_prova_id_curso');

				//INICIO DO FORMULARIO DE PESQUISA
				$atributos = array(
					'name'=>'formulario',
					'role'=>'search',
					'class' => 'form-control',
					'id'=>'formulario',
					'onSubmit'=>'return validaForm()'
				);

				echo "<label>Curso</label>";
				echo '<select name="id_curso" class="form-control">';
				echo '<option value="">Selecione</option>';

				foreach($cursos as $curso)
				{
					 echo '<option value="' . $curso->id .'">'. $curso->nome . '</option>';
				}

				echo '</select>';
				echo "<br>";

				$atributosbtn = array(
					"type" => "submit",
					"name" => "btnSubmit",
					"value" => "Filtrar",
					"class" => "btn btn-primary"
					);
				echo form_input($atributosbtn);

			echo form_close();

			echo "</div>";
		echo "</div>";

		?>

		<?php

		if( isset($provas) )
		{
			echo "<table class='table table-striped table-bordered' cellspacing='0' width='100%'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th><b>Curso</b></th>";
						echo "<th><b>Disciplina</b></th>";
						echo "<th><b>Professor</b></th>";
						echo "<th><b>Turno</b></th>";
						echo "<th><b>Dia</b></th>";
						echo "<th><b>Periodo</b></th>";
						echo "<th><b>Quant.</b></th>";
						echo "<th><b>Prova</b></th>";
						echo "<th><b>Tipo</b></th>";
						echo "<th><b>Dt. Prof.</b></th>";
						echo "<th><b>Dt. Coord.</b></th>";
					echo "</tr>";
				echo "</thead>";
				/*echo "<tfoot>";
					echo "<tr>";
						echo "<th id='nome'>Nome</th>";
						echo "<th id='email'>eMail</th>";
						echo "<th id='cel'>Celular</th>";
						echo "<th id='status'>Status</th>";
					echo "</tr>";
				echo "</tfoot>";
				*/
				echo "<tbody>";

				$i = 0;
				foreach ( $provas as $prova )
				{
					$i++;

				?>

				<!-- INICIO DO MODAL -->

				<div class="modal fade" id="basicModalS<?php echo $prova->id; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><b>ATENÇÃO</b></h4>
				</div>
				<div class="modal-body">
				<h4>Deseja informar que <b>IMPRIMIU</b> a prova da disciplina <?php echo strtoupper($prova->disciplina) ;?> do professor <?php echo $prova->professor;?> ?</h4>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
				<a href="sim/<?php echo $prova->id; ?>" class="btn btn-success"> SIM </a>
				</div>
				</div>
				</div>
				</div>

				<div class="modal fade" id="basicModalN<?php echo $prova->id; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><b>ATENÇÃO</b></h4>
				</div>
				<div class="modal-body">
				<h4>Deseja informar que <b>NÃO IMPRIMIU</b> a prova da disciplina <?php echo strtoupper($prova->disciplina) ;?> do professor <?php echo $prova->professor;?> ?</h4>

				<h4><strong>Informe o motivo</strong></h4>

				<form action="nao" method="post" name="vmotivo" id="vmotivo" onSubmit="return validaForm()">
				<input type="hidden" name="id" id="id" value="<?php echo $prova->id; ?>">
				<textarea  rows="5" cols="60" name="motivo" id="motivo"></textarea>
				<br><br>
				<button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
				<input type="submit" value="SIM" class="btn btn-success">
				</form>

				</div>
				<div class="modal-footer">

				</div>
				</div>
				</div>
				</div>

				<!-- FIM MODAL -->

				<?php
				echo "<tr>";

					echo "<td align='center'><h6>".$prova->curso."</h6></td>";
					echo "<td align='center'><h6>".$prova->disciplina."</h6></td>";
					echo "<td align='center'><h6>".$prova->professor."</h6></td>";
					echo "<td align='center'><h6>".$prova->turno."</h6></td>";
					echo "<td align='center'><h6>".$prova->dia."</h6></td>";
					echo "<td align='center'><h6>".$prova->periodo."</h6></td>";
					echo "<td align='center'><h6>".$prova->qtdalunos."</h6></td>";

					//STATUS IMPRESSAO
					if( $prova->id_status_impressao == 4)
					{
						//echo "<td align='center'><span class='label label-success'>SIM</span></td>";
					}
					if( $prova->id_status_impressao == 5)
					{
						//echo "<td align='center'><span class='label label-danger'>NÃO</span></td>";
					}
					if( $prova->id_status_impressao == 0 )
					{
						//echo "<td align='center'>-</td>";
					}

					//PROVAS ENVIADAS
					if( count($prova->totalarquivos) > 0  and $prova->path )
					{
						echo "<td align='center'>";
						for( $z = 0; $z < $prova->totalarquivos ; $z++)
						{
							$array = explode("#",$prova->path);
						}
						for( $zz = 0; $zz < $prova->totalarquivos ; $zz++)
						{
							echo "<a href='".base_url()."".$array[$zz]."' target='_blank'><img src='".base_url()."assets/imgs/table_edit.png'></a> ";
						}
						echo "</td>";
					}
					else
					{
						echo "<td align='center'> - </td>";
					}

					//DOCUMENTOS ENVIADOS
					echo "<td align='center'>";
					if( $prova->tipoProva == 1 ){ $tipoProva = 'OF1';}
					if( $prova->tipoProva == 2 ){ $tipoProva = 'OF2';}
					if( $prova->tipoProva == 3 ){ $tipoProva = '2 Chamada';}
					if( $prova->tipoProva == 4 ){ $tipoProva = 'Exame';}

					echo $tipoProva;

					/*foreach( $documentos as $doc )
					{
					if ( $doc->id_prova == $prova->id )
					{
					if( count($doc->total_arquivos) > 0  and $doc->path )
					{
					for( $z = 0; $z < $doc->total_arquivos ; $z++)
					{
						$array = explode("#",$doc->path);
					}
					for( $zz = 0; $zz < $doc->total_arquivos ; $zz++)
					{
						echo "<a href='../".$array[$zz]."' target='_blank'><img src='../assets/imgs/table_edit.png'></a> ";
					}

					}
					}
					}*/
					echo "</td>";

					if($prova->datahora)
					{
						$dt_professor   = date('d/m/Y H:i:s', strtotime($prova->datahora));
						echo "<td align='center'><h6>".$dt_professor."</h6></td>";
					}
					else
					{
						echo "<td align='center'> - </td>";
					}

					if($prova->datahora_coordenador)
					{
						$dt_coordenador = date('d/m/Y H:i:s', strtotime($prova->datahora_coordenador));
						echo "<td align='center'><h6>".$dt_coordenador."</h6></td>";
					}
					else
					{
						echo "<td align='center'> - </td>";
					}

					echo "</tr>";

					}


				echo "</tbody>";
				echo "</table>";
				//echo "<center>";
				//echo $paginacao;
				//echo "</center>";

				}
				 ?>
			<br>
			<br>
					</div>
					</div>


		<!-- fim dos resultados -->

		</div>
	</div>
</div>

<script language="JavaScript">

	function validaForm()
	{
		dd = document.vmotivo;

		if(d.motivo.value==false)
		{
			alert("Informe o motivo.");
			d.motivo.focus();
			return false;
		}

		return true;
	}
	</script>

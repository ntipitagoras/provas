
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
		<br>
		<table id="tabela" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<!--<th><ISINDEX></ISINDEX></th>-->

				<th>Nome</th>
				<th>Disponibilidade</th>
				<th>Disciplinas</th>
			</tr>
		</thead>
		<!--<tfoot>
		<tr>
			<th id="nome">Nome</th>
			<th id="email">eMail</th>
			<th id="cel">Celular</th>
			<th id="status">Status</th>
		</tr>
		</tfoot>-->

		<tbody>

			<?php
			foreach( $disponibilidades as $d )
			{
				echo "<tr>";
				//echo "<td><h6>".$d->id_professor."</h6></td>";
				echo "<td><h6>".$d->nome."</h6></td>";
				echo "<td><h6>";

				echo "<span class='label label-primary'>Matutino</span>";
				echo "<br><br>";
					if( $d->pmsegunda == 'on'){ echo 'Segunda ';}
					if( $d->pmterca == 'on'){ echo ' Terça ';}
					if( $d->pmquarta == 'on'){ echo ' Quarta ';}
					if( $d->pmquinta == 'on'){ echo ' Quinta ';}
					if( $d->pmsexta == 'on'){ echo ' Sexta ';}
				echo "<br><br>";
				echo "<span class='label label-primary'>Vespertino</span>";
				echo "<br><br>";
					if( $d->pvsegunda == 'on'){ echo 'Segunda ';}
					if( $d->pvterca == 'on'){ echo ' Terça ';}
					if( $d->pvquarta == 'on'){ echo ' Quarta ';}
					if( $d->pvquinta == 'on'){ echo ' Quinta ';}
					if( $d->pvsexta == 'on'){ echo ' Sexta ';}
				echo "<br><br>";
				echo "<span class='label label-primary'>Noturno</span>";
				echo "<br><br>";
					if( $d->pnsegunda == 'on'){ echo 'Segunda ';}
					if( $d->pnterca == 'on'){ echo ' Terça ';}
					if( $d->pnquarta == 'on'){ echo ' Quarta ';}
					if( $d->pnquinta == 'on'){ echo ' Quinta ';}
					if( $d->pnsexta == 'on'){ echo ' Sexta ';}

				echo "</h6></td>";


				echo "<td>";

					$var = explode(',',$d->cod_disciplinas);
					$count = count($var);
					$n = 0;
					while($n < $count)
					{

						foreach( $disciplinas as $disc)
						{
							if( $var[$n] == $disc->cod_disciplina)
							{
								echo "<h6>".$disc->cod_disciplina . " - ".$disc->desc_disciplina. "</h6>";
								$x = $disc->cod_disciplina;
							}
						}

						$n++;
					}

				/*echo "<center><a href='#' data-toggle='modal' data-target='#basicModalV" .$d->id_professor."'> <img src='".base_url()."assets/imgs/user_comment.png'></a></center>";

				//INICIO DO MODAL
				echo "<div class='modal fade' id='basicModalV".$d->id_professor. "' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>";
				echo "<div class='modal-dialog'>";
				echo "<div class='modal-content'>";
				echo "<div class='modal-header'>";
				echo "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
				echo "<h4 class='modal-title' id='myModalLabel'><b>Disponibilidade</b></h4>";
				echo "</div>";
				echo "<div class='modal-body'>";
				echo "<h4></h4>";
				echo "</div>";
				echo "<div class='modal-footer'>";
				echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>SAIR</button>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				*/
				//FIM MODAL


				echo "</td>";
				echo "</tr>";
			}


			?>

			</tbody>
			</table>

		</div>
	</div>
</div>

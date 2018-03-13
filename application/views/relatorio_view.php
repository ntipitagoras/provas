
<div class="container">
    <div class="row">
        <div class="col-md-12">
        

          	<div class="panel panel-primary">
            	<div class="panel-heading">Disponibilidade dos Professores</div>
              		<div class="panel-body">
                		<p><font color=red><?=@$this->session->flashdata('msg');?></font></p> 

	                    <h4>  
	                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                    Lista de Professores
	                    </h4>


                		<?php 
                		echo "<div class='list-group'>";
                		$i = 0;
                		foreach( $disponibilidades as $d)
                		{
                            $i++;
							  echo "<a href='" .$d->id.  "' class='list-group-item' data-toggle='modal' data-target='#basicModalA" .$d->id. "' >" .strtoupper($d->nome). " <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'>";

                                    if($d->titulacao_professor == 1){echo "Graduado";}else{echo "";};
                                    if($d->titulacao_professor == 2){echo "Especialista";}else{echo "";};
                                    if($d->titulacao_professor == 3){echo "Mestrado";}else{echo "";};
                                    if($d->titulacao_professor == 4){echo "Doutorado";}else{echo "";};
                                    if($d->titulacao_professor == 5){echo "Pós-Doutorado";}else{echo "";};


                              echo"</a> ";
							  //echo "<br>";
                        
                		?>

                		<!-- INICIO DO MODAL -->
                         <div class="modal fade" id="basicModalA<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><b>  <?=$d->nome?></b></h5>

                                  </div>

                                  <div class="modal-body">
                                    
                                    <span class="badge">Fama</span>

                                    <table border='1' cellpadding="" cellspacing="0" width="75%" align="center">

                                    	<tr>
                                            <td rowspan="2" valign="middle" align="center">Matutino</td>
                                    		<td align="center">Segunda</td>
                                    		<td align="center">Terça</td>
                                    		<td align="center">Quarta</td>
                                    		<td align="center">Quinta</td>
                                    		<td  align="center">Sexta</td>
                                    	</tr>

                                    	<tr>
                                    		<td  align="center"><center><?php if($d->fmsegunda == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fmterca == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fmquarta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fmquinta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fmsexta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    	</tr>

                                    	<tr>
                                            <td rowspan="2"  valign="middle" align="center">Vespertino</td>
                                    		<td  align="center">Segunda</td>
                                    		<td  align="center">Terça</td>
                                    		<td  align="center">Quarta</td>
                                    		<td  align="center">Quinta</td>
                                    		<td  align="center">Sexta</td>
                                    	</tr>

                                    	<tr>
                                    		<td  align="center"><center><?php if($d->fvsegunda == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fvterca == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fvquarta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fvquinta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fvsexta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    	</tr>

                                    	<tr>
                                            <td rowspan="2" valign="middle" align="center">Noturno</td>
                                    		<td  align="center">Segunda</td>
                                    		<td  align="center">Terça</td>
                                    		<td  align="center">Quarta</td>
                                    		<td  align="center">Quinta</td>
                                    		<td  align="center">Sexta</td>
                                    	</tr>

                                    	<tr>
                                    		<td  align="center"><center><?php if($d->fnsegunda == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fnterca == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fnquarta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fnquinta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->fnsexta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    	</tr>
                                    	

                                    </table>


                                    <span class="badge">Pitágoras</span>
                                    
                                    <table border="1" cellpadding="0" cellspacing="0" width="75%" align="center">
                                    	
                                    	<tr>
                                            <td rowspan="2" valign="middle" align="center">Matutino</td>
                                    		<td  align="center">Segunda</td>
                                    		<td  align="center">Terça</td>
                                    		<td  align="center">Quarta</td>
                                    		<td  align="center">Quinta</td>
                                    		<td  align="center">Sexta</td>
                                    	</tr>

                                    	<tr>
                                    		<td  align="center"><center><?php if($d->pmsegunda == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pmterca == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pmquarta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pmquinta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pmsexta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    	</tr>

                                    	<tr>
                                            <td rowspan="2" valign="middle" align="center">Vespertino</td>
                                    		<td  align="center">Segunda</td>
                                    		<td  align="center">Terça</td>
                                    		<td  align="center">Quarta</td>
                                    		<td  align="center">Quinta</td>
                                    		<td  align="center">Sexta</td>
                                    	</tr>

                                    	<tr>
                                    		<td  align="center"><center><?php if($d->pvsegunda == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pvterca == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pvquarta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pvquinta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pvsexta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    	</tr>

                                    	<tr>
                                            <td rowspan="2" valign="middle" align="center">Noturno</td>
                                    		<td  align="center">Segunda</td>
                                    		<td  align="center">Terça</td>
                                    		<td  align="center">Quarta</td>
                                    		<td  align="center">Quinta</td>
                                    		<td  align="center">Sexta</td>
                                    	</tr>

                                    	<tr>
                                    		<td  align="center"><center><?php if($d->pnsegunda == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pnterca == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pnquarta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pnquinta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    		<td  align="center"><center><?php if($d->pnsexta == 'on'){ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';}else{ echo "<span class='badge'> - </span>";}?></center></td>
                                    	</tr>
                                    	

                                    </table>


                                    <h6>
                                    <span class="badge">Disciplinas:</span>
                                    
                                        <?php
                                            if($d->disciplina_leciona){echo $d->disciplina_leciona;}else{echo "";};
                                        ?>

                                    </h6>


                                    <h6>
                                    <span class="badge">Titulação:</span>
                                    
                                        <?php

                                            if($d->titulacao_professor == 1){echo "Graduado";}else{echo "";};
                                            if($d->titulacao_professor == 2){echo "Especialista";}else{echo "";};
                                            if($d->titulacao_professor == 3){echo "Mestrado";}else{echo "";};
                                            if($d->titulacao_professor == 4){echo "Doutorado";}else{echo "";};
                                            if($d->titulacao_professor == 5){echo "Pós-Doutorado";}else{echo "";};
                                        ?>

                                    </h6>


                                  </div>
                                    
                                    
                                  <!--<div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                    <a href="aceita/<?php //echo $d->id; ?>" class="btn btn-success"></a>
                                  </div>-->
                                </div>
                              </div>
                            </div>

                        <!-- FIM MODAL -->
                	
                        <?php
                        	}                			
                			echo "</div>";

                            echo "<b>Total :</b> " . $i++ . " disponibilidades enviadas de um total de 444 professores";    
                		?>

            		</div>    



           	</div>
        </div>
    </div>
</div>

<?php
    
    echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> Caro coordenador, o sistema estará aberto para sua análise até dia 09/11/2015.</div>";

        echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Provas enviadas para o coordenador</h3>";
            echo "</div>";
        

        $data_limite = date('Y-m-d');
        
        if( $data_limite < '2015-11-09'){

                    if( $provas ){

                    echo "<table class='table table-hover'>";
                    echo "<thead>";
                    echo "<tr>";
                        echo "<th> Ação  </th>";
                        echo "<th> Curso  </th>";
                        echo "<th> Disciplina  </th>";
                        echo "<th> Professor  </th>";
                        echo "<th> Turno  </th>";
                        echo "<th> Dia  </th>";
                        echo "<th> Periodo  </th>";
                        echo "<th> Alunos  </th>";
                        echo "<th> Status  </th>";
                        echo "<th> Motivo  </th>";
                        echo "<th> Prova  </th>";
                        echo "<th> Dt. Professor  </th>";
                        echo "<th> Dt. Coordenador  </th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                        $i = 0;
                        foreach ( $provas as $prova )
                        {
                          
                            $i++;
                            echo "<tr>";   
                        ?>

                        <td>

                        <?php

                        if( $prova->id_status == 1 ){
                            echo "<a href='#'' class='btn btn-success btn-xs' data-toggle='modal' data-target='#basicModalA".$prova->id."'>Aceitar</a>";
                            echo "<a href='#' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#basicModalR".$prova->id."'>Rejeitar</a>";
                        }
                        if( $prova->id_status == 2 ){
                            echo "<span class='label label-success'>Aceito</span>";
                        }
                        if( $prova->id_status == 3 ){
                            echo "<span class='label label-danger'>Rejeitado</span>";
                        }

                        ?>
                            
                        </td>

                        <!-- INICIO DO MODAL -->
                         <div class="modal fade" id="basicModalA<?php echo $prova->id; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>ATENÇÃO</b></h4>
                                  </div>
                                  <div class="modal-body">
                                    <h4>Deseja mesmo <b>ACEITAR</b> a prova da disciplina <?php echo strtoupper($prova->disciplina) ;?> do professor <?php echo $prova->professor;?> ?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                                    <a href="aceita/<?php echo $prova->id; ?>" class="btn btn-success"> SIM </a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="basicModalR<?php echo $prova->id; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>ATENÇÃO</b></h4>
                                  </div>
                                  <div class="modal-body">
                                    <h4>Deseja mesmo <b>REJEITAR</b> a prova da disciplina <?php echo strtoupper($prova->disciplina) ;?> do professor <?php echo $prova->professor;?> ?</h4>
                         
                                    <h4><strong>Informe o motivo</strong></h4>

                                    <form action="rejeita" method="post" name="vmotivo" id="vmotivo" onSubmit="return validaForm()">
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
                            echo "<td><h6>".$prova->curso."</h6></td>";
                            echo "<td><h6>".$prova->disciplina."</h6></td>";
                            echo "<td><h6>".ucfirst(strtolower($prova->professor))."</h6></td>";
                            echo "<td><h6>".$prova->turno."</h6></td>";
                            echo "<td><h6>".$prova->dia."</h6></td>";
                            echo "<td><h6>".$prova->periodo."</h6></td>";
                            echo "<td><h6>".$prova->qtdalunos."</h6></td>";

                            echo "<td>";                
                            if( $prova->id_status == 1){
                                echo "<span class='label label-default'><h6>Enviado</span>";    
                            }
                            if( $prova->id_status == 2){
                                echo "<span class='label label-success'>Aceito</span>";    
                            }
                            if( $prova->id_status == 3){
                                echo "<span class='label label-danger'>Rejeitado</span>";    
                            }

                            echo "</td>";

                            if($prova->motivo){
                                
                                echo "<td><a href='#' data-toggle='modal' data-target='#basicModalV" .$prova->id."'>".img('assets/imgs/user_comment.png')."</a></td>";

                                 //INICIO DO MODAL -->
                                 echo "<div class='modal fade' id='basicModalV".$prova->id. "' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>";
                                      echo "<div class='modal-dialog'>";
                                        echo "<div class='modal-content'>";
                                          echo "<div class='modal-header'>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
                                            echo "<h4 class='modal-title' id='myModalLabel'><b>MOTIVO DA DEVOLUÇÃO</b></h4>";
                                          echo "</div>";
                                          echo "<div class='modal-body'>";
                                            echo "<h4>".$prova->motivo."</h4>";
                                          echo "</div>";
                                          echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>SAIR</button>";
                                          echo "</div>";
                                        echo "</div>";
                                      echo "</div>";
                                    echo "</div>";
                                //FIM MODAL

                            }else{
                                echo "<td> - </td>";
                            }

                            //PATH DAS PROVAS
                            if( count($prova->totalarquivos) > 0  and $prova->path ){
                                echo "<td>";
                                for( $z = 0; $z < $prova->totalarquivos ; $z++)
                                {
                                  $array = explode("#",$prova->path);                    
                                }
                                for( $zz = 0; $zz < $prova->totalarquivos ; $zz++)
                                {
                                  echo "<a href='../".$array[$zz]."' target='_blank'><img src='../assets/imgs/table_edit.png'></a> ";                   
                                }
                                echo "</td>";
                            }else{
                                echo "<td> - </td>";
                            }

                            // FIM DO PATH DAS PROVAS
                            if($prova->datahora){
                                $dt_professor   = date('d/m/Y H:i:s', strtotime($prova->datahora)); 
                                echo "<td><h6>".$dt_professor."</h6></td>";    
                            }else{
                                echo "<td> - </td>";
                            }
                            if($prova->datahora_coordenador){
                                $dt_coordenador = date('d/m/Y H:i:s', strtotime($prova->datahora_coordenador));
                                echo "<td><h6>".$dt_coordenador."</h6></td>";     
                            }else{
                                echo "<td> - </td>";
                            }
                            echo "</tr>";
                        }

                        echo "</tbody>";
                    echo "</table>";

                    //FIM DO PAINEL
                    echo "</div>";
                    
                    }else{
                    echo "<center><br><span class='label label-danger'>Nenhum registro enviado pelos Professores!</span></center><br>";    
                }

        }else{

             echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> Sistema fechado</div>";
        }    
?>

<script language="JavaScript">

    function validaForm()
    {
        d = document.vmotivo;

        if(d.motivo.value==false)
        {
            alert("Informe o motivo.");
            d.motivo.focus();
            return false;
        }

        return true;
    }
    </script>
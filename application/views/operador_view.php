<?php

        echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Provas enviadas pelos Coordenadores para Impressão</h3>";
            echo "</div>";


        //INICIO DO FORMULARIO DE PESQUISA 
        $atributos = array(
                    'name'=>'formulario',
                    'class'=>'form-inline',
                    'role'=>'search',
                    'id'=>'formulario',
                    'onSubmit'=>'return validaForm()' 
                );

        $hidden = array('idProfessor' => $this->session->userdata('id'));

        echo form_open_multipart('operador/list_prova_id_curso',$atributos);
        echo "<span class='valida'><b>". validation_errors(). "</b></span>";

        echo "<br>";
          echo "<div class='form-group'>";
            echo "<label for='exampleInputCurso'>Curso</label>";
            
            echo '<select name="curso">';
            echo '<option value="">Selecione</option>';
             
            foreach($cursos as $curso)
            {
                 echo '<option value="' . $curso->id .'">'. $curso->nome . '</option>';
            }
            echo '</select>';        

         $atributosbtn = array(
                "type" => "submit",
                "name" => "btnSubmit",
                "value" => "Pesquisar",
                "class" => "btn btn-default btn-xs"
              );
            echo form_input($atributosbtn);

        echo form_close();
        echo "<br><br>";
        //FIM DO FORMULARIO DE PESQUISA 

        if( isset($provas) ){

        echo "<table class='table table-hover'>";
        echo "<tr>";
            echo "<td><b>Enviar Listas?</b></td>";
            echo "<td><b>Curso</b></td>";
            echo "<td><b>Disciplina</b></td>";
            echo "<td><b>Professor</b></td>";
            echo "<td><b>Turno</b></td>";
            echo "<td><b>Dia</b></td>";
            echo "<td><b>Periodo</b></td>";
            echo "<td><b>Quantidade</b></td>";
            echo "<td><b>Listas Enviadas</b></td>";
            echo "<td><b>Envio Professor</b></td>";
            echo "<td><b>Envio Coordenador</b></td>";
        
        echo "</tr>";

            
            
            $i = 0;
            foreach ( $provas as $prova )
            {
              $i++;

                echo "<tr>";
                
                echo "<td>";

                if( $prova->id_status == 2 ){
                    echo "<a href='#' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#basicModalP".$prova->id."'>Enviar</a>";
                }

                ?>

            <!-- INICIO DO MODAL -->
             <div class="modal fade" id="basicModalP<?php echo $prova->id; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><b>ATENÇÃO</b></h4>
                      </div>
                      <div class="modal-body">
                        <h4>Envio de documentos da disciplina <?php echo strtoupper($prova->disciplina) ;?> do professor <?php echo $prova->professor;?> ?</h4>

                        <ul>
                            <li>Lista de Presença</li>
                            <li>Capa</li>
                            <li>Gabarito</li>
                            <li>Lista de Nomes</li>
                        </ul>
             
                        <form action="add_documento" method="post" name="formulario" id="formulario" enctype="multipart/form-data" onSubmit="return validaForm()">
                            <input type="hidden" name="id_prova" id="id_prova" value="<?php echo $prova->id; ?>">
                            <input type="hidden" name="id_curso" id="id_curso" value="<?php echo $prova->id_curso; ?>">
                            <input type="hidden" name="id_operador" id="id_operador" value="<?php echo $this->session->userdata('id_professor'); ?>">
                            
                            <br>
                            Obs: Para enviar mais de um arquivo, após clicar no botão abaixo <b>'Selecionar arquivo'</b>. 
                            Basta deixar pressionado a tecla CTRL e clicar nas documentos que deseja enviar!
                            <br><br>

                            <input type='file' name='userfile[]' id='userfile' multiple>
                            <br><br>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                            <input type="submit" value="SIM" name="btnSubmit" class="btn btn-success">
                        </form>
                      </div>
                      <div class="modal-footer">                       
                      </div>
                    </div>
                  </div>
                </div>
            <!-- FIM MODAL -->

                <?php
                echo "</td>";
                echo "<td><h6>".$prova->curso."</h6></td>";
                echo "<td><h6>".$prova->disciplina."</h6></td>";
                echo "<td><h6>".$prova->professor."</h6></td>";
                echo "<td><h6>".$prova->turno."</h6></td>";
                echo "<td><h6>".$prova->dia."</h6></td>";
                echo "<td><h6>".$prova->periodo."</h6></td>";
                echo "<td><h6>".$prova->qtdalunos."</h6></td>";
                
                /*PATH DAS PROVAS
                if( $prova->path_documento ){
                    echo "<td>";
                    for( $z = 0; $z < count($prova->path_documento) ; $z++)
                    {
                      $array = explode("#",$prova->path);                    
                    }
                    for( $zz = 0; $zz < count($prova->path_documento) ; $zz++)
                    {
                      echo "<a href='../".$array[$zz]."' target='_blank'><img src='../assets/imgs/table_edit.png'></a> ";                   
                    }
                    echo "</td>";
                }else{
                    echo "<td> - </td>";
                }*/
                //PATH DAS PROVAS
                echo "<td>";
                foreach( $documentos as $doc )
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
                }
                echo "</td>";

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

        
        echo "</table>";

        //FIM DO PAINEL
        echo "</div>";
        
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
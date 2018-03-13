<div class="container">
    <div class="row">
        <div class="col-md-12">

<?php

$data_limite = date('Y-m-d');


if( $data_limite > '2015-11-20'){

  echo "<div class='panel panel-primary'>";
    echo "<div class='panel-heading'>";
      echo "<h3 class='panel-title'>Formulário de Envio de Provas</h3>";
    echo "</div>";

    echo "<div class='panel-body'>";
      echo "<center><br><span class='label label-danger'>Data limite para envio das provas expirado!</span></center><br>";
    echo "</div>";
  echo "</div>";

}
else
{

      echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> Caro professor, o sistema estará aberto para envio até dia 08/11/2015.</div>";

        echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Formulário de Envio de Provas</h3>";
            echo "</div>";
        echo "<div class='panel-body'>";

        $atributos = array(
                            'name'=>'formulario',
                            'class'=>'form-group',
                            'role'=>'search',
                            'id'=>'formulario',
                            'onSubmit'=>'return validaForm()' 
                        );

        $hidden = array('idProfessor' => $this->session->userdata('id'));

        echo form_open_multipart('prova/add_prova',$atributos,$hidden);
        echo "<span class='valida'><b>". validation_errors(). "</b></span>";

         echo form_label('Curso');
         echo '<select name="curso">';
         echo '<option value="">Selecione</option>';
         
         foreach($cursos as $curso)
         {
              echo '<option value="' . $curso->id .'">'. $curso->nome . '</option>';
         }
         echo '</select>';
         echo '<br><br>';

        $atributos33 = array(
                "type" => "text",
                "name" => "nomeDisciplina",
                "id" => "nomeDisciplina",
                "size" => "30",
                 "value" => set_value('nomeDisciplina'),
                "class" => "form-control"
              );
            echo form_label('Nome da Disciplina','nomeDisciplina');
            echo form_input($atributos33);

            echo '<br>';

        echo form_label('Turno');
         echo '<select name="turno">';
         echo '<option value="">Selecione</option>';
         
         foreach($turnos as $turno)
         {
              echo '<option value="' . $turno->id .'">'. $turno->descricao . '</option>';
         }
         echo '</select>';
         echo '<br><br>';
        
         echo form_label('Dia da Semana');
         echo '<select name="dia">';
         echo '<option value="">Selecione</option>';
         
         foreach($dias as $dia)
         {
              echo '<option value="' . $dia->id .'">'. $dia->descricao . '</option>';
         }
         echo '</select>';
         echo '<br><br>';

        echo form_label('Período');
         echo '<select name="periodo">';
         echo '<option value="">Selecione</option>';
         
         foreach($periodos as $periodo)
         {
              echo '<option value="' . $periodo->id .'">'. $periodo->descricao . '</option>';
         }
         echo '</select>';
         echo '<br><br>';

         echo form_label('Turma');
         echo '<select name="turma">';
         echo '<option value="">Selecione</option>';
         
         foreach($turmas as $turma)
         {
              echo '<option value="' . $turma->id .'">'. $turma->descricao . '</option>';
         }
         echo '</select>';
         echo '<br><br>';

         echo form_label('Tipo de Prova');
         echo '<select name="tipo">';
         echo '<option value="">Selecione</option>';
         
         foreach($tipos as $tipo)
         {
              echo '<option value="' . $tipo->id .'">'. $tipo->descricao . '</option>';
         }
         echo '</select>';
         echo '<br><br>';

            $atributos3 = array(
                "type" => "text",
                "name" => "qtdalunos",
                "id" => "qtdalunos",
                "size" => "30",
                 "value" => set_value('qtdalunos'),
                "class" => "form-control"
              );
            echo form_label('Quantidade de Alunos','qtdalunos');
            echo form_input($atributos3);

            echo '<br>';


            /*$i = 2; 

            for ($j = 1; $j <= $i; $j++)
            {
                echo form_label('Prova '. $j,'provas');
                $data = array( 'name' => 'userfile[]', 'id' => 'userfile');
                echo form_upload($data);
            }
            */
            echo form_label('Provas','provas');
            echo "<br>Obs: Para enviar mais de uma prova, após clicar no botão abaixo 'Selecionar arquivo'. Basta deixar pressionado a tecla CTRL e clicar nas provas que deseja enviar!";
            echo "<input type='file' name='userfile[]' id='userfile' multiple>";
            //$data = array( 'name' => 'userfile', 'id' => 'userfile');
            //echo form_upload($data);

            echo '<br>';

            $atributosbtn = array(
                "type" => "submit",
                "name" => "btnSubmit",
                "value" => "Enviar",
                "class" => "btn btn-primary"
              );
            echo form_input($atributosbtn);

        echo form_close();

        echo "</div>";
        echo "</div>";
}

        echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Provas enviadas</h3>";
            echo "</div>";


        if( $provas){

        echo "<table class='table table-bordered'>";
        echo "<tr>";
            echo "<td><b>Curso</b></td>";
            echo "<td><b>Disciplina</b></td>";
            echo "<td><b>Turno</b></td>";
            echo "<td><b>Dia</b></td>";
            echo "<td><b>Periodo</b></td>";
            echo "<td><b>Quantidade</b></td>";
            echo "<td><b>Status</b></td>";
            echo "<td><b>Motivo</b></td>";
            echo "<td><b>Provas</b></td>";
            echo "<td><b>Data Envio</b></td>";
            echo "<td><b>Data Análise</b></td>";
        echo "</tr>";

          
            //$array_provas = array();
            $i = 0;
            foreach ( $provas as $prova )
            {
              $i++;
                echo "<tr>";  
                echo "<td>".$prova->curso."</td>";
                echo "<td>".$prova->disciplina."</td>";
                echo "<td>".$prova->turno."</td>";
                echo "<td>".$prova->dia."</td>";
                echo "<td>".$prova->periodo."</td>";
                echo "<td>".$prova->quantidade."</td>";
                
                if( $prova->id_status == 1){
                    echo "<td><span class='label label-default'>Enviado</span></td>";    
                }
                if( $prova->id_status == 2){
                    echo "<td><span class='label label-success'>Aceito</span></td>";    
                }
                if( $prova->id_status == 3){
                    echo "<td><span class='label label-danger'>Rejeitado</span></td>";    
                }

                echo "</td>";

                if($prova->motivo){
                    
                    echo "<td><a href='#' data-toggle='modal' data-target='#basicModalV" .$prova->id."'>".img('assets/imgs/eye.png')."</a></td>";

                     //INICIO DO MODAL -->
                     echo "<div class='modal fade' id='basicModalV".$prova->id. "' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>";
                          echo "<div class='modal-dialog'>";
                            echo "<div class='modal-content'>";
                              echo "<div class='modal-header'>";
                                echo "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
                                echo "<h4 class='modal-title' id='myModalLabel'><b>MOTIVO DA DEVOLUÇÃO!</b></h4>";
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
                if( $prova->totalarquivos > 0 ){
                    echo "<td>";

                    for( $z = 0; $z < $prova->totalarquivos ; $z++)
                    {
                      $array = explode("#",$prova->path);                    
                    }
                    for( $z = 0; $z < $prova->totalarquivos ; $z++)
                    {
                      echo "<a href='../".$array[$z]."' target='_blank'><img src='../assets/imgs/table_edit.png'></a> ";                   
                    }
                    echo "</td>";
                }

                // FIM DO PATH DAS PROVAS


                if($prova->datahora){
                    $dt_professor   = date('d/m/Y H:i:s', strtotime($prova->datahora)); 
                    echo "<td>".$dt_professor."</td>";    
                }else{
                    echo "<td> - </td>";
                }
                if($prova->datahora_coordenador){
                    $dt_coordenador = date('d/m/Y H:i:s', strtotime($prova->datahora_coordenador));
                    echo "<td>".$dt_coordenador."</td>";     
                }else{
                    echo "<td> - </td>";
                }
                
                echo "</tr>";
            }
      
        echo "</table>";

        //FIM DO PAINEL
        echo "</div>";

    }else{
        echo "<center><br><span class='label label-danger'>Nenhum registro enviado para coordenação!</span></center><br>";    
    }

?>

<script language="JavaScript">

    function validaForm()
    {
        d = document.formulario;

        if(d.curso.value==false)
        {
            alert("Por favor, escolha o curso da prova.");
            d.curso.focus();
            return false;
        }
        if(d.nomeDisciplina.value==false)
        {
            alert("Por favor, insira o nome da disciplina.");
            d.nomeDisciplina.focus();
            return false;
        }
        if(d.turno.value==false)
        {
            alert("Por favor, informe o turno da prova.");
            d.turno.focus();
            return false;
        }
        if(d.dia.value==false)
        {
            alert("Por favor, infore o dia da semana da prova.");
            d.dia.focus();
            return false;
        }
        if(d.periodo.value==false)
        {
            alert("Por favor, o período da prova da turma.");
            d.periodo.focus();
            return false;
        }
        if(d.turma.value==false)
        {
            alert("Por favor, informe a turma.");
            d.turma.focus();
            return false;
        }
        if(d.tipo.value==false)
        {
            alert("Por favor, informe o tipo de prova.");
            d.tipo.focus();
            return false;
        }
        if(d.qtdalunos.value==false)
        {
            alert("Por favor, informe a quantidade de aluno para a prova.");
            d.qtdalunos.focus();
            return false;
        }
        if(isNaN(d.qtdalunos.value)) 
        {    
          alert("Digite apenas números!");    
          d.qtdalunos.focus();    
          return false; 
        }
        if(d.userfile.value==false)
        {
            alert("Por favor, selecione a prova ser enviada.");
            d.userfile.focus();
            return false;
        }

        arquivo = (d.userfile.value);
        tipo = arquivo.substring(arquivo.length-4,arquivo.length);
        tipo = tipo.toLowerCase()

        if ((tipo == ".pdf") || (tipo == ".PDF")) {
        }
        else
        {
          alert("Arquivo inválido, o arquivo da prova deve ser formato PDF!");
          userfile.focus();
          return false;
        }


        return true;
    }

        </div>
    </div>
</div>

</script>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
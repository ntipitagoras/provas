

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

<?php


$dateActual = date('Y-m-d');
$dataParameter = $this->session->userdata('data_limite_envio_prova_professor');
$d = explode("-",$dataParameter);
$formateDateBr = $d[2]."/".$d[1]."/".$d[0];

if( $dateActual > $dataParameter)
{

  echo "<div class='panel panel-default'>";
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

      echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> Caro professor, o sistema estará aberto para envio até dia ".$formateDateBr.".</div>";

        echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Formulário de Envio de Provas</h3>";
            echo "</div>";
        echo "<div class='panel-body'>";

        echo "<font color=red><h4>". @$this->session->flashdata('msg'). "</h4></font>";

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
         echo "<select name='curso' class='form-control'>";
         echo "<option value=''>Selecione</option>";

         $d = date('Y/m/d');
         foreach($cursos as $curso)
         {
            if(  $d < $curso->data_liberacao )
            {
              echo '<option value="' . $curso->id .'">'. $curso->nome . '</option>';
            }
         }
         echo '</select>';
         echo "<br>";

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
        echo "<br>";

        echo form_label('Turno');
         echo '<select name="turno" class="form-control">';
         echo '<option value="">Selecione</option>';

         foreach($turnos as $turno)
         {
              echo '<option value="' . $turno->id .'">'. $turno->descricao . '</option>';
         }
         echo '</select>';
         echo '<br>';

         echo form_label('Dia da Semana');
         echo '<select name="dia" class="form-control">';
         echo '<option value="">Selecione</option>';

         foreach($dias as $dia)
         {
              echo '<option value="' . $dia->id .'">'. $dia->descricao . '</option>';
         }
         echo '</select>';
         echo '<br>';

        echo form_label('Período');
         echo '<select name="periodo" class="form-control">';
         echo '<option value="">Selecione</option>';

         foreach($periodos as $periodo)
         {
              echo '<option value="' . $periodo->id .'">'. $periodo->descricao . '</option>';
         }
         echo '</select>';
         echo '<br>';

         echo form_label('Tipo de Prova');
         echo '<select name="tipo" class="form-control">';
         echo '<option value="">Selecione</option>';

         foreach($tipos as $tipo)
         {
              echo '<option value="' . $tipo->id .'">'. $tipo->descricao . '</option>';
         }
         echo '</select>';
         echo '<br>';

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

            echo form_label('Envio dos arquivos','provas');
            echo "<br>";
            echo "<br>Obs.<span class='label label-default'>1</span>:  Podem ser enviadas até <span class='label label-danger'>2</span> (dois) tipos de provas diferentes para a mesma disciplina.";
            echo "<br><br>";
            echo "Obs.<span class='label label-default'>2</span>: Só serão aceitos arquivos do tipo <span class='label label-danger'>PDF</span>.";
            echo "<br><br>";
            echo "<em>Prova Tipo 1:</em> <input type='file' name='userfile1' id='userfile1'>";
            echo "<br>";
            echo "<em>Prova Tipo 2:</em> <input type='file' name='userfile2' id='userfile2'>";

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

        echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Provas enviadas</h3>";
            echo "</div>";


        if( @$provas )
        {

            echo "<table class='table table-bordered'>";
            echo "<tr>";
                echo "<td><b>Curso</b></td>";
                echo "<td><b>Disciplina</b></td>";
                echo "<td><b>Turno</b></td>";
                echo "<td><b>Dia</b></td>";
                echo "<td><b>Periodo</b></td>";
                echo "<td><b>Quantidade</b></td>";
                echo "<td><b>Tipo</b></td>";
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

                if( $prova->tipoProva == 1){ $tipoProva = 'OF1';}
                if( $prova->tipoProva == 2){ $tipoProva = 'OF2';}
                if( $prova->tipoProva == 3){ $tipoProva = '2ª Chamada';}
                if( $prova->tipoProva == 4){ $tipoProva = 'Exame';}

                echo "<td>".$tipoProva."</td>";

                if( $prova->id_status == 1){echo "<td><span class='label label-default'>Enviado</span></td>"; }
                if( $prova->id_status == 2){echo "<td><span class='label label-success'>Aceito</span></td>";  }
                if( $prova->id_status == 3){echo "<td><span class='label label-danger'>Rejeitado</span></td>";}

                echo "</td>";



                if($prova->motivo){

                    echo "<td><center><a href='#' data-toggle='modal' data-target='#basicModalV" .$prova->id."'> <img src='".base_url()."assets/imgs/user_comment.png'></a></center></td>";

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
                    echo "<td><center> - </center></td>";
                }

                //PATH DAS PROVAS
                if( $prova->totalarquivos > 0 ){
                    echo "<td><center>";

                    for( $z = 0; $z < $prova->totalarquivos ; $z++)
                    {
                      $array = explode("#",$prova->path);
                    }
                    for( $z = 0; $z < $prova->totalarquivos ; $z++)
                    {
                      echo "<a href='".base_url().$array[$z]."' target='_blank'> <img src='".base_url()."assets/imgs/table_edit.png'> </a> ";
                    }
                    echo "</center></td>";
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
        echo "<center><br><span class='label label-danger'>Nenhuma prova enviada até o momento para a coordenação!</span></center><br>";
    }

?>

        </div>
    </div>
</div>

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
            alert("Por favor, o período da prova.");
            d.periodo.focus();
            return false;
        }
        if(d.tipo.value == false)
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
        if( d.userfile1.value == false && d.userfile2.value == false )
        {
            alert("Professor, nenhuma prova foi selecionada para ser enviada.");
            d.userfile1.focus();
            return false;
        }
        if( d.userfile1.value != false && d.userfile2.value == false )
        {
           var extensao1  = d.userfile1.value.substr( d.userfile1.value.length - 4 ).toLowerCase();
          if( extensao1 != ".pdf" )
          {
              alert("Prova do Tipo 1: Arquivo inválido, somente arquivos do tipo PDF são aceitos.");
              d.userfile1.focus();
              return false;
          }
        }
        if( d.userfile1.value == false && d.userfile2.value != false )
        {
            var extensao2  = d.userfile2.value.substr( d.userfile2.value.length - 4 ).toLowerCase();
            if( extensao2 != ".pdf" )
            {
                alert("Prova do Tipo 2: Arquivo inválido, somente arquivos do tipo PDF são aceitos.");
                d.userfile2.focus();
                return false;
            }
        }
        if( d.userfile1.value != false && d.userfile2.value != false )
        {
           var extensao1  = d.userfile1.value.substr( d.userfile1.value.length - 4 ).toLowerCase();
          if( extensao1 != ".pdf" )
          {
              alert("Prova do Tipo 1: Arquivo inválido, somente arquivos do tipo PDF são aceitos.");
              d.userfile1.focus();
              return false;
          }
          var extensao2  = d.userfile2.value.substr( d.userfile2.value.length - 4 ).toLowerCase();
            if( extensao2 != ".pdf" )
            {
                alert("Prova do Tipo 2: Arquivo inválido, somente arquivos do tipo PDF são aceitos.");
                d.userfile2.focus();
                return false;
            }
        }

        return true;
    }

</script>
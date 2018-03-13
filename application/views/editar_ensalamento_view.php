

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

          <div class="panel panel-default">
            <div class="panel-heading">Horários 2016.1</div>
              <div class="panel-body">

            
                   <?php


                   if( isset($msg))
                   {
                    echo $msg;
                   }

                    $atributos = array('class' => 'form-horizontal');

                    echo form_open('horario/editarEnsalamentoSala',$atributos);

                    //echo "<div class='form-group'>";


                        //echo form_hidden('id_professor', $usuario[0]->id);
                        echo form_hidden('id', $horarios[0]->id);


                        if( $horarios[0]->dia == '2' ) { $dia = 'Segunda-feira';} 
                        if( $horarios[0]->dia == '3' ) { $dia = 'Terça-feira';}
                        if( $horarios[0]->dia == '4' ) { $dia = 'Quarta-feira';}
                        if( $horarios[0]->dia == '5' ) { $dia = 'Quinta-feira';}
                        if( $horarios[0]->dia == '6' ) { $dia = 'Sexta-feira';}
                        if( $horarios[0]->dia == '7' ) { $dia = 'Sábado';}

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "dia",
                            "id" => "dia",
                            "value" => $horarios[0]->dia,
                            "class" => "form-control"
                          );
                        echo form_label('Dia','dia');
                        echo form_input($atributos1);

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "curso",
                            "id" => "curso",
                            "value" => $horarios[0]->curso,
                            "class" => "form-control",
                            "disabled" => ""
                          );
                        echo form_label('Curso','curso');
                        echo form_input($atributos1);

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "serie",
                            "id" => "serie",
                            "value" => $horarios[0]->serie,
                            "class" => "form-control",
                            "disabled" => ""
                          );
                        echo form_label('Série','serie');
                        echo form_input($atributos1);

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "turno",
                            "id" => "turno",
                            "value" => $horarios[0]->turno,
                            "class" => "form-control",
                            "disabled" => ""
                          );
                        echo form_label('Turno','turno');
                        echo form_input($atributos1);

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "disciplina",
                            "id" => "disciplina",
                            "value" => $horarios[0]->disciplina,
                            "class" => "form-control",
                            "disabled" => ""
                          );
                        echo form_label('Disciplina','disciplina');
                        echo form_input($atributos1);


                        $atributos1 = array(
                            "type" => "text",
                            "name" => "id_docente",
                            "id" => "id_docente",
                            "value" => $horarios[0]->id_docente,
                            "class" => "form-control"
                          );
                        echo form_label('Código do Professor','id_docente');
                        echo form_input($atributos1);


                        $atributos1 = array(
                            "type" => "text",
                            "name" => "docente",
                            "id" => "docente",
                            "value" => $horarios[0]->docente,
                            "class" => "form-control"
                          );
                        echo form_label('Docente','docente');
                        echo form_input($atributos1);


                        $atributos1 = array(
                            "type" => "text",
                            "name" => "sala",
                            "id" => "sala",
                            "value" => $horarios[0]->sala,
                            "class" => "form-control"
                          );
                        echo form_label('Sala','sala');
                        echo form_input($atributos1);

                        echo "<br>";
                        $atributos2 = array(
                            "type" => "submit",
                            "name" => "btnSubmit",
                            "value" => "Atualizar",
                            "class" => "btn btn-primary",
                          );

                        echo form_input($atributos2);

                    echo form_close();


                  ?>
                        </div>
                    </div>
                  </div>

        </div>  
    </div>
</div>  <!-- /container -->
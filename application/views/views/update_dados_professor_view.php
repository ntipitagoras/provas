

<div class="container">
    <div class="row">
        <div class="col-md-4">

                   <?php

                    $atributos = array('class' => 'form-horizontal');

                    echo form_open('configuracao/updateDataProfile',$atributos);
                    echo "<span class='valida'><b>". validation_errors(). "</b></span>";
                    echo "<div class='form-group'>";


                        echo form_hidden('id_professor', $usuario[0]->id);
                        echo form_hidden('acao', 'atualizar');

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "email",
                            "id" => "email",
                            "value" => $usuario[0]->email,
                            "class" => "form-control"
                          );
                        echo form_label('E-mail','e-mail');
                        echo form_input($atributos1);

                        echo "<br>";
                        $atributos2 = array(
                            "type" => "submit",
                            "name" => "btnSubmit",
                            "value" => "Atualizar e-mail",
                            "class" => "btn btn-primary"
                          );

                        echo form_input($atributos2);

                    echo form_close();


                  ?>
        </div>
    </div> 
</div>  <!-- /container -->
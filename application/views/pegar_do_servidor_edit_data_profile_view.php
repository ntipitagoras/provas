
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <font color="red"> <?php echo (isset($msg) ? $msg : '') ?> </font>
                
                <div class="row">
                    <div class="col-md-4">

                   <?php

                    $atributos = array('class' => 'form-horizontal');

                    echo form_open('horario/atualizaEnsalamento',$atributos);

                    echo "<div class='form-group'>";


                        //echo form_hidden('id_professor', $usuario[0]->id);
                        echo form_hidden('acao', 'atualizar');

                        $atributos1 = array(
                            "type" => "text",
                            "name" => "Dia",
                            "id" => "dia",
                            "value" => set_value('dia'),
                            "class" => "form-control"
                          );
                        echo form_label('Dia','dia');
                        echo form_input($atributos1);


                        $atributos1 = array(
                            "type" => "text",
                            "name" => "Curso",
                            "id" => "curso",
                            "value" => set_value('curso'),
                            "class" => "form-control"
                          );
                        echo form_label('Curso','curso');
                        echo form_input($atributos1);




                        echo "<br>";
                        $atributos2 = array(
                            "type" => "submit",
                            "name" => "btnSubmit",
                            "value" => "Atualizar",
                            "class" => "btn btn-primary"
                          );

                        echo form_input($atributos2);

                    echo form_close();


                  ?>

                    </div>

                </div>

          </form>

        </div>  
    </div>
</div>  <!-- /container -->
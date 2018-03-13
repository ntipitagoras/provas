
      <h4>Editar Serventia</h4>

      <?php

        $atributos = array('class' => 'form-horizontal');

        echo form_open('serventia/write_serventia',$atributos);
        echo "<span class='valida'><b>". validation_errors(). "</b></span>";
        echo "<div class='form-group'>";

        echo form_hidden('id',$id);

            $atributos1 = array(
                "type" => "text",
                "name" => "comarca",
                "id" => "comarca",
                "value" => set_value('comarca'),
                "class" => "form-control"
              );
            echo form_label('Comarca *','comarca');
            echo form_input($atributos1);

            $atributos11 = array(
                "type" => "text",
                "name" => "municipio",
                "id" => "municipio",
                "value" => set_value('municipio'),
                "class" => "form-control"
              );
            echo form_label('Município *','municipio');
            echo form_input($atributos11);

            $atributos111 = array(
                "type" => "text",
                "name" => "nomeserventia",
                "id" => "nomeserventia",
                "value" => set_value('nomeserventia'),
                "class" => "form-control"
              );
            echo form_label('Nome da Serventia *','nomeserventia');
            echo form_input($atributos111);


            $atributos2 = array(
                "type" => "text",
                "name" => "titular",
                "id" => "titular",
                "value" => $titular,
                "class" => "form-control"
              );

            echo form_label('Titular','titular');
            echo form_input($atributos2);



            $atributos3 = array(
                "type" => "text",
                "name" => "substituto",
                "id" => "substituto",
                "value" => $substituto,
                "class" => "form-control"
              );
            echo form_label('Substituto','substituto');
            echo form_input($atributos3);

            $atributos4 = array(
                "type" => "text",
                "name" => "atribuicoes",
                "id" => "atribuicoes",
                "value" => $atribuicoes,
                "class" => "form-control"
              );
            echo form_label('Atribuições','atribuicoes');
            echo form_input($atributos4);

            $atributos5 = array(
                "type" => "text",
                "name" => "endereco",
                "id" => "endereco",
                "value" => $endereco,
                "class" => "form-control"
              );
            echo form_label('Endereço','endereco');
            echo form_input($atributos5);

            $atributos7 = array(
                "type" => "text",
                "name" => "telefone1",
                "id" => "telefone1",
                "value" => $telefone1,
                "class" => "form-control"
              );
            echo form_label('telefone 1','telefone1');
            echo form_input($atributos7);


            $atributos8 = array(
                "type" => "text",
                "name" => "telefone2",
                "id" => "telefone2",
                "value" => $telefone2,
                "class" => "form-control"
              );
            echo form_label('Telefone 2','telefone2');
            echo form_input($atributos8);

            $atributos9 = array(
                "type" => "text",
                "name" => "celular",
                "id" => "celular",
                "value" => $celular,
                "class" => "form-control"
              );
            echo form_label('Celular','celular');
            echo form_input($atributos9);

            $atributos10 = array(
                "type" => "text",
                "name" => "email1",
                "id" => "email1",
                "value" => $email1,
                "class" => "form-control"
              );
            echo form_label('E-mail 1','email1');
            echo form_input($atributos10);

            $atributos10 = array(
                "type" => "text",
                "name" => "email2",
                "id" => "email2",
                "value" => $email2,
                "class" => "form-control"
              );
            echo form_label('E-mail 2','email2');
            echo form_input($atributos10);

            $atributos11 = array(
                "type" => "submit",
                "name" => "btnSubmit",
                "value" => "Atualizar Serventia",
                "class" => "btn btn-primary"
              );

            echo form_input($atributos11);

        echo form_close();

        echo "</div>";

      ?>
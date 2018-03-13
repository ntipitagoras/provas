

<div class="container">
    <div class="" ="row">
        <div class="col-md-12">
            <center>
                <img src="<?php echo base_url(); ?>assets/imgs/icon-email.png" width="20%" height="20%">
            </center>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">

        <br>
            <center>
                <font color=red><?=@$this->session->flashdata('msg');?></font>
            </center>
        <br>

           <?php

            $atributos = array('class' => 'form-signin', 'name' => 'formulario', 'id' => 'formulario', 'onSubmit' => 'return validaForm()');

            echo form_open('home/send_email',$atributos);
            echo form_hidden('acao', 'enviar');

                $atributos1 = array(
                    "type" => "text",
                    "name" => "cpf",
                    "id"   => "cpf",
                    "class" => "form-control"
                  );
                echo form_label('Após seu CPF ser informado, sua senha será enviado para seu e-mail cadastrado!','cpf');
                echo form_input($atributos1);

                echo "<br>";
                $atributos2 = array(
                    "type" => "submit",
                    "name" => "btnSubmit",
                    "value" => "Enviar senha !",
                    "class" => "btn btn-primary"
                  );


                echo form_input($atributos2);
                echo "&nbsp;&nbsp;&nbsp;";
                echo "<a class='btn btn-primary' href='".base_url()."'> Voltar </a>";
            echo form_close();



          ?>
        </div>
    </div>
</div>
<!-- /container -->


<script language="JavaScript">

    function validaForm()
    {
        d = document.cpf;

        if(d.cpf.value==false)
        {
            alert("Por favor, informe o CPF.");
            d.cpf.focus();
            return false;
        }

        return true;
    }
</script>
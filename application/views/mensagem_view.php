

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

        <?php

            echo "<div class='panel panel-default'>";
                echo "<div class='panel-heading'>";
                    echo "<h3 class='panel-title'>Nova mensagem</h3>";
                echo "</div>";
            echo "<div class='panel-body'>";

            echo "<font color=red><p>".@$this->session->flashdata('msg')."</p></font>";


            $atributos = array(
                                'name'=>'formulario',
                                'class'=>'form-group',
                                'role'=>'search',
                                'id'=>'formulario',
                                'onSubmit'=>'return validaForm()' 
                            );

            echo form_open_multipart('mensagem/cadastrarMensagem',$atributos);

            echo "<label>Titulo</label>";
            echo "<input type='text' name='titulo' class='form-control'>";

            echo "<label>Autor</label>";
            echo "<input type='text' name='autor'  class='form-control'>";

            echo "<label>Mensagem</label>";
            echo "<textarea name='mensagem' id='mensagem' class='form-control'></textarea>";
            echo display_ckeditor($ckeditor_mensagem);
            

            echo "<br>";

                $atributosbtn = array(
                    "type" => "submit",
                    "name" => "btnSubmit",
                    "value" => "Cadastrar mensagem",
                    "class" => "btn btn-primary"
                  );
                echo form_input($atributosbtn);

            echo "<input type='hidden' name='data' value='".date('Y-m-d')."'>";

            echo form_close();


            //INICIO DE GRID COM MENSAGENS CADASTRADAS
            echo "<table class='table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
                echo "<th> #        </th>";
                echo "<th> Titulo   </th>";
                echo "<th> Autor    </th>";
                echo "<th> Mensagem </th>";
                echo "<th> Data     </th>";
                echo "<th> Ação     </th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

                $i = 0;
                foreach( $mensagens as $m )
                {
                    $i++;
                    echo "<tr>";
                    echo "<td><h6>".$i."</h6></td>";
                    echo "<td><h6>".$m->titulo."</h6></td>";
                    echo "<td><h6>".$m->autor."</h6></td>";
                    echo "<td><h6>".$m->mensagem."</h6></td>";
                    echo "<td><h6>".$m->data."</h6></td>";
                    echo "<td><h6><a href='".base_url()."mensagem/removerMensagem/".$m->id."' class='btn btn-danger'> Remover </a></h6></td>";
                    echo "</tr>";
                }
            
            echo "</table>";

            //FIM DE MENSAGENS




            echo "</div>";
            echo "</div>";
            echo "</div>";


            
    ?>

<script language="JavaScript">

    function validaForm()
    {
        d = document.formulario;

        if(d.titulo.value==false)
        {
            alert("Por favor, informe o título da mensagem.");
            d.titulo.focus();
            return false;
        }
        if(d.autor.value==false)
        {
            alert("Por favor, informe o nome do autor da mensagem.");
            d.autor.focus();
            return false;
        }
        if(d.mensagem.value==false)
        {
            alert("Por favor, descreva a mensagem.");
            d.mensagem.focus();
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

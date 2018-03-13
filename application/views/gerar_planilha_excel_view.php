

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

        <?php

            echo "<div class='panel panel-default'>";
                echo "<div class='panel-heading'>";
                    echo "<h3 class='panel-title'>Gerar planilha</h3>";
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

            echo form_open_multipart('configuracao/gerarPlanilhaProfessor',$atributos);

                echo "<label>Selecione os professores</label>";

                echo "<select name='ids[]' size='15' multiple class='form-control'>";

                foreach( $professores as $p)
                {
                    if( $p->titulacao == 1 ){$titulacao =  'Graduação'; }
                    if( $p->titulacao == 2 ){$titulacao =  'Especialista';}
                    if( $p->titulacao == 3 ){$titulacao =  'Mestrado';}
                    if( $p->titulacao == 4 ){$titulacao =  'Doutorado';}
                    if( $p->titulacao == 5 ){$titulacao =  'Pos-doutorado';}

                    echo "<option value='".$p->id."'>".$p->nome." - ".$titulacao."</option>";
                }

                echo "</select>";


                echo "<br>";


                $atributosbtn = array(
                    "type" => "submit",
                    "name" => "btnSubmit",
                    "value" => "Gerar Planilha",
                    "class" => "btn btn-primary"
                  );
                echo form_input($atributosbtn);

            echo form_close();



            echo "</div>";
            echo "</div>";
            echo "</div>";
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
        if(d.userfile.value == false)
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



<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

<?php


$dateActual = date('Y-m-d');
$dataParameter = $this->session->userdata('data_limite_avaliacao_coordenador');
$d = explode("-",$dataParameter);
$formateDateBr = $d[2]."/".$d[1]."/".$d[0];

if( $dateActual < $dataParameter)
{

  echo "<div class='panel panel-default'>";
    echo "<div class='panel-heading'>";
      echo "<h3 class='panel-title'>Formulário de Avaliação dos Coordenadores</h3>";
    echo "</div>";

    echo "<div class='panel-body'>";
      echo "<center><br><span class='label label-danger'><b>Data limite para avaliação dos coordenadores expirado!</b></span></center><br>";
    echo "</div>";
  echo "</div>";

}
else
{

      echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span> <b>Caro diretor, o sistema estará aberto para avaliação até dia ".$formateDateBr.".</b></div>";

        echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Questionário de Avaliação dos Coordenadores</h3>";
            echo "</div>";
        echo "<div class='panel-body'>";


        echo "<font color=red><h4>". @$this->session->flashdata('msg'). "</h4></font>";

        echo "<br>";
        echo "<p class='fa fa-thumb-tack'> Para a resposta as perguntas, utilize os intervalos abaixo como parâmetros.</p>
        <p> <em> 1 - 3 = raramente / 4 - 5 = Algumas vezes / 6 - 8 = Frequentemente / 9 -10 = Sempre </em></p>";
        echo "<br>";


        $atributos = array(
                            'name'=>'formulario',
                            'class'=>'form-group',
                            'role'=>'search',
                            'id'=>'formulario',
                            'onSubmit'=>'return validaForm()',
                            'method' =>'post'
                        );

        $hidden = array('id_avaliador' => $this->session->userdata('id_professor'));

        echo form_open_multipart('avaliar/insert',$atributos,$hidden);
        echo "<span class='valida'><b>". validation_errors(). "</b></span>";

        echo "<div class='form-group has-error'>";
        echo "<label>Unidades</label>";
        echo "<select name='id_unidade' id='id_unidade' class='form-control'>";
        echo "<option value=''> - Selecione sua unidade - </option>";
        echo "<option value=''></option>";

        foreach($unidades as $unidade)
        {
            echo '<option value="' . $unidade->id .'">'. strtoupper($unidade->descricao) . '</option>';
        }
        echo "</select>";
        echo "</div>";

        echo "<div class='form-group has-error'>";
        echo "<label>Coordenadores</label>";
        echo "<span class='carregando'>&nbsp;&nbsp;Aguarde, carregando...</span>";
        echo "<select name='id_avaliado' id='id_avaliado' class='form-control'>";
        echo "<option value=''> </option>";
        echo "</select>";
        echo "</div>";

        //echo "<br>";
        //echo "<h4 class='fa fa-pencil'> Avaliações </h4>";
        echo "<br><br>";


        ####### METAS E RESULTADOS #########

        echo "<h4 class='alert alert-danger'>Avaliação dos Resultados</h4>";

        echo "<div class='form-group'>";

        echo "<table class='table table-bordered'>";

        echo "<tr>";
        echo "<td rowspan='2'><b>Metas</b></td>";
        echo "<td rowspan='2' align='center' valign='middle'><b>Realizado</b></td>";
        echo "<td rowspan='2' align='center'><b>Meta</b></td>";
        echo "<td colspan='2'align='center'><b>Atingiu ?</b></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td align='center'> Sim </td>";
        echo "<td align='center'> Não </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td cols='2'><em>Captação</em></td>";
        echo "<td align='center'> <input type='text'  name='caprealizado'> </td>";
        echo "<td align='center'> <input type='text'  name='capmeta'> </td>";
        echo "<td align='center'> <input type='radio' value='s' name='m1'> </td>";
        echo "<td align='center'> <input type='radio' value='n' name='m1'> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><em>Retenção?</em></td>";
        echo "<td align='center'> <input type='text'  name='retrealizado'> </td>";
        echo "<td align='center'> <input type='text'  name='retmeta'> </td>";
        echo "<td align='center'> <input id='m2' type='radio' value='s' name='m2'> </td>";
        echo "<td align='center'> <input id='m2' type='radio' value='n' name='m2'> </td>";
        echo "</tr>";


        //////////////////////////////


        echo "<tr>";
        echo "<td rowspan='2'><b></b></td>";
        echo "<td rowspan='2' align='center'></td>";
        echo "<td rowspan='2' align='center'></td>";
        echo "<td colspan='2'align='center'><b>Satisfatório ?</b></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td align='center'> Sim </td>";
        echo "<td align='center'> Não </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td cols='2'><em>Nota Avaliar</em></td>";
        echo "<td align='center'> <input type='text'  name='notaavaliar'> </td>";
        echo "<td align='center'> </td>";
        echo "<td align='center'> <input id='m1' type='radio' value='s' name='m3'> </td>";
        echo "<td align='center'> <input id='m1' type='radio' value='n' name='m3'> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td cols='2'><em>Conceito Curso</em></td>";
        echo "<td align='center'> <input type='text'  name='conceitocurso'> </td>";
        echo "<td align='center'> </td>";
        echo "<td align='center'> <input id='m1' type='radio' value='s' name='m4'> </td>";
        echo "<td align='center'> <input id='m1' type='radio' value='n' name='m4'> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td cols='2'><em>ENADE</em></td>";
        echo "<td align='center'> <input type='text'  name='notaenade'> </td>";
        echo "<td align='center'> </td>";
        echo "<td align='center'> <input id='m1' type='radio' value='s' name='m5'> </td>";
        echo "<td align='center'> <input id='m1' type='radio' value='n' name='m5'> </td>";
        echo "</tr>";



        echo "</table>";

        echo "</div>";
        echo "<br>";

        ######## FIM - METAS #########

        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Paixão por Educar:<small>&nbsp;Somos educadores movidos pela paixão em formar e desenvolver pessoas. </small></h4>";
        echo "<br>";
        echo "<p>Age com interesse e preocupação com a formação dos nossos alunos, de forma coletiva e individual.</p>";
        echo "<select name='p11' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "<p>Cumpre com o seu papel dentro do processo de Ensino - Aprendizagem, priorizando sempre o fornecimento de serviços para aplicação de aula.</p>";
        echo "<select name='p12' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "</div>";
        echo "<br><br>";

        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Respeito às Pessoas:<small>&nbsp; Respeitamos a diversidade e cultivamos relacionamentos.</small></h4>";
        echo "<br>";
        echo "<p>Se relaciona de forma igualitária com todos os Stake Holders, independente de sua orientação, origem ou posição social.</p>";
        echo "<select name='p21' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "<p>Cultiva relacionamento amigável com superiores e pares, promovendo um Clima Organizacional saudável.</p>";
        echo "<select name='p22' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "</div>";
        echo "<br><br>";


        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Honestidade e Responsabilidade:<small>&nbsp; Agimos com integridade, transparência e assumimos os impactos de nossas ações.</small></h4>";
        echo "<br>";
        echo "<p>Atua e demonstra transparência em todas as suas ações e alinhamentos, diariamente.</p>";
        echo "<select name='p31' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "<p>Assume a responsabilidade de resultados relacionados a sua atuação, seja positivo ou negativo.</p>";
        echo "<select name='p32' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "</div>";
        echo "<br><br>";


        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Fazer acontecer:<small>&nbsp; Agimos com integridade, transparência e assumimos os impactos de nossas ações.</small></h4>";
        echo "<br>";
        echo "<p>Possui um nível de entrega adequado com cumprimento de prazos e qualidade esperada.</p>";
        echo "<select name='p41' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "<p>Busca a implementação efetiva de ações sugeridas ou necessárias, identificadas individualmente ou em grupo.</p>";
        echo "<select name='p42' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "<p>Demonstra resolutividade em suas ações, sendo flexível e rápido para resolver um problema ou melhorar um processo.</p>";
        echo "<select name='p43' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "</div>";
        echo "<br><br>";


        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Foco em geração de valor: <small>&nbsp; Buscamos em nossas ações a geração de valor sustentável.</small></h4>";
        echo "<br>";
        echo "<p>Possui olhar crítico e acompanha as ações e processos implementados para gerar continuidade.</p>";
        echo "<select name='p51' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "</div>";
        echo "<br><br>";


        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Trabalhar  junto:<small>&nbsp;Unimos esforços para o mesmo propósito.</small></h4>";
        echo "<br>";
        echo "<p>Se relaciona de forma cordial e amigável, buscando a interação para desenvolvimento de atividades conjunta.</p>";
        echo "<select name='p61' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "<p>Busca e estimula o relacionamento com superiores e pares com o objetivo de alavancar ou otimizar resultados (1+1=3).</p>";
        echo "<select name='p62' class='form-control'>";
        echo "<option value=''>Selecione</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "<option value='10'>10</option>";
        echo "</select>";
        echo "</div>";
        echo "<br><br>";



        ####### observacoes #########
        echo "<div class='form-group'>";
        echo "<h4 class='text-primary'>Observações Gerais/Plano de Ação:</h4>";
        echo "<textarea name='observacao' rows='5' cols='80' class='form-control'></textarea>";
        echo "<br>";
        echo "<h4 class='text-primary'>Positivos:</h4>";
        echo "<textarea name='positivo' rows='5' cols='80' class='form-control'></textarea>";
        echo "<br>";
        echo "<h4 class='text-primary'>Negativos:</h4>";
        echo "<textarea name='negativo' rows='5' cols='80' class='form-control'></textarea>";
        echo "<br>";
        echo "</div>";

        $dataHora = date('Y-m-d h:m:s');

        $atributosbtn = array(
            "type" => "submit",
            "value" => "Gravar Dados!",
            "class" => "btn btn-primary"
          );
        echo form_input($atributosbtn);

        echo "<input type='hidden' name='data' value='".$dateActual."'>";

        echo form_close();

        echo "</div>";
        echo "</div>";

      }
      //FIM -> QUESTIONÁRIO DE AVALIAÇÃO


        echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Avaliações</h3>";
            echo "</div>";


        if( $avaliacoes )
        {

            echo "<table class='table table-bordered'>";
            echo "<tr>";
                echo "<td><b>#</b></td>";
                echo "<td><b>Avaliador</b></td>";
                echo "<td><b>Avaliado</b></td>";
                echo "<td><b>Data</b></td>";
            echo "</tr>";


            //$array_provas = array();
            $i = 0;
            foreach ( $avaliacoes as $avalia )
            {
                $i++;
                $dataX = substr($avalia->data, 0, 10);
                $dataY = explode('-',$dataX);
                $dataF =  $dataY[2] . "/" .  $dataY[1] . "/" . $dataY[0];
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$avalia->avaliador."</td>";
                echo "<td>".$avalia->avaliado."</td>";
                echo "<td>".$dataF."</td>";
                echo "</tr>";
            }

            echo "</table>";

        //FIM DO PAINEL
        echo "</div>";

    }else{
        echo "<center><br><span class='label label-danger'>Nenhuma avaliação enviada até o momento!</span></center><br>";
    }

?>



<script src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load('jquery', '1.3');
  </script>

  <script type="text/javascript">
  $(function(){
    $('#id_unidade').change(function(){
      if( $(this).val() ) {
        $('#id_unidade').show();
        $('.carregando').show();
        $.getJSON('http://www.pitagorasslz.com.br/provas/assets/js/coordenadores.ajax.php?search=',{id_unidade: $(this).val(), ajax: 'true'}, function(j){
          var options = '<option value=""></option>';
          for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].id_avaliado + '">' + j[i].nome + '</option>';
          }
          $('#id_avaliado').html(options).show();
          $('.carregando').hide();
        });
      } else {
        $('#id_avaliado').html('<option value=""> – Escolha um coordenador – </option>');
      }
    });
  });
</script>

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

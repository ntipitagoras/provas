

<div id="page-wrapper">
<div class="row">
<div class="col-md-12">
<br>

<?php

//echo '<pre>';
//echo $this->db->last_query();
//var_dump($horarios);
//echo '</pre>';
//break;

?>
<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-bullhorn' aria-hidden='true'></span>   	Horário sujeito a modificações!</div>

<div class="panel panel-default">
<div class="panel-heading">Horário 2017.2</div>
<div class="panel-body">

<p><font color=red><?=@$this->session->flashdata('msg');?></font></p>

<?php

if( $this->session->userdata('nivel_diretor')  == 1 || $this->session->userdata('nivel_coordenador')  == 1  )
{
echo "Total de horários já preenchidos";
echo "<div class='progress'>";
echo "<div class='progress-bar' role='progressbar' aria-valuenow='' aria-valuemin='".$porcento."' aria-valuemax='100' style='width:".$porcento."%'>";
echo $porcento;
echo "</div>";
echo "</div>";
}
?>


<?php

if(!empty($horarios))
{
echo "<h4> Matutino </h4>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td><b>Dia</b></td>";
echo "<td><b>Curso</b></td>";
echo "<td><b>Disciplina</b></td>";
echo "<td><b>Série</b></td>";
echo "<td><b>Turma</b></td>";
echo "<td><b>Sala</b></td>";
echo "</tr>";
echo "<tr>";
foreach( $horarios as $h )
{
if( $h->turno == 'M')
{

if( $h->cod_dia == 2)
{
echo "<td>";
echo "Segunda-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 3)
{
echo "<td>";
echo "Terça-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 4)
{
echo "<td>";
echo "Quarta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 5)
{
echo "<td>";
echo "Quinta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 6)
{
echo "<td>";
echo "Sexta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}

}
echo "</tr>";
}

echo "</table>";
}
else
{
echo "<h4> Matutino</h4>";
echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
}



//VESPERTINO
if(!empty($horarios))
{
echo "<h4> Vespertino</h4> ";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td><b>Dia</b></td>";
echo "<td><b>Curso</b></td>";
echo "<td><b>Disciplina</b></td>";
echo "<td><b>Série</b></td>";
echo "<td><b>Turma</b></td>";
echo "<td><b>Sala</b></td>";
echo "</tr>";
echo "<tr>";
foreach( $horarios as $h )
{
if( $h->turno == 'V')
{

if( $h->cod_dia == 2)
{
echo "<td>";
echo "Segunda-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 3)
{
echo "<td>";
echo "Terça-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 4)
{
echo "<td>";
echo "Quarta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 5)
{
echo "<td>";
echo "Quinta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 6)
{
echo "<td>";
echo "Sexta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}


}
echo "</tr>";
}

echo "</table>";
}
else
{
echo "<h4> Vespertino</h4>";
echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
}
//FIM

//noturno
if(!empty($horarios))
{
echo "<h4>Noturno</h4>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td><b>Dia</b></td>";
echo "<td><b>Curso</b></td>";
echo "<td><b>Disciplina</b></td>";
echo "<td><b>Série</b></td>";
echo "<td><b>Turma</b></td>";
echo "<td><b>Sala</b></td>";
echo "</tr>";
echo "<tr>";
foreach( $horarios as $h )
{
if( $h->turno == 'N')
{

if( $h->cod_dia == 2)
{
echo "<td>";
echo "Segunda-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 3)
{
echo "<td>";
echo "Terça-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 4)
{
echo "<td>";
echo "Quarta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 5)
{
echo "<td>";
echo "Quinta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}
if( $h->cod_dia == 6)
{
echo "<td>";
echo "Sexta-feira";
echo "</td>";
echo "<td>";
echo  $h->curso;
echo "</td>";
echo "<td>";
echo  $h->desc_disciplina;
echo "</td>";
echo "<td>";
echo  $h->serie;
echo "</td>";
echo "<td>";
echo  $h->cod_turma;
echo "</td>";
echo "<td>";
echo  $h->ensalamento;
echo "</td>";
}


}
echo "</tr>";
}

echo "</table>";
}
else
{
echo "<h4> Noturno</h4>";
echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
}


?>

</div>
</div>
</div>
</div>
</div>

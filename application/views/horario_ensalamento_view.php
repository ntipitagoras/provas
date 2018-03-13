
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">

        <br>

          <div class="panel panel-default">
            <div class="panel-heading">Horários 2017.2</div>
              <div class="panel-body">

              <?php
                              echo "<table class='table table-bordered'>";
                              echo "<tr>";
                              echo "<td><b>Dia</b></td>";
                              echo "<td><b>Curso</b></td>";
                              echo "<td><b>Disciplina</b></td>";
                              echo "<td><b>Série</b></td>";
                              echo "<td><b>Turma</b></td>";
                              echo "<td><b>Docente</b></td>";
                              echo "<td><b>Sala</b></td>";
                              echo "<td><b>Editar</b></td>";
                              echo "</tr>";

                       foreach( $horario as $h )
                        {
                            echo "<tr>";
                              echo "<td><h6>";

                              if( $h->dia == '2' ) { $dia = 'Segunda-feira';}
                              if( $h->dia == '3' ) { $dia = 'Terça-feira';}
                              if( $h->dia == '4' ) { $dia = 'Quarta-feira';}
                              if( $h->dia == '5' ) { $dia = 'Quinta-feira';}
                              if( $h->dia == '6' ) { $dia = 'Sexta-feira';}
                              if( $h->dia == '7' ) { $dia = 'Sábado';}

                              echo $dia;
                              echo "</h6></td>";
                              echo "<td><h6>";
                              echo  $h->curso;
                              echo "</h6></td>";
                              echo "<td><h6>";
                              echo  $h->disciplina;
                              echo "</h6></td>";
                              echo "<td><h6>";
                              echo  $h->serie;
                              echo "</h6></td>";
                              echo "<td><h6>";
                              echo  $h->turma;
                              echo "</h6></td>";
                              echo "<td><h6>";
                              echo  $h->id_docente . " - " . $h->docente;
                              echo "</h6></td>";
                              echo "<td><h6>";
                              echo  $h->sala;
                              echo "</h6></td>";
                              echo "<td>";
                              echo "<center><a href='".base_url()."horario/editarEnsalamento/".$h->id."'>";
                              echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> </a></center>";
                              echo "</td>";
                            echo "</tr>";
                        }

                ?>


                </div>
              </div>
            </div>

    </div>
  </div>
</div>

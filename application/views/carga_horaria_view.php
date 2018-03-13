
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

          <div class="panel panel-default">
            <div class="panel-heading">Todos Horário dos professores do semestre de 2017.2</div>
              <div class="panel-body">


              <div class="col-md-6">
              <?php

                  if(!empty($professoresA))
                  {

                        echo "<table class='table table-bordered'>";
                            echo "<tr><td colspan='3'>Carga Horário 2015.2</td></tr>";
                            echo "<tr>";
                              echo "<td><b>#</b></td>";
                              echo "<td><b>Professor</b></td>";
                              echo "<td><b>Carga Horária</b></td>";
                            echo "</tr>";

                        $i = 0;
                        foreach( $professoresA as $professorA )
                        {
                            $i++;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$professorA->docente."</td>";
                            echo "<td>".$professorA->total."</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }
                    else
                    {
                        echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Noturno</h4></div> ";
                        echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
                    }


                ?>
                </div>

              <div class="col-md-6">
              <?php

                  if(!empty($professores))
                  {

                        echo "<table class='table table-bordered'>";
                            echo "<tr><td colspan='3'>Carga Horário 2016.1</td></tr>";
                            echo "<tr>";
                              echo "<td><b>#</b></td>";
                              echo "<td><b>Professor</b></td>";
                              echo "<td><b>Carga Horária</b></td>";
                            echo "</tr>";

                        $i = 0;
                        foreach( $professores as $professor )
                        {
                            $i++;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$professor->docente."</td>";
                            echo "<td>".$professor->total."</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }
                    else
                    {
                        echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Noturno</h4></div> ";
                        echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
                    }


                ?>
                </div>




                  </div>
                </div>
              </div>

       </div>
    </div>
</div>

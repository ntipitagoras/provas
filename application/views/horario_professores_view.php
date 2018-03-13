
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

          <div class="panel panel-default">
            <div class="panel-heading">Todos Horário dos professores do semestre de 2017.2</div>
              <div class="panel-body">

              <?php

              //INICIO DO FORMULARIO DE PESQUISA
              $atributos = array(
                          'name'=>'formulario',
                          'class'=>'form-inline',
                          'role'=>'search',
                          'id'=>'formulario'
                      );

              //$hidden = array('idProfessor' => $this->session->userdata('id'));

              echo form_open_multipart('horario/searchId',$atributos);

              echo "<select name='cod_docente'>";
              echo "<option value=''>Selecione...</option>";

              foreach($professores as $p)
              {
                echo "<option value=".$p->id_professor.">".strtoupper($p->nome)."</option>";
              }


              $atributosbtn = array(
                "type" => "submit",
                "name" => "btnSubmit",
                "value" => "Pesquisar",
                "class" => "btn btn-primary"
                );
              echo form_input($atributosbtn);

              echo form_close();
              ?>
              <br><br>
              <?php

                    if(!empty($horario))
                    {
                      echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Matutino</h4></div> ";
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
                        foreach( $horario as $h )
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
                      echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Matutino</h4></div> ";
                      echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
                   }



                   //VESPERTINO
                  if(!empty($horario))
                    {
                      echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Vespertino</h4></div> ";
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
                        foreach( $horario as $h )
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
                      echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Vespertino</h4></div> ";
                      echo "<center><br><span class='label label-danger'>Nenhum registro encontrado!</span></center><br>";
                   }
                   //FIM

                   //noturno
                   if(!empty($horario))
                    {
                      echo "<div class='alert alert-success' role='alert'><h4><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> Noturno</h4></div> ";
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
                        foreach( $horario as $h )
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

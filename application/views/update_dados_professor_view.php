
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

        <font color=red><p><?=@$this->session->flashdata('msg');?></p></font>

        <!-- DADOS PESSOAIS -->
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h3 class='panel-title'>Acadêmico</h3>
            </div>

              <div class='panel-body'>

              <?php

                foreach($usuario as $u)
                {

                      //prepara data
                      $dataExplode = explode('-',substr($u->data,0,10));
                      $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];

                      $atributos = array(
                                        'name'=>'formulario',
                                        'id'=>'formulario',
                                        'onSubmit'=>'return validaForm()'
                                    );

                      echo "<br>";
                      echo "<em> Data da última atualização: ". $dataX . "</em><br><br>";

                      echo form_open_multipart('configuracao/updateDadosProfessor',$atributos);
                      echo "<input type='hidden' name='acao' value='atualizar'>";

                        $atr_nome = array(
                            "type" => "text",
                            "name" => "nome",
                            "id" => "nome",
                            "value" => strtoupper($u->nome),
                            "class" => "form-control",
                            "required" => "" ,
                            "disabled" => ""
                          );
                        echo form_label('Nome', 'nome');
                        echo form_input($atr_nome);
                        echo "<br>";

                          $atr_cpf = array(
                              "type" => "text",
                              "name" => "cpf",
                              "id" => "cpf",
                              "value" => "$u->cpf",
                              "class" => "form-control",
                              "required" => "",
                              "disabled" => ""
                            );
                          echo form_label('CPF', 'cpf');
                          echo form_input($atr_cpf);
                          echo "<br>";

                            $atr_rg = array(
                                "type" => "text",
                                "name" => "rg",
                                "id" => "rg",
                                "value" => "$u->rg",
                                "class" => "form-control",
                                "required" => ""             ,
                                "placeholder" => "Digite RG sem pontuação"
                              );
                            echo form_label('RG', 'rg');
                            echo form_input($atr_rg);
                            echo "<br>";

                            $atr_email = array(
                                "type" => "text",
                                "name" => "email",
                                "id" => "email",
                                "value" => "$u->email",
                                "class" => "form-control",
                                "required" => "Informe e-mail"
                              );
                            echo form_label('E-mail', 'email');
                            echo form_input($atr_email);
                            echo "<br>";

                            $atr_celular = array(
                                "type" => "text",
                                "name" => "celular",
                                "id" => "celular",
                                "value" => "$u->celular",
                                "class" => "form-control",
                                "required" => "Informe número celular",
                                "placeholder" => "Informe número sem pontuação"
                              );
                            echo form_label('Celular', 'celular');
                            echo form_input($atr_celular);
                            echo "<br>";


                            $atr_senha = array(
                                "type" => "text",
                                "name" => "senha",
                                "id" => "senha",
                                "placeholder" => "Digite uma nova senha para alterar a atual",
                                "class" => "form-control",
                                "required" => ""
                              );
                            echo form_label('Senha', 'senha');
                            echo form_input($atr_senha);
              ?>

              </div>
            </div>
            <!-- FIM -->



            <!-- DADOS DOCUMENTOS -->
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h3 class='panel-title'>Dados Profissionais</h3>
              </div>

              <div class='panel-body'>

              <?php

                         $atr_tepms = array(
                            "type" => "text",
                            "name" => "tepms",
                            "id" => "tepms",
                            "value" => "$u->tepms",
                            "class" => "form-control",
                            "required" => ""
                          );
                        echo form_label('Tempo de Experiência Profissional no Magisterio Superior', 'tepms');
                        echo form_input($atr_tepms);
                        echo "<br>";

                        $atr_teped = array(
                            "type" => "text",
                            "name" => "teped",
                            "id" => "teped",
                            "value" => "$u->teped",
                            "class" => "form-control",
                            "required" => ""
                          );
                        echo form_label('Tempo de Experiência Profissional na Educação Básica', 'teped');
                        echo form_input($atr_teped);
                        echo "<br>";

                        $atr_tepfm = array(
                            "type" => "text",
                            "name" => "tepfm",
                            "id" => "tepfm",
                            "value" => "$u->tepfm",
                            "class" => "form-control",
                            "required" => ""
                          );
                        echo form_label('Tempo de Experiência Profissional Fora do Magisterio', 'tepfm');
                        echo form_input($atr_tepfm);
                        echo "<br>";

                        echo form_label('Titulação', 'titulacao');
                        echo "<br>";
                        echo "<select name='titulacao'>";
                        echo "<option value=''>Selecione...</option>";
                        echo "<option value=''></option>";


                        foreach( $titulacao as $t)
                        {
                            if( $t->id == $u->titulacao )
                            {
                                echo "<option value='" .$t->id. "' selected>".$t->descricao."</option>";
                            }
                            else
                            {
                                echo "<option value='" .$t->id. "'>".$t->descricao."</option>";
                            }

                        }
                        echo "</select>";

              ?>
              </div>
            </div>
            <!-- FIM -->


            <!-- PRODUCAO CIENTIFICA -->
              <div class='panel panel-default'>
                <div class='panel-heading'>
                  <h3 class='panel-title'>Produção Científica</h3>
                </div>

                <div class='panel-body'>

                <?php

                           $atr_appca = array(
                              "type" => "text",
                              "name" => "appca",
                              "id" => "appca",
                              "value" => "$u->appca",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Artigos publicados em periódicos científicos na área', 'appca');
                          echo form_input($atr_appca);
                          echo "<br>";


                          $atr_appcoa = array(
                              "type" => "text",
                              "name" => "appcoa",
                              "id" => "appcoa",
                              "value" => "$u->appcoa",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Artigos publicados em periódicos científicos em outras áreas', 'appcoa');
                          echo form_input($atr_appcoa);
                          echo "<br>";

                          $atr_lclpa = array(
                              "type" => "text",
                              "name" => "lclpa",
                              "id" => "lclpa",
                              "value" => "$u->lclpa",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Livros ou capítulos em livros publicados na área', 'lclpa');
                          echo form_input($atr_lclpa);
                          echo "<br>";

                          $atr_lclpoa = array(
                              "type" => "text",
                              "name" => "lclpoa",
                              "id" => "lclpoa",
                              "value" => "$u->lclpoa",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Livros ou capítulos em livros publicados em outras áreas', 'lclpoa');
                          echo form_input($atr_lclpoa);
                          echo "<br>";

                          $atr_tpac = array(
                              "type" => "text",
                              "name" => "tpac",
                              "id" => "tpac",
                              "value" => "$u->tpac",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Trabalhos publicados em anais (completos)', 'tpac');
                          echo form_input($atr_tpac);
                          echo "<br>";


                          $atr_tpar = array(
                              "type" => "text",
                              "name" => "tpar",
                              "id" => "tpar",
                              "value" => "$u->tpar",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Trabalhos publicados em anais (resumos)', 'tpar');
                          echo form_input($atr_tpar);
                          echo "<br>";


                          $atr_tlclap = array(
                              "type" => "text",
                              "name" => "tlclap",
                              "id" => "tlclap",
                              "value" => "$u->tlclap",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Traduções de livros, capítulos de livros ou artigos publicados', 'tlclap');
                          echo form_input($atr_tlclap);
                          echo "<br>";

                          $atr_pid = array(
                              "type" => "text",
                              "name" => "pid",
                              "id" => "pid",
                              "value" => "$u->pid",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Propriedade intelectual depositada', 'pid');
                          echo form_input($atr_pid);
                          echo "<br>";

                          $atr_pir = array(
                              "type" => "text",
                              "name" => "pir",
                              "id" => "pir",
                              "value" => "$u->pir",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Propriedade intelectual registrada', 'pir');
                          echo form_input($atr_pir);
                          echo "<br>";


                          $atr_pptac = array(
                              "type" => "text",
                              "name" => "pptac",
                              "id" => "pptac",
                              "value" => "$u->pptac",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Projetos e/ou produções técnicas artísticas e culturais', 'pptac');
                          echo form_input($atr_pptac);
                          echo "<br>";


                          $atr_pdprpn = array(
                              "type" => "text",
                              "name" => "pdprpn",
                              "id" => "pdprpn",
                              "value" => "$u->pdprpn",
                              "class" => "form-control",
                              "placeholder" => "somente números em anos"
                            );
                          echo form_label('Produção didático-pedagógica relevante, publicada ou não', 'pdprpn');
                          echo form_input($atr_pdprpn);
                          echo "<br>";

                              $atributosbtn = array(
                              "type" => "submit",
                              "name" => "acao",
                              "value" => "Atualizar",
                              "class" => "btn btn-primary"
                            );
                          echo form_input($atributosbtn);


                      echo form_close();

              }//fim dos dados do usuario

                ?>
                  </div>
                </div>
                <!-- FIM -->

            </div>
        <!-- FIM -->




  </div>
</div>



<script language="JavaScript">

    function validaForm()
    {
        d = document.formulario;

        if( d.documento_tipo.value > 0 && d.userfile.value == false  )
        {
            alert("Caro usuário, você selecionou o tipo de documento, mas não anexou o arquivo a ser enviado.");
            d.userfile.focus();
            return false;
        }

        return true;
    }

</script>


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

            <form class="form_search_cpf" method="POST" action="<?php echo base_url('usuarios/searchcpf');  ?>">
              <div class='panel-body'>
                <label for="cpf_search">CPF do usuário</label>
                <div class="row">
                  <div class="col-sm-4">
                  <input type="text" name="cpf_search" id="cpf_search" class="form-control" maxlength="11" placeholder="Somente números" required="TRUE">
                  </div>
                  <div class="col-sm-4">
                  <input type="submit" class="btn btn-primary" name="btn_search" value="Procurar"> 
                  </div>
                </div>
            </form>
<br><br>



            <form method="POST" action="<?php echo base_url('usuarios/atualizaDados');  ?>">

              <?php
              if (isset($usuarios)) {

                      
                        $atr_nome = array(
                            "type" => "text",
                            "name" => "nome",
                            "id" => "nome",
                            "value" => strtoupper($usuarios[0]->nome),
                            "class" => "form-control",
                            "required" => ""
                          );
                        echo form_label('Nome', 'nome');
                        echo form_input($atr_nome);
                        echo "<br>";

                          $atr_cpf = array(
                              "type" => "text",
                              "name" => "cpf",
                              "id" => "cpf",
                              "value" => $usuarios[0]->cpf,
                              "class" => "form-control",
                              "required" => "TRUE",
                              "disabled" => "TRUE"
                            );
                          $atr_cpf_hidden = array(
                              "type" => "hidden",
                              "name" => "cpf",
                              "id" => "cpf",
                              "value" => $usuarios[0]->cpf,
                              "class" => "form-control",
                              "required" => "TRUE"
                            );
                          echo form_label('CPF', 'cpf');
                          echo form_input($atr_cpf);
                          echo form_input($atr_cpf_hidden);
                          echo "<br>";

                            $atr_rg = array(
                                "type" => "text",
                                "name" => "rg",
                                "id" => "rg",
                                "value" => $usuarios[0]->rg,
                                "class" => "form-control",             
                                "placeholder" => "Digite RG sem pontuação"
                              );
                            echo form_label('RG', 'rg');
                            echo form_input($atr_rg);
                            echo "<br>";

                            $atr_email = array(
                                "type" => "text",
                                "name" => "email",
                                "id" => "email",
                                "value" => $usuarios[0]->email,
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
                                "value" => $usuarios[0]->celular,
                                "class" => "form-control",
                                "maxlength" => "11",
                                "minlength" => "11",
                                "required" => "Informe número celular",
                                "placeholder" => "Informe somente número sem pontuação"
                              );
                            echo form_label('Celular', 'celular');
                            echo form_input($atr_celular);
                            echo "<br>";


                            $atr_senha = array(
                                "type" => "password",
                                "name" => "senha",
                                "id" => "senha",
                                "placeholder" => "Digite uma nova senha para alterar a atual",
                                "class" => "form-control",
                                "required" => ""
                              );
                            echo form_label('Senha', 'senha');
                            echo form_input($atr_senha);

                            $btn_salvar = array(
                                "type" => "submit",
                                "name" => "btn_enviar",
                                "id" => "btn_enviar",
                                "value" => "Salvar",
                                "class" => "btn btn-success",                              
                              );
                            echo "<br>";
                            echo form_input($btn_salvar);
            } 
             ?>
        </form>
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

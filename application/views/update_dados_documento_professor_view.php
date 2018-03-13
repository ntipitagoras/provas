<?php

//echo "<pre>";
//var_dump($documentos);
//echo "</pre>";
//break;

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

        <font color=red><p><?=@$this->session->flashdata('msg');?></p></font>

                <!-- DADOS DOCUMENTOS -->
                  <div class='panel panel-default'>
                    <div class='panel-heading'>
                      <h3 class='panel-title'>Anexar documentos</h3>
                    </div>

                    <div class='panel-body'>


                    <?php

                                          $atributos = array(
                                        'name'=>'formulario',
                                        'id'=>'formulario',
                                        'onSubmit'=>'return validaForm()'
                                    );




                      echo form_open_multipart('configuracao/updateDadosDocumentoProfessor',$atributos);

                          echo "<h4>Atenção:</h4>";
                          echo "<ul>";
                          echo "<li>Selecione o tipo de documento que deseja enviar;</li>";
                          echo "<li>Depois faça o anexo do referido documento, só será aceito arquivos do tipo: <b><em>PDF,PNG ou JPG</em></b>;</li>";
                          echo "<li>Para cada documento faça o mesmo procedimento;</li>";
                          echo "<li>Envie os documentos com frente e verso no arquivo.</li>.";
                          echo "</ul>";
                          echo "<br>";


                          echo form_label('Tipo de documento', 'documento');
                          echo "<br>";
                          echo "<select name='id_documento'>";
                          echo "<option value='0'>Selecione...</option>";

                            foreach( $documentos as $documento)
                            {
                              echo "<option value='" .$documento->id. "'>".$documento->descricao."</option>";
                            }

                          echo "</select>";
                          echo "<br><br>";


                          echo form_label('Anexar arquivo','anexo');
                          echo "<br>";
                          echo "<input type='file' name='userfile[]' id='userfile' >";

                          echo "<br><br>";

                          $atributosbtn = array(
                              "type" => "submit",
                              "name" => "acao",
                              "value" => "Enviar",
                              "class" => "btn btn-primary"
                            );
                          echo form_input($atributosbtn);


                      echo form_close();


                  echo "<hr>";

                  echo "<h4> Documentos enviados </h4>";

                  if( $documentosUsuario )
                  {


                      echo "CPF <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '1' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp; <a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }

                      }


                      echo "<br>";
                      echo "RG <br>";

                      foreach( $documentosUsuario as $d )
                      {

                        if( $d->id_documento == '2' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "COMPROVANTE DE RESIDENCIA <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '3' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$data."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "CARTEIRA DE TRABALHO <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '4' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                        //echo "<br>";
                      }

                      echo "<br>";
                      echo "CURRICULUM LATTES <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '5' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span>&nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                        //echo "<br>";
                      }

                      echo "<br>";
                      echo "DIPLOMAS AUTENTICADOS <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '6' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "COMPROVANTE DE EXPERIENCIAS <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '7' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "COMPROVANTE DE CONGRESSOS, EVENTOS E PARTICIPAÇÕES <br>";

                      foreach( $documentosUsuario as $d )
                      {
                        if( $d->id_documento == '8' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                        //echo "<br>";
                      }

                      echo "<br>";
                      echo "COMPROVANTE DE PUBLICAÇÕES <br>";

                      foreach( $documentosUsuario as $d )
                      {

                        if( $d->id_documento == '9' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }
                    }

            ?>
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


<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
        <br>

        <font color=red><p><?=@$this->session->flashdata('msg');?></p></font>

        <!-- DADOS PESSOAIS -->
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h3 class='panel-title'>Documentos</h3>
            </div>

              <div class='panel-body'>

              <?php

              $atributos = array(
                                  'name'=>'formulario',
                                  'id'=>'formulario',
                                  'onSubmit'=>'return validaForm()'
                              );


              echo form_open_multipart('configuracao/documentoProfessor',$atributos);

              echo "<label>Selecione o professor</label>";
              echo "<select name='idProfessor' class='form-control'>";
              echo "<option value='0'>Selecione...</option>";
              echo "<option value='0'></option>";
              foreach ($usuarios as $usuario)
              {
                  echo "<option value='".$usuario->id."'>".$usuario->nome."</option>";
              }
              echo "</select>";

              echo "<br><br>";

             $atributosbtn = array(
                  "type" => "submit",
                  "name" => "btnPesquisar",
                  "value" => "Pesquisar",
                  "class" => "btn btn-primary"
                );
              echo form_input($atributosbtn);


              echo form_close();


              echo "<br><br>";



              if( !empty($documentos) )
              {
                      echo " <h5 class='alert alert-info'>CPF </h5>";

                      foreach( $documentos as $d )
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
                      echo "<h5 class='alert alert-info'>RG </h5>";

                      foreach( $documentos as $d )
                      {

                        if( $d->id_documento == '2' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".@$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "<h5 class='alert alert-info'>Comprovante de residência </h5>";

                      foreach( $documentos as $d )
                      {
                        if( $d->id_documento == '3' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".@$data."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "<h5 class='alert alert-info'>Carteira de Trabalho </h5>";

                      foreach( $documentos as $d )
                      {
                        if( $d->id_documento == '4' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".@$dataX."</em></li>";
                          echo "</ul>";
                        }
                        //echo "<br>";
                      }

                      echo "<br>";
                      echo "<h5 class='alert alert-info'>Curriculum Lattes </h5>";

                      foreach( $documentos as $d )
                      {
                        if( $d->id_documento == '5' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span>&nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".@$dataX."</em></li>";
                          echo "</ul>";
                        }
                        //echo "<br>";
                      }

                      echo "<br>";
                      echo "<h5 class='alert alert-info'>Diplomas Autenticados </h5>";

                      foreach( $documentos as $d )
                      {
                        if( $d->id_documento == '6' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".@$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "<h5 class='alert alert-info'>Comprovante de Experiências </h5>";

                      foreach( $documentos as $d )
                      {
                        if( $d->id_documento == '7' )
                        {
                          $dataExplode = explode('-',substr($d->data,0,10));
                          $dataX = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];
                          echo "<ul>";
                          echo "<li><span class='fa fa-file-o'></span> &nbsp;<a href='".base_url()."".$d->path."' target='_blank'>Ver anexo </a> &nbsp;&nbsp; <em> Data de envio: &nbsp;".@$dataX."</em></li>";
                          echo "</ul>";
                        }
                      }

                      echo "<br>";
                      echo "<h5 class='alert alert-info'>Comprovante de congressos, evventos e participações </h5>";

                      foreach( $documentos as $d )
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
                      echo "<h5 class='alert alert-info'>Comprovante de Publicações </h5>";

                      foreach( $documentos as $d )
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
              else
              {
                echo "<center><br><span class='label label-danger'>Nenhum documento encontrado para este professor!</span></center><br>";
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">

$(function(){      //inicializa jQuery
   $('.token-form').submit(function(){    //nome do form no evento submit identificado por class
      $.ajax({
         url: 'token/validaToken',
         type: 'POST',
         dataType: 'json',
         data: $('.token-form').serialize(),

         success: function( data ){              //Se o resultado for sucesso
            if(data =='1'){
                $("#resposta").attr('class', 'text-success');
                $('#resposta').html("<h5>Entrando no sistema...</h5>");
                $("#btn_enviar").attr('disabled', 'true');
                document.location.href='home2';

            }
            if(data=='2'){
                $('#resposta').html("<h5>Código incorreto</h5>");
            }
            if(data=='3'){
                $('#resposta').html("<h5>O PIN SMS expirou. Por favor faça login novamente</h5>");
            }
            

         },
         beforeSend: function(){       //Evento que será executado antes de enviar os dados com o ajax
            $("#btn_enviar").attr('value', 'Tentando..');   // Renomear butão enquanto estiver enviando
            

        },
        complete: function(msg){     //Evento que será executado após finalizar a solicitação ajax

            $("#btn_enviar").attr('value', 'Entrar');  //renomear botão
            
        }
      });
    return false; //não recarregar a página
   });
});
</script> 




<div class="container">
    <div class="row">

        <br><br>

        <center>
            <img src="<?php echo base_url();?>assets/imgs/logo-sisprint.png" width="10%" height="20%">
            <br><br>
             

       <dir id="resposta" class="text-danger"></dir>


            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Confirmação de Token</h2>
                        <br>
                        <p>Insira o código enviado para seu celular por SMS</p>
                    </div>

                    <div class="panel-body">
                        <form action="" class="token-form" method="post" >


                    <h5>O código expira em 2 minutos</h5>


                            <fieldset>
                                <label>Código de 6 dígitos</label>
                                <div class="form-group">
                                <input class="form-control" id="token" name="token" type="text" maxlength="6" minlength="6" autofocus required>
                                </div>
                                
                                
                                <input type="submit" id="btn_enviar" class="btn btn-primary btn-lg btn-block" value="Entrar">
                            </fieldset>
                        </form>
 </center>
                        <br>
                    
                    </div>

                </div>
            </div>


    </div>
</div>



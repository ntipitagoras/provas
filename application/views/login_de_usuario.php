<script type="text/javascript">

$(function(){      //inicializa jQuery
   $('.login_form').submit(function(){    //nome do form no evento submit identificado por class
      $.ajax({
         url: 'home/login',
         type: 'POST',
         dataType: 'json',
         data: $('.login_form').serialize(),

         success: function( data ){              //Se o resultado for sucesso
            if(data =='1'){
                $("#resposta").attr('class', 'text-success');
                $('#resposta').html("<h5>Entrando no sistema...</h5>");
                $("#btn_entrar").attr('disabled', 'true');
                document.location.href='token';

            }
            if(data=='2'){
                $('#resposta').html("<h5>Senha incorreta</h5>");
            }
            if(data=='3'){
                $('#resposta').html("<h5>CPF não encontrado</h5>");
            }

         },
         beforeSend: function(){       //Evento que será executado antes de enviar os dados com o ajax
            $("#btn_entrar").attr('value', 'Enviando..');   // Renomear butão enquanto estiver enviando
            

        },
        complete: function(msg){     //Evento que será executado após finalizar a solicitação ajax

            $("#btn_entrar").attr('value', 'Entrar');  //renomear botão
            
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
            <img src="<?php echo base_url();?>assets/imgs/logo-sisprint.png" width="15%" height="15%">
            <br><br>
                <p id="resposta" class="text-danger"></p>

        </center>


            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Acesso do usuário</h3>
                    </div>

                    <div class="panel-body">
                        <form action="" class="login_form" method="post" >
                            <fieldset>
                                <label>CPF</label>
                                <div class="form-group">
                                <input class="form-control" id="cpf" name="cpf" type="text" pattern="[0-9]{11}" maxlength="11" autofocus required>
                                </div>
                                <label>Senha</label>
                                <div class="form-group">
                                    <input class="form-control" name="senha" type="password" required>
                                </div>
                                <input type="submit" id="btn_entrar" class="btn btn-primary btn-lg btn-block" value="Entrar">
                            </fieldset>
                        </form>

                        <br>
                        <a href="<?php echo base_url();?>home/search_password"> Esqueceu sua senha ?</a>

                    </div>

                </div>
            </div>


    </div>
</div>

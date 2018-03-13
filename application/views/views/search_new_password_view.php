

<div class="container">

    <div class="row">
        <div class="col-md-12">
    <h5>Por questões de segurança, após a troca da senha você será redirecionado para fazer login novamente!</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <font color="red"> <?php echo (isset($msg) ? $msg : '') ?> </font>
                <div class="row">
                    <div class="col-md-4">

                      <form class="form-horizontal" name="formulario" id="formulario" onSubmit="return validaForm()" action="../configuracao/updateNewPassword" method="post">
                        <label>Informe a nova senha!</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Nova Senha">


                        <div class="row">
                            <div class="col-md-12">                        
                        <input type="hidden" name="acao" value="atualizar">

                        <br>
                            <button class="btn btn-primary btn-block" type="submit">Atualizar</button>
                        </div>
                        </div>
                    </form>
                        
                </div>
            </div> 
        </div>
    </div>        
</div>  <!-- /container -->

<script language="JavaScript">

    function validaForm()
    {
        d = document.formulario;

        if(d.password.value==false)
        {
            alert("Por favor, informe a senha.");
            d.password.focus();
            return false;
        }

        return true;
    }
</script>
   
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
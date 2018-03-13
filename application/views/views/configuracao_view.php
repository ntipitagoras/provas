

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <H4>Mudança de Senha</H4>
            </center>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

          <form class="form-signin" name="formulario" id="formulario" onSubmit="return validaForm()" action="../configuracao/novasenha" method="post">
            <h4 class="form-signin-heading">Informe a nova senha!</h4>
            <input type="password" id="password" name="password" class="form-control" placeholder="Senha">
            

            <h4>Por questões de segurança, após a troca da senha você será redirecionado para fazer login novamente!</h4>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Trocar</button>
          </form>

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
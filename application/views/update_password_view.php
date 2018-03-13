
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <img src="../assets/imgs/esqueci.png" width="20%" height="20%">
            </center>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

          <form class="form-signin" action="contato/enviaEmail" method="post">

            <?php if(isset($email_enviado)) { ?>
                <div id="mensagem_enviada"><font color="red"> <?php echo $email_enviado ?> </font></div>
            <?php } ?>

            <h4 class="form-signin-heading">Digite o <font color="red">CPF</font> que você utiliza para acessar o sistema.</h4>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="cpf" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
          </form>

        </div>
    </div> 
</div>  <!-- /container -->
   
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
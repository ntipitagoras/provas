
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <img src="assets/imgs/logo_sisprint.png" width="20%" height="20%">
            </center>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

          <form class="form-signin" action="home/login" method="post">

            <?php if(isset($msg)) { ?>
                <div id="mensagem_enviada">
                    <font color=red>
                        <h3><?php echo $msg; ?></h3>
                    </font>
                </div>
            <?php } ?>


            <h2 class="form-signin-heading">Login de Usuário</h2>
            <label>CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required autofocus>
            <label>Senha</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
            
            <div class="checkbox">              
                <a href="configuracao/searchPasswordEmail"> Esqueceu sua senha ? </a>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>


          </form>

          

        </div>
    </div> 
</div>  <!-- /container -->
   
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
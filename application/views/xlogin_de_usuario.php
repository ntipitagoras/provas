


<div class="container">
    <div class="row">

        <br><br>

        <center>
            <img src="<?php echo base_url();?>assets/imgs/security.png" width="20%" height="20%">
            <br><br>
                <p class="text-danger"><?=@$this->session->flashdata('msg');?></p>

        </center>


            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Acesso do usuário</h3>
                    </div>

                    <div class="panel-body">
                        <form action="<?php echo base_url(); ?>home/login" method="post" >
                            <fieldset>
                                <label>CPF</label>
                                <div class="form-group">
                                    <input class="form-control" id="cpf" name="cpf" type="text" autofocus required>
                                </div>
                                <label>Senha</label>
                                <div class="form-group">
                                    <input class="form-control" name="senha" type="password" required>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Entrar">
                            </fieldset>
                        </form>

                        <br>
                        <a href="<?php echo base_url();?>home/search_password"> Esqueceu sua senha ?</a>

                    </div>

                </div>
            </div>


    </div>
</div>



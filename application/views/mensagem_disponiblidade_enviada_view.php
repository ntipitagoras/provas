

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">

        <center>
        <br><br>
        <h1><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Parabéns</h1>
        <br><br>

        <p>Sua(s) disponbilidade foi enviada com sucesso!<br><br>

        Essa disponbilidade pode ser alterada até dia <?php echo date('d/m/Y H:m:s',strtotime($this->session->userdata('data_limite_disponibilidade'))); ?>.<br><br>

        </p>

        <h4><a href="<?php echo base_url(); ?>home2/index">Sair</a></h4>

        </center>

        </div>
    </div>
</div>




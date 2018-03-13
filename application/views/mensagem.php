
	<script type="text/javascript">
	/* Este codigo javascript redireciona a pagina para a home do site apos 3 segundos*/
	setTimeout(function(){
	  window.location.href = '<?php echo base_url('home2/logout')?>';
	},3000)
	</script>

<div class="container main">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1><i class="fa fa-check fa-lg pull-left"><?php echo (isset($msg) ? $msg : ''); ?></i></h1>			
		</div>
	</div>
</div>

<?php echo doctype('xhtml1-trans'); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<title></title>
		<?php

			$meta = array(
							array('name' => 'robots', 'content' => 'no-cache'),
							array('name' => 'description', 'content' => 'Sema Transdisciplinar'),
							array('name' => 'keywords', 'content' => 'Esceritório Escola'),
							array('name' => 'robots', 'content' => 'no-cache'),
							array('name' => 'Content-type', 'content' => 'text/html;charset=utf-8', 'type' => 'equiv')
						);
			echo meta($meta);

			echo link_tag('assets/css/bootstrap.min.css');
			echo link_tag('assets/css/bootstrap-theme.min.css');
			echo link_tag('assets/css/template.css');
			echo link_tag('assets/js/bootstrap.min.js');
		?>

	</head>
<body>


<div class="container">
  <div class="row">
      <div class="col-md-6">
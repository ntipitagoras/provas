<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title></title>

		<?php

			$meta = array(
							array('name' => 'robots', 'content' => 'no-cache'),
							array('name' => 'description', 'content' => 'PROVAS - Sistemas de Impressao Pitagoras'),
							array('name' => 'keywords', 'content' => 'PROVAS -Sistemas de Impressao Pitagoras'),
							array('name' => 'robots', 'content' => 'no-cache'),
							array('name' => 'Content-type', 'content' => 'text/html;charset=utf-8', 'type' => 'equiv')
						);
			echo meta($meta);

		?>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

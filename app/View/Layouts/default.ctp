<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Club de Danza
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css(array(
		'//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css',
		'//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css',
		'layouts/default'
	));
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
		
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		
</head>
<body>
	<div id="container">
		<header>

		</header>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		<footer>
		</footer>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
	
	<?php
	echo $this->Html->script(array(
		'//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
		'//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js'
	));
	echo $this->fetch('script');
	?>
	
</body>
</html>

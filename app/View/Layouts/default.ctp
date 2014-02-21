<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title> Club de Danza </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'
			, 'vendors/bootstrap.min'
			, 'layouts/default'
		));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<?php 
			$user = AuthComponent::user();
			if($user['Rol']['weight'] >= User::ADMIN):
				echo $this -> element('navbar_admin');
			else:
				echo $this -> element('navbar');
			endif;
			?>

		</header>

		<div id="container" class="container">
			<div class="row">
				
				<!-- Contenido -->
				<section id="content" class="col-sm-9">
					<?php //debug(AuthComponent::user()); ?>

					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</section>
				

				<!-- Barra lateral -->
				<aside class="col-sm-3">
					
					<!-- Login -->
					<div class="row row-login">
						<div class="col-sm-12 text-center">
							<?php if(AuthComponent::user('id')): ?>
								<?php
								echo $this -> Html -> link(AuthComponent::user('name')
									, '/perfil/' . AuthComponent::user('id')
									, array('class' => "btn btn-xs")
								);
								?>
								|
								<a href="/logout" class="btn btn-xs">Salir</a>
							<?php else: ?>
								<a href="/login" class="btn btn-xs">Login</a>
								|
								<a href="/registro" class="btn btn-xs">Registro</a>
							<?php endif; ?>
						</div>
					</div>

					<!-- Redes Sociales -->
					<div class="row row-redes-sociales">
						<div class="col-sm-12 text-center">
							<a href="#" class="btn btn-xs">
								<i class="fa fa-facebook-square"></i>
							</a>
							|
							<a href="#" class="btn btn-xs">
								<i class="fa fa-twitter-square"></i>
							</a>
						</div>
					</div>

					<div class="row row-banner">
						<div class="col-sm-12">
							<img src="http://lorempixel.com/400/200/fashion/4" alt="" class="image-center img-responsive">
						</div>
					</div>
					<div class="row row-banner">
						<div class="col-sm-12">
							<img src="http://lorempixel.com/200/300/technics/9" alt="" class="image-center img-responsive banner-large">
						</div>
					</div>
					<div class="row row-banner">
						<div class="col-sm-12">
							<img src="http://lorempixel.com/400/200/food/8" alt="" class="image-center img-responsive">
						</div>
					</div>
					<div class="row row-banner">
						<div class="col-sm-12">
							<img src="http://lorempixel.com/400/200/nightlife/5" alt="" class="image-center img-responsive">
						</div>
					</div>

				</aside>
			</div>
		</div>

		<footer>
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="col-sm-5">
						<a href="#">Sobre Club de Danza</a>
						·
						<a href="#">Términos y condiciones</a>
						·
						<a href="#">Contacto</a>
					</div>
					<div class="col-sm-7 text-right">
						Club de Danza - Copyright &copy; 2014 - Todos los derechos reservados
						<?php echo $this->Html->image('layouts/logofooter.png'); ?>
					</div>
				</div>
			</nav>
		</footer>
			

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
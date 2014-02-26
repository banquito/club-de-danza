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
			, 'vendors/bootstrap-datetimepicker.min'
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
	<body data-ng-app="App">
		<header>
			<?php 
			$user = AuthComponent::user();
			if(isset($user['Rol']) && $user['Rol']['weight'] >= User::ADMIN):
				echo $this -> element('navbar_admin');
			else:
				echo $this -> element('navbar');
			endif;
			?>

		</header>
		
		<?php echo $this->Session->flash('flash', array('element' => 'failure')); ?>

		<div id="container" class="container">
			<div class="row">
				
				<!-- Contenido -->
				<section id="content" class="col-sm-9">
					<?php echo $this->fetch('content'); ?>
				</section>
				

				<!-- Barra lateral -->
				<aside class="col-sm-3">
					
					<!-- Login Buttons -->
					<div class="row row-login">
						<div class="col-sm-5 col-login text-center">
							<?php if(AuthComponent::user('id')): ?>
								<?php
								echo $this -> Html -> link(AuthComponent::user('name')
									, '/perfil/' . AuthComponent::user('id')
									, array('class' => "btn btn-xs")
								);
								?>
							<?php else: ?>
								<a href="#" class="btn btn-xs" data-toggle="modal" data-target="#modalLogin">
									<?php echo __('Login') ?>
								</a>
							<?php endif; ?>
						</div>
						<div class="col-sm-5 col-sm-offset-2 col-login text-center">
							<?php if(AuthComponent::user('id')): ?>
								<a href="/logout" class="btn btn-xs">Salir</a>
							<?php else: ?>
								<a href="#" class="btn btn-xs" data-toggle="modal" data-target="#modalRegister">
									<?php echo __('Register') ?>
								</a>
							<?php endif; ?>
						</div>
					</div>

					<!-- Banners -->
					<?php echo $this -> element('banners'); ?>

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
			
		<!-- Modal Login & Modal Register -->
		<?php 
		echo $this->element('modal_login'); 
		echo $this->element('modal_register'); 
		?>

		<!-- Scripts -->
		<?php echo $this->element('sql_dump'); ?>
		<?php
		echo $this->Html->script(array('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'
			, '//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js'
			, 'vendors/moment.min'
			, 'vendors/bootstrap-datetimepicker'
			, 'vendors/locales/bootstrap-datetimepicker.es'
			, 'layouts/default'
			, 'https://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js'
			, 'angular/app'
			, 'angular/controllers/users_controller'
		));
		echo $this->fetch('script');
		?>
	</body>
</html>
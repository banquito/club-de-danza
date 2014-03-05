<?php 
$notesActive = '';
if((strpos($this->params->url, 'notes') !== FALSE) || (strpos($this->params->url, 'notas') !== FALSE))
	$notesActive = 'active';
?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">
			<?php echo $this->Html->image('layouts/clubdedanza.png'); ?>
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<li class="dropdown <?php echo $notesActive; ?>">
					<a href="/notas" class="dropdown-toggle menu-button" data-toggle="dropdown">
						Notas <b class="caret"></b>
					</a>

					<ul class="dropdown-menu">
						<li><a href="/notas">Notas</a></li>
						<li class="divider"></li>
						<li><a href="/notas/nueva">Nueva Nota</a></li>
						<li><a href="/notas/listar">Listar Notas</a></li>
					</ul>
				</li>
				<li>
					<a href="/audiciones" class="menu-button">Audiciones y Convocatorias</a>
				</li>
				<li>
					<a href="#" class="menu-button">Clasificados</a>
				</li>
				<li>
					<a href="#" class="menu-button">Cursos y Talleres</a>
				</li>
				<li>
					<a href="#" class="menu-button">Cartelera</a>
				</li>
				<li>
					<a href="#" class="menu-button">Mapa de la Danza</a>
				</li>
				<li>
					<a href="/proximamente" class="menu-button">Artistas</a>
				</li>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a href="/notas" class="dropdown-toggle menu-button" data-toggle="dropdown">
						<i class="fa fa-th fa-lg"></i>
					</a>

					<ul class="dropdown-menu pull-right">
						<li><a href="/sliders"><?php echo __('List Slider'); ?></a></li>
						<li><a href="/sliders/nuevo"><?php echo __('Add Slider'); ?></a></li>
						<li class="divider"></li>
						<li><a href="/banners"><?php echo __('List Banners'); ?></a></li>
						<li><a href="/banners/nuevo"><?php echo __('Add Banners'); ?></a></li>
						<li class="divider"></li>
						<li><a href="/usuarios/listar">Listar Usuarios</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
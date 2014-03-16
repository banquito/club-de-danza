<?php 
$notesActive = $callsActive = '';
if((strpos($this->params->url, 'notes') !== FALSE) || (strpos($this->params->url, 'notas') !== FALSE))
	$notesActive = 'active';
if((strpos($this->params->url, 'calls') !== FALSE) 
	|| (strpos($this->params->url, 'convocatorias') !== FALSE)
	|| (strpos($this->params->url, 'auditions') !== FALSE) 
	|| (strpos($this->params->url, 'audiciones') !== FALSE))
		$callsActive = 'active';

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
				<li class="dropdown <?php echo $callsActive; ?>">
					<a href="#" class="dropdown-toggle menu-button" data-toggle="dropdown">
						Audiciones y Convocatorias <b class="caret"></b>
					</a>

					<ul class="dropdown-menu">
						<li><a href="/audiciones">Buscar Audiciones y Convocatorias</a></li>
						<li class="divider"></li>
						<li><a href="/audiciones/nueva">Nueva Audición</a></li>
						<li><a href="/audiciones/listar">Listar Audiciones</a></li>
						<li class="divider"></li>
						<li><a href="/convocatorias/nueva">Nueva Convocatoria</a></li>
						<li><a href="/convocatorias/listar">Listar Convocatorias</a></li>
						<li class="divider"></li>
						<li><a href="/castings/nuevo">Nuevo Casting</a></li>
						<li><a href="/castings/listar">Listar Castings</a></li>
						<li class="divider"></li>
						<li><a href="/busquedaslaborales/nueva">Nueva Búsqueda Laboral</a></li>
						<li><a href="/busquedaslaborales/listar">Listar Búsquedas Laborales</a></li>
					</ul>
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
				<!-- <li>
					<a href="#" class="menu-button">Mapa de la Danza</a>
				</li> -->
				<li class="dropdown <?php echo $callsActive; ?>">
					<a href="#" class="dropdown-toggle menu-button" data-toggle="dropdown">
						Mapa de la Danza <b class="caret"></b>
					</a>

					<ul class="dropdown-menu">
						<li><a href="/mapadeladanza">Buscar</a></li>
						<li class="divider"></li>
						<li><a href="/accesorios/nuevo">Nuevo Accesorio</a></li>
						<li><a href="/accesorios/listar">Listar Accesorios</a></li>
						<li class="divider"></li>
						<li><a href="/estudios/nuevo">Nuevo Estudio</a></li>
						<li><a href="/estudios/listar">Listar Estudios</a></li>
						<li class="divider"></li>
						<li><a href="/salasdeensayo/nueva">Nueva Sala de Ensayo</a></li>
						<li><a href="/salasdeensayo/listar">Listar Salas de Ensayo</a></li>
					</ul>
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
						<li><a href="/home/admin">Home Admin</a></li>
						<li class="divider"></li>
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
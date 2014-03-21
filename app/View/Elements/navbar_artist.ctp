<?php 
$notesActive = $callsActive = $mapsActive = '';
if((strpos($this->params->url, 'notes') !== FALSE) || (strpos($this->params->url, 'notas') !== FALSE))
	$notesActive = 'active';
if((strpos($this->params->url, 'calls') !== FALSE) 
	|| (strpos($this->params->url, 'convocatorias') !== FALSE)
	|| (strpos($this->params->url, 'auditions') !== FALSE) 
	|| (strpos($this->params->url, 'audiciones') !== FALSE)
	|| (strpos($this->params->url, 'castings') !== FALSE) 
	|| (strpos($this->params->url, 'jobs') !== FALSE)
	|| (strpos($this->params->url, 'busquedaslaborales') !== FALSE))
		$callsActive = 'active';
if((strpos($this->params->url, 'accesorios') !== FALSE) 
	|| (strpos($this->params->url, 'mapadeladanza') !== FALSE)
	|| (strpos($this->params->url, 'accessories') !== FALSE)
	|| (strpos($this->params->url, 'estudios') !== FALSE) 
	|| (strpos($this->params->url, 'estudies') !== FALSE) 
	|| (strpos($this->params->url, 'salasdeensayo') !== FALSE)
	|| (strpos($this->params->url, 'practicerooms') !== FALSE))
		$mapsActive = 'active';

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
				<li<?php echo (strpos($this->params->url, 'notes') !== FALSE) || (strpos($this->params->url, 'notas') !== FALSE) ? ' class="active"' : ''?>>
					<a href="/notas" class="menu-button">Notas</a>
				</li>
				<li class="dropdown <?php echo $callsActive; ?>">
					<a href="#" class="dropdown-toggle menu-button" data-toggle="dropdown">
						Audiciones y Convocatorias
					</a>

					<ul class="dropdown-menu">
						<li><a href="/audiciones">Buscar Audiciones y Convocatorias</a></li>
						<li class="divider"></li>
						<li><a href="/audiciones/nueva">Nueva Audición</a></li>
						<li><a href="/audiciones/listar">Listar Mis Audiciones</a></li>
						<li class="divider"></li>
						<li><a href="/convocatorias/nueva">Nueva Convocatoria</a></li>
						<li><a href="/convocatorias/listar">Listar Mis Convocatorias</a></li>
						<li class="divider"></li>
						<li><a href="/castings/nuevo">Nuevo Casting</a></li>
						<li><a href="/castings/listar">Listar Mis Castings</a></li>
						<li class="divider"></li>
						<li><a href="/busquedaslaborales/nueva">Nueva Búsqueda Laboral</a></li>
						<li><a href="/busquedaslaborales/listar">Listar Mis Búsquedas Laborales</a></li>
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
				<li class="dropdown <?php echo $mapsActive; ?>">
					<a href="#" class="dropdown-toggle menu-button" data-toggle="dropdown">
						Mapa de la Danza <b class="caret"></b>
					</a>

					<ul class="dropdown-menu">
						<li><a href="/mapadeladanza">Buscar</a></li>
						<li class="divider"></li>
						<li><a href="/accesorios/nuevo">Nuevo Accesorio</a></li>
						<li><a href="/accesorios/listar">Listar Mis Accesorios</a></li>
						<li class="divider"></li>
						<li><a href="/estudios/nuevo">Nuevo Estudio</a></li>
						<li><a href="/estudios/listar">Listar Mis Estudios</a></li>
						<li class="divider"></li>
						<li><a href="/salasdeensayo/nueva">Nueva Sala de Ensayo</a></li>
						<li><a href="/salasdeensayo/listar">Listar Mis Salas de Ensayo</a></li>
					</ul>
				</li>
				<li>
					<a href="/proximamente" class="menu-button">Artistas</a>
				</li>
			</ul>

			<!-- Redes Sociales -->
			<ul class="nav navbar-nav pull-right redes-sociales">
				<li>
					<a href="#" class="btn">
					<i class="fa fa-envelope"></i>
					</a>
				</li>
				<li>
					<a href="#" class="btn stack twitter">
						<span class="fa-stack">
							<i class="fa fa-stack-2x fa-circle"></i>
							<i class="fa fa-stack-1x fa-twitter fa-inverse"></i>
						</span>
					</a>
				</li>
				<li>
					<a href="#" class="btn stack facebook">
						<span class="fa-stack">
							<i class="fa fa-stack-2x fa-circle"></i>
							<i class="fa fa-stack-1x fa-facebook fa-inverse"></i>
						</span>
					</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
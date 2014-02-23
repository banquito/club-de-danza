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
				<li>
					<a href="#" class="menu-button">Audiciones y Convocatorias</a>
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

			<!-- Redes Sociales -->
			<ul class="nav navbar-nav pull-right redes-sociales">
				<li>
					<a href="#" class="btn">
					<i class="fa fa-envelope"></i>
					</a>
				</li>
				<li>
					<a href="#" class="btn">
					<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a href="#" class="btn">
					<i class="fa fa-twitter-square"></i>
					</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
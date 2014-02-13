<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title> Club de Danza </title>
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
            <header>
                <nav class="navbar navbar-default" role="navigation">
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
                                <li class="active">
                                    <a href="/notes" class="menu-button">Notas</a>
                                </li>
                                <li>
                                    <a href="#" class="menu-button">Audiciones</a>
                                </li>
                                <li>
                                    <a href="#" class="menu-button">Convocatorias</a>
                                </li>
                                <li>
                                    <a href="#" class="menu-button">Casting</a>
                                </li>
                                <li>
                                    <a href="#" class="menu-button">Clasificados</a>
                                </li>
                                <li>
                                    <a href="#" class="menu-button">Mapa de la Danza</a>
                                </li>
                                <li>
                                    <a href="#" class="menu-button">Artistas</a>
                                </li>
                            </ul>
                            </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </header>
        <div class="container">
                    <section id="content" class="col-lg-9">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </section>
                    <aside class="col-lg-3">
                        <div class="row row-banner">
                            <div class="col-lg-12">
                                <img src="http://lorempixel.com/400/200?d=<?php echo time(); ?>" alt="" class="image-center img-responsive">
                            </div>
                        </div>
                        <div class="row row-banner">
                            <div class="col-lg-12">
                                <img src="http://lorempixel.com/200/800/" alt="" class="image-center img-responsive">
                            </div>
                        </div>
                        <div class="row row-banner">
                            <div class="col-lg-12">
                                <img src="http://lorempixel.com/400/200?d=<?php echo time(); ?>" alt="" class="image-center img-responsive">
                            </div>
                        </div>
                        <div class="row row-banner">
                            <div class="col-lg-12">
                                <img src="http://lorempixel.com/400/200?d=<?php echo time(); ?>" alt="" class="image-center img-responsive">
                            </div>
                        </div>

                    </aside>
            </div>
            <footer>
				<nav class="navbar navbar-default" role="navigation">
                    <div class="container">
		            	<div class="col-lg-6">
		            		<a href="#">Sobre Club de Danza</a>
		            		·
		            		<a href="#">Términos y condiciones</a>
		            		·
		            		<a href="#">Contacto</a>
		            	</div>
		            	<div class="col-lg-6">
		            		Club de Danza - Copyright &copy; 2013 - Todos los derechos reservados
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
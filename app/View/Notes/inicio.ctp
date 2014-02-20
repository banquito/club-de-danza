<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>


<!-- Carrusel -->
<div id="slider-home" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#slider-home" data-slide-to="0" class="active"></li>
		<li data-target="#slider-home" data-slide-to="1"></li>
		<li data-target="#slider-home" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<?php echo $this->Html->image('slider/01.jpg', array('class' => 'image-center')); ?>
			<div class="carousel-caption ">
                <h3>TÍTULO</h3>
            </div>
		</div>
		<div class="item">
			<?php echo $this->Html->image('slider/01.jpg', array('class' => 'image-center')); ?>
			<div class="carousel-caption ">
                <h3>TÍTULO</h3>
            </div>
		</div>
		<div class="item">
			<?php echo $this->Html->image('slider/01.jpg', array('class' => 'image-center')); ?>
			<div class="carousel-caption ">
                <h3>TÍTULO</h3>
            </div>
		</div>
	</div>
	<!-- Controls -->
	<a class="left carousel-control" href="#slider-home" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
	<a class="right carousel-control" href="#slider-home" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>

<!-- Título -->
<!-- <div class="row">
	<div class="col-sm-4">
		<div id="container1-h1">
			<h1>Notas</h1>
		</div>
	</div>
</div> -->

<!-- Título -->
<!-- <div id="rectangle" style="height: 43px; width: 212px;">
	<h1 style="border-top-width: 33px; margin-top: 8px;">Hola</h1></div>
	<style> #rectangle {width:10; height:100px; background:red;} </style>

	<div id="triangle-topleft" style="width: 212px; border-top-width: 10px; border-right-width: 10px;"></div>
	<style> #triangle-topleft {width:10; height:10; border-top:100px solid red; border-right:100px solid transparent;border-top: 100px solid red;} </style>
</div> -->

<div class="row row-header-h1">
	<div class="col-sm-4">
			<h1>Notas</h1>
			<div></div>
	</div>
</div>

<!-- Notas -->
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/fashion/6" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 1</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/fashion/10" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 2</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/fashion/2" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 3</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/fashion/1" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center" id="text-nota4"><strong>Nota 4</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/fashion/9" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center" id="text-nota4"><strong>Nota 5</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/fashion/8" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 6</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/people/1" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 7</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/people/6" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 8</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<div class="thumbnail">
			<img src="http://lorempixel.com/400/200/people/9" alt="imagen-nota">
			<div class="caption caption-vermas">
				<p class="text-center"><strong>Nota 9</strong></p>
				<a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
			</div>
		</div>
	</div>
</div>

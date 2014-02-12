<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>

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
		</div>
		<div class="item">
			<?php echo $this->Html->image('slider/01.jpg', array('class' => 'image-center')); ?>
		</div>
		<div class="item">
			<?php echo $this->Html->image('slider/01.jpg', array('class' => 'image-center')); ?>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#slider-home" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
	<a class="right carousel-control" href="#slider-home" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>

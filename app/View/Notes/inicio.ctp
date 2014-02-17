<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>

<h1>Notas</h1>

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

<!-- Notas -->
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 1</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 2</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 3</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <div class="thumbnail thumbnail-horizontal">
            <img src="http://lorempixel.com/400/200/" alt="" class="pull-left">
            <div class="caption">
                <h3>Nota 4</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 5</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 1</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 2</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/" alt="">
            <div class="caption">
                <h3>Nota 3</h3>
                <p class="text-right">
                <a href="#" class="btn"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
                </p>
            </div>
        </div>
    </div>
</div>

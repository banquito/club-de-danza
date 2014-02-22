<?php echo $this->Html->css('notes/inicio', array('inline' => false)); ?>

<!-- Slider & Carrusel -->
<div id="slider-home" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach ($items as $key => $item): ?>
            <li data-target="#slider-home" data-slide-to="<?php echo $key; ?>" class="<?php echo ($key == 0) ? 'active' : ''; ?>"></li>
        <?php endforeach; ?>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php foreach ($items as $key => $item): ?>
            <div class="item<?php echo ($key == 0) ? ' active' : ''; ?>">
                <?php echo $this->Html->image('sliders/' . $item['Slider']['image'], array('class' => 'image-center')); ?>
                <div class="carousel-caption ">
                    <h3><a href="#"><?php echo $item['Slider']['title']; ?></a></h3>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#slider-home" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
    <a class="right carousel-control" href="#slider-home" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>

<!-- Secciones -->
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
    <div class="col-xs-8 col-sm-8 col-md-8 col-sm-8">
        <div class="thumbnail thumbnail-horizontal">
            <div class="img-horizontal text-center">
                <img src="http://lorempixel.com/400/200/fashion/9" alt="imagen-nota">
            </div>
            <div class="caption caption-vermas">
                <p class="text-center" id="text-nota4"><strong>Nota 4</strong></p>
                <a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/fashion/8" alt="imagen-nota">
            <div class="caption caption-vermas">
                <p class="text-center"><strong>Nota 5</strong></p>
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
                <p class="text-center"><strong>Nota 6</strong></p>
                <a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/people/6" alt="imagen-nota">
            <div class="caption caption-vermas">
                <p class="text-center"><strong>Nota 7</strong></p>
                <a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <div class="thumbnail">
            <img src="http://lorempixel.com/400/200/people/9" alt="imagen-nota">
            <div class="caption caption-vermas">
                <p class="text-center"><strong>Nota 8</strong></p>
                <a href="#" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a>
            </div>
        </div>
    </div>
</div>

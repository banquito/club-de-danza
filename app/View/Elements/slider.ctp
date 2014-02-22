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
                <div class="carousel-caption">
                    <h3><a href="#"><?php echo $item['Slider']['title']; ?></a></h3>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#slider-home" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
    <a class="right carousel-control" href="#slider-home" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>
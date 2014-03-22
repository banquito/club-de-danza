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
                <?php $sliderLink = (isset($item['Slidernote']['link']) && $item['Slidernote']['link'] != '') ? $item['Slidernote']['link'] : '#'; ?>
                <a href="<?php echo $sliderLink; ?>">
                    <?php echo $this->Html->image('sliders/' . $item['Slidernote']['image'], array('class' => 'image-center')); ?>
                </a>
                <div class="carousel-caption">
                    <h3>
                        <a href="<?php echo $sliderLink; ?>"><?php echo $item['Slidernote']['title']; ?></a>
                    </h3>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#slider-home" data-slide="prev">
        <span class="fa fa-angle-left fa-2x"></span>
    </a>
    <a class="right carousel-control" href="#slider-home" data-slide="next">
        <span class="fa fa-angle-right fa-2x"></span>
    </a>
</div>
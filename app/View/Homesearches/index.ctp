<?php //debug($homesearches, $showHtml = null, $showFrom = true) ?>
<?php echo $this->Html->css('notes/inicio', array('inline' => false)); ?>

<!-- Slider & Carrusel -->
<?php echo $this -> element('slider'); ?>

<!-- <div class="row">
    <div class="col-sm-12"> -->
        
        <!-- Secciones -->
<!--         <?php
        foreach($homesearches as $key => $homesearch):
            if ($key != 0 && $key % 3 == 0) echo '</div>';
            if ($key % 3 == 0) echo '<div class="row">';
        ?>
            <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
                <a href="/notas/ver/<?php echo $homesearch['Homesearch']['id']; ?>">
                    <a href="/notas/ver/<?php echo $homesearch['Homesearch']['id']; ?>">
                        <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                            <div class="img-vertical text-center">
                                <?php $image = IMAGES_URL . ($homesearch['Homesearch']['image'] ? 'notes/'.$homesearch['Homesearch']['image'] : 'layouts/sinfoto.jpg'); ?>
                                <img alt="imagen-nota" src="<?php echo $image; ?>" />
                            </div>
                            <div class="caption caption-vermas">
                                <p class="title-vermas">
                                    <?php echo ($title = $homesearch['Homesearch']['title']) ? substr($title, 0, 50) : __('No Title'); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div> -->


<!-- Secciones -->
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[0]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[0]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[0]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[1]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[1]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[1]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[2]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[2]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[2]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-sm-8">
        <div class="thumbnail thumbnail-vermas thumbnail-vermas-horizontal thumbnail-horizontal">
            <div class="img-horizontal text-center">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[3]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
            </div>
            <div class="caption caption-vermas">
                <p class="text-center" id="text-nota4"><strong><?php echo $homesearches[3]['Homesearch']['title'] ?></strong></p>
                <!-- <a href="<?php echo $homesearches[3]['Homesearch']['url'] ?>" class="btn-vermas"><?php echo $this->Html->image('layouts/vermas.png'); ?></a> -->
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[4]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[4]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[4]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[5]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[5]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[5]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[6]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[6]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[6]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
        <a href="<?php echo $homesearches[7]['Homesearch']['url'] ?>">
            <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                <div class="img-vertical text-center">    
                    <?php echo $this->Html->image($homesearches[7]['Homesearch']['image'], array('alt'=>'imagen-nota')) ?>
                </div>
                <div class="caption caption-vermas">
                    <p class="text-center"><strong><?php echo $homesearches[7]['Homesearch']['title'] ?></strong></p>
                </div>
            </div>
        </a>
    </div>
</div>
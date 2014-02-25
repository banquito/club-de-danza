<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo h($slider['Slider']['title']); ?></h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo $this -> Time -> format('d-m-Y', h($slider['Slider']['created'])); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo h($slider['Slider']['link']); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php $image = '/' . IMAGES_URL . ($slider['Slider']['image'] ? 'sliders/'.$slider['Slider']['image'] : 'layouts/sinfoto.jpg'); ?>
		<img alt="imagen-nota" class="img-responsive" src="<?php echo $image; ?>" />
	</div>
</div>

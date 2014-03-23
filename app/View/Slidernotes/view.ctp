<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo h($slidernote['Slidernote']['title']); ?></h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo $this -> Time -> format('d-m-Y', h($slidernote['Slidernote']['created'])); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo h($slidernote['Slidernote']['link']); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php $image = '/' . IMAGES_URL . ($slidernote['Slidernote']['image'] ? 'slidernotes/'.$slidernote['Slidernote']['image'] : 'layouts/sinfoto.jpg'); ?>
		<img alt="imagen-nota" class="img-responsive" src="<?php echo $image; ?>" />
	</div>
</div>

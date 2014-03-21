<?php $this->Html->css('notes/view', '', array('inline'=>FALSE)); ?>

<?php // Sidebar
	$this->start('sidebar');
	echo $this->element('related_notes',array("id" => $note['Note']['id']));
	$this->end();
?>

<div class="row">
	<div class="col-sm-12">
		<p class="notes-description"><?php echo h($note['Note']['description']); ?></p>
	</div>
</div>
<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo h($note['Note']['title']); ?></h1>
	</div>
</div>
<!--<div class="row">
	<div class="col-sm-8 notes-resume">
		<p><?php echo $note['Note']['resume']; ?></p>
	</div>
	<div class="col-sm-4">
		<?php $image = '/' . IMAGES_URL . ($note['Note']['image'] ? 'notes/'.$note['Note']['image'] : 'layouts/sinfoto.jpg'); ?>
		<img alt="imagen-nota" class="img-responsive" src="<?php echo $image; ?>" />
	</div>
</div>-->
<div class="row">
	<div class="col-sm-12 notes-resume">
		<p><?php echo $note['Note']['resume']; ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-10">
		<?php $image = '/' . IMAGES_URL . ($note['Note']['image'] ? 'notes/'.$note['Note']['image'] : 'layouts/sinfoto.jpg'); ?>
		<img alt="imagen-nota" class="img-responsive img-nota" src="<?php echo $image; ?>" />
	</div>
</div>
<div class="row">
	<div class="col-sm-12 notes-body">
		<p><?php echo $note['Note']['body']; ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 notes-body">
		<p><strong>Tags:</strong> <?php echo $note['Note']['tags']; ?></p>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 notes-body">
		<div class="fb-comments" data-href="<?php echo Router::url( $this->here, true ); ?>" data-width="698px" data-numposts="5" data-colorscheme="light"></div>
	</div>
</div>
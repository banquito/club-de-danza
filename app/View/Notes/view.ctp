<?php 
//echo $this->Html->css('notes/add', '', array('inline'=>FALSE));
// debug(IMAGES_URL);
// debug(WWW_ROOT);
// debug(WWW_ROOT . IMAGES_URL . 'notes/');
?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo h($note['Note']['title']); ?></h1>
		<div></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo h($note['Note']['description']); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-8">
		<p><?php echo h($note['Note']['resume']); ?></p>
	</div>
	<div class="col-sm-4">
		<?php $image = '/' . IMAGES_URL . ($note['Note']['image'] ? 'notes/'.$note['Note']['image'] : 'layouts/sinfoto.jpg'); ?>
		<img alt="imagen-nota" class="img-responsive" src="<?php echo $image; ?>" />
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo h($note['Note']['body']); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo nl2br($note['Note']['description']); ?></p>
	</div>
</div>

<!-- <div class="notes view">
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($note['Note']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($note['Note']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($note['Note']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($note['Note']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($note['Note']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($note['Note']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($note['User']['name'], array('controller' => 'users', 'action' => 'view', $note['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div> -->

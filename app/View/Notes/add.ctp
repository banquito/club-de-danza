<?php 
//echo $this->Html->css('notes/add', '', array('inline'=>FALSE));
// debug(IMAGES_URL);
// debug(WWW_ROOT);
// debug(WWW_ROOT . IMAGES_URL . 'notes/');
echo $this->Html->script(array('ncEditor', 'vendors/nicEdit'), array('inline'=>false));
?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Add Note'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Note', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<div class="form-group">
				<label for="title" class="col-sm-4 control-label"><?php echo __('Title'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('title', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Note title (max.: 50 characters)'),
						'required' => 'required',
						'maxlength' => 50,
						'type' => 'text'
					));
			 		?>
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-4 control-label"><?php echo __('Short Description'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('description', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Description'),
						'required' => 'required',
						'type' => 'text'
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Image'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('image', array(
						'class' => 'btn btn-default col-sm-12',
						'label' => false,
						'placeholder' => __('Image'),
						'required' => 'required',
						'type' => 'file'
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Resume'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('resume', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Resume'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Body'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('body', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Body'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-2">
					<button type="submit" class="btn btn-default"><?php echo __('Aceptar'); ?></button>
				</div>
				<div class="col-sm-offset-4 col-sm-2">
					<a href="/notas/listar" class="btn btn-default"><?php echo __('Cancelar'); ?></a>
				</div>
			</div>
		<?php echo $this->Form->end() ?>
	</div>
</div>
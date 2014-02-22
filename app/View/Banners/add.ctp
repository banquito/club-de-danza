<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Add Banner'); ?></h1>
		<div></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Banner', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Link'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('link', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Link'),
						'required' => 'required',
						'type' => 'text'
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Published'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('published', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Published'),
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Banner Category'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('Bannercategory', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Banner Category'),
						'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-2">
					<button type="submit" class="btn btn-default"><?php echo __('Aceptar'); ?></button>
				</div>
			</div>
		<?php echo $this->Form->end() ?>
	</div>
</div>
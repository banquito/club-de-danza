<?php 
echo $this->Html->css('sliders/edit', '', array('inline'=>FALSE));
?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Edit Slider'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Slider', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<?php echo $this->Form->input('id'); ?>
			<div class="form-group">
				<label for="title" class="col-sm-4 control-label"><?php echo __('Title'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('title', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Slider title (max.: 50 characters)'),
						'required' => 'required',
						'maxlength' => 50,
						'type' => 'text'
					));
			 		?>
				</div>
			</div>
			
			<!-- Imagen -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Image'); ?></label>
				<div class="col-sm-8">
					<div class="row row-image-name">
						<div class="col-sm-12">
							<span class="label <?php echo ($this->request->data['Slider']['image']) ? 'label-primary' : 'label-danger'; ?>">
								<?php echo ($imageName = $this->request->data['Slider']['image']) ? $imageName : __('No image'); ?>
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<?php echo $this->Form->input('image', array(
								'label' => false,
								'placeholder' => __('Image'),
								'type' => 'file'
							));
							?>
						</div>
					</div>
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
				<div class="col-sm-offset-4 col-sm-2">
					<button type="submit" class="btn btn-default"><?php echo __('Aceptar'); ?></button>
				</div>
				<div class="col-sm-offset-4 col-sm-2">
					<a href="/sliders" class="btn btn-default"><?php echo __('Cancelar'); ?></a>
				</div>
			</div>
		<?php echo $this->Form->end() ?>
	</div>
</div>
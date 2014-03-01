<?php 
echo $this->Html->css('users/login', '', array('inline'=>FALSE));
?>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form')) ?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label"><?php echo __('Email'); ?></label>
				<div class="col-sm-4">
					<?php	echo $this->Form->input('email', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Email'),
						'required' => 'required',
						'type' => 'text'
					));
			 		?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label"><?php echo __('Password'); ?></label>
				<div class="col-sm-4">
					<?php echo $this->Form->input('password', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Password'),
						'required' => 'required',
						'type' => 'password'
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-2">
					<button type="submit" class="btn btn-default"><?php echo __('Accept'); ?></button>
				</div>
			</div>
		<?php echo $this->Form->end() ?>
	</div>
</div>
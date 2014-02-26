<?php 
echo $this->Html->css(array('users/add'), '', array('inline'=>FALSE));
echo $this->Html->script(array('users/add'), array('inline'=>FALSE));
?>

<div data-ng-controller="UsersController">
	<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'data-ng-submit' => 'submit($event)', 'name'=>'registerForm')); ?>
	<!-- <form class="form-horizontal" data-ng-submit="submit()" id="UserAddForm" accept-charset="utf-8"> -->
		<fieldset>
			<legend><?php echo __('Add User'); ?></legend>
		
			<div class="form-group">
				<label for="username" class="col-sm-3 control-label"><?php echo __('Username'); ?></label>
				<div class="col-sm-9">
					<?php echo $this->Form->input('username', array('class'=>'form-control', 'label'=>FALSE)); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label"><?php echo __('Password'); ?></label>
				<div class="col-sm-9">
					<?php echo $this->Form->input('password', array('class'=>'form-control', 'data-ng-model' => 'User.password', 'label'=>FALSE)); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label"><?php echo __('Password confirm'); ?></label>
				<div class="col-sm-9">
					<?php echo $this->Form->input('password2', array('class'=>'form-control', 'data-ng-model' => 'User.password2', 'label'=>FALSE, 'type'=>'password')); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-3 control-label"><?php echo __('Name'); ?></label>
				<div class="col-sm-9">
					<?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>FALSE)); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-3 control-label"><?php echo __('Lastname'); ?></label>
				<div class="col-sm-9">
					<?php echo $this->Form->input('lastname', array('class'=>'form-control', 'label'=>FALSE)); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="gender" class="col-sm-3 control-label"><?php echo __('Gender'); ?></label>
				<div class="col-sm-9">
					<?php 
					echo $this->Form->input('gender', array('class'=>'form-control'
						, 'label' => FALSE
						, 'options' => array('Femenino', 'Masculino', 'Otro')
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="birthday" class="col-sm-3 control-label"><?php echo __('Birthday'); ?></label>
				<div class="col-sm-9">
					<div class='input-group date' id='datetimepicker10'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" />
					</div>
					<?php //echo $this->Form->input('birthday', array('class'=>'form-control', 'label'=>FALSE)); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label"><?php echo __('Email'); ?></label>
				<div class="col-sm-9">
					<?php
					echo $this->Form->input('email'
						, array('class'=>'form-control', 'label'=>FALSE, 'data-ng-model'=>'User.email', 'data-ng-pattern'=> 'EMAIL_REGEXP')

					);
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label"><?php echo __('Captcha'); ?></label>
				<div class="col-sm-9">
					<?php
					# Se carga la librería del catpcha
					// require_once('recaptchalib.php');
					App::import('Vendor', 'recaptchalib', array('file' => 'recaptchalib.php'));
					
					// $publickey = "your_public_key"; // you got this from the signup page
					$publickey = "6LeWP-8SAAAAAMIaV0hZZai_g88inVru8I9wDQTf"; // you got this from the signup page
					
					echo recaptcha_get_html($publickey);
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 col-sm-offset-3">
					<button type="submit"><?php echo __('Create User') ?></button>
				</div>
				<div class="col-sm-6 alert alert-danger" data-ng-show="errorMessage" data-ng-cloak>
					<span data-ng-bind="errorMessage"></span>
				</div>
			</div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>

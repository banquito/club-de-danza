<?php echo $this->Html->script(array('ncEditor', 'vendors/nicEdit'), array('inline'=>false)); ?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Add Audition'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Audition', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<div class="form-group">
				<label for="title" class="col-sm-4 control-label"><?php echo __('Title'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('title', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Audition title'),
						'required' => 'required',
						'maxlength' => 50,
						'type' => 'text'
					));
			 		?>
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-4 control-label"><?php echo __('Description'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('description', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Description'),
						// 'required' => 'required',
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Company'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('company', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Company'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Gender'); ?></label>
				<div class="col-sm-8">
					<?php 
					echo $this->Form->input('gender', array('class'=>'form-control'
						, 'label' => FALSE
						, 'options' => array('Femenino', 'Masculino', 'Otro')
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Age start'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('age-start', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Age start'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Age end'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('age-end', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Age end'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Audition date'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerAudition'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('audition-date', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Audition date'),
							'type' => 'text'
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Street'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('street', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Street'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Floor'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('floor', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Floor'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Department'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('department', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Department'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Inscription start'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerInscriptionStart'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('inscription-start', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Inscription start'),
							'type' => 'text'
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Inscription end'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerInscriptionEnd'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('inscription-end', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Inscription end'),
							'type' => 'text'
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Inscription place'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('inscription-place', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Inscription place'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Website'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('website', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Website'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Email'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('email', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Email'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Phone'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('phone', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Phone'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('State'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('state_id', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('State'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Dancestyle'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('Dancestyle', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Dancestyle'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Profession'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('Profession', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Profession'),
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

<!-- <div class="auditions form">
<?php echo $this->Form->create('Audition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Audition'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('image');
		echo $this->Form->input('company');
		echo $this->Form->input('gender');
		echo $this->Form->input('age-start');
		echo $this->Form->input('age-end');
		echo $this->Form->input('audition-date');
		echo $this->Form->input('street');
		echo $this->Form->input('floor');
		echo $this->Form->input('department');
		echo $this->Form->input('inscription-start');
		echo $this->Form->input('inscription-end');
		echo $this->Form->input('inscription-place');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('state_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Dancestyle');
		echo $this->Form->input('Profession');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Audition.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Audition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->
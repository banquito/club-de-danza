<?php echo $this->Html->script(array('ncEditor', 'vendors/nicEdit', 'mapadeladanza'), array('inline'=>false)); ?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Add Practiceroom'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Practiceroom', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<div class="form-group">
				<label for="name" class="col-sm-4 control-label"><?php echo __('Name'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('name', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Practiceroom name'),
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
			<!-- <div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Products'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('products', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Products'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div> -->
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Timetable'); ?></label>
				<div id="timeTables" class="col-sm-7">
					<input type="file" class="form-control" name="data[Timetable][]">

					<?php 
					// echo $this->Form->input('timetable', array(
					// 	'class' => 'form-control',
					// 	'label' => false,
					// 	'placeholder' => __('Timetable'),
					// 	// 'required' => 'required',
					// ));
					?>
				</div>
				<div class="col-sm-1">
					<button id="moreTimeTables" type="button">+</button>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Paid'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('paid', array(
						'class' => 'form-control',
						'label' => false,
						// 'placeholder' => __('Paid'),
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



<!-- <div class="practicerooms form">
<?php echo $this->Form->create('Practiceroom'); ?>
	<fieldset>
		<legend><?php echo __('Add Practiceroom'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('image');
		echo $this->Form->input('street');
		echo $this->Form->input('floor');
		echo $this->Form->input('department');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('timetable');
		echo $this->Form->input('paid');
		echo $this->Form->input('state_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('room_id');
		echo $this->Form->input('Dancestyle');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Practicerooms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->
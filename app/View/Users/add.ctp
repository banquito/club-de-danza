<?php 
echo $this->Html->css(array('vendors/bootstrap-datetimepicker.min', 'users/add'), '', array('inline'=>FALSE));
echo $this->Html->script(array('vendors/moment.min', 'vendors/bootstrap-datetimepicker', 'vendors/locales/bootstrap-datetimepicker.es', 'users/add'), array('inline'=>FALSE));
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Nombre de Usuario</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('username', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Contraseña</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('password', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">Apellido</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('lastname', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-sm-2 control-label">Sexo</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('gender', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="birthday" class="col-sm-2 control-label">Cumpleaños</label>
		<div class="col-sm-10">
			<div class='input-group date' id='datetimepicker10'>
                <span class="input-group-addon">
                	<span data-icon-element="" class="fa fa-calendar"></span>
                </span>
                <input type='text' class="form-control" name="data[User][birthday]" />
            </div>
			<?php //echo $this->Form->input('birthday', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>FALSE)); ?>
		</div>
	</div>
	

	<?php
		// echo $this->Form->input('rol_id');
		// echo $this->Form->input('state_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Rols'), array('controller' => 'rols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rol'), array('controller' => 'rols', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
	</ul>
</div> -->

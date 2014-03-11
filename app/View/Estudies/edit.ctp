<div class="estudies form">
<?php echo $this->Form->create('Estudy'); ?>
	<fieldset>
		<legend><?php echo __('Edit Estudy'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
		echo $this->Form->input('Dancestyle');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Estudy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Estudy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>

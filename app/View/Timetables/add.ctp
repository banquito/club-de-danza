<div class="timetables form">
<?php echo $this->Form->create('Timetable'); ?>
	<fieldset>
		<legend><?php echo __('Add Timetable'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('Practiceroom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Timetables'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
	</ul>
</div>

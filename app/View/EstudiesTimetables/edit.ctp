<div class="estudiesTimetables form">
<?php echo $this->Form->create('EstudiesTimetable'); ?>
	<fieldset>
		<legend><?php echo __('Edit Estudies Timetable'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('estudy_id');
		echo $this->Form->input('timetable_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EstudiesTimetable.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EstudiesTimetable.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies Timetables'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timetables'), array('controller' => 'timetables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timetable'), array('controller' => 'timetables', 'action' => 'add')); ?> </li>
	</ul>
</div>

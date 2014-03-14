<div class="practiceroomsTimetables form">
<?php echo $this->Form->create('PracticeroomsTimetable'); ?>
	<fieldset>
		<legend><?php echo __('Edit Practicerooms Timetable'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('practiceroom_id');
		echo $this->Form->input('timetable_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PracticeroomsTimetable.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PracticeroomsTimetable.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Practicerooms Timetables'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timetables'), array('controller' => 'timetables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timetable'), array('controller' => 'timetables', 'action' => 'add')); ?> </li>
	</ul>
</div>

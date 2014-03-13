<div class="practiceroomsTimetables view">
<h2><?php echo __('Practicerooms Timetable'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($practiceroomsTimetable['PracticeroomsTimetable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Practiceroom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsTimetable['Practiceroom']['name'], array('controller' => 'practicerooms', 'action' => 'view', $practiceroomsTimetable['Practiceroom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timetable'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsTimetable['Timetable']['name'], array('controller' => 'timetables', 'action' => 'view', $practiceroomsTimetable['Timetable']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($practiceroomsTimetable['PracticeroomsTimetable']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($practiceroomsTimetable['PracticeroomsTimetable']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Practicerooms Timetable'), array('action' => 'edit', $practiceroomsTimetable['PracticeroomsTimetable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Practicerooms Timetable'), array('action' => 'delete', $practiceroomsTimetable['PracticeroomsTimetable']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsTimetable['PracticeroomsTimetable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms Timetables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practicerooms Timetable'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timetables'), array('controller' => 'timetables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timetable'), array('controller' => 'timetables', 'action' => 'add')); ?> </li>
	</ul>
</div>

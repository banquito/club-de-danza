<div class="practiceroomsTimetables index">
	<h2><?php echo __('Practicerooms Timetables'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('practiceroom_id'); ?></th>
			<th><?php echo $this->Paginator->sort('timetable_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($practiceroomsTimetables as $practiceroomsTimetable): ?>
	<tr>
		<td><?php echo h($practiceroomsTimetable['PracticeroomsTimetable']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($practiceroomsTimetable['Practiceroom']['name'], array('controller' => 'practicerooms', 'action' => 'view', $practiceroomsTimetable['Practiceroom']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($practiceroomsTimetable['Timetable']['name'], array('controller' => 'timetables', 'action' => 'view', $practiceroomsTimetable['Timetable']['id'])); ?>
		</td>
		<td><?php echo h($practiceroomsTimetable['PracticeroomsTimetable']['created']); ?>&nbsp;</td>
		<td><?php echo h($practiceroomsTimetable['PracticeroomsTimetable']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $practiceroomsTimetable['PracticeroomsTimetable']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $practiceroomsTimetable['PracticeroomsTimetable']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $practiceroomsTimetable['PracticeroomsTimetable']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsTimetable['PracticeroomsTimetable']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Practicerooms Timetable'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timetables'), array('controller' => 'timetables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timetable'), array('controller' => 'timetables', 'action' => 'add')); ?> </li>
	</ul>
</div>

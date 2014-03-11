<div class="practicerooms index">
	<h2><?php echo __('Practicerooms'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('floor'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('timetable'); ?></th>
			<th><?php echo $this->Paginator->sort('paid'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($practicerooms as $practiceroom): ?>
	<tr>
		<td><?php echo h($practiceroom['Practiceroom']['id']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['name']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['description']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['image']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['street']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['floor']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['department']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['website']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['email']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['phone']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['timetable']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['paid']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['created']); ?>&nbsp;</td>
		<td><?php echo h($practiceroom['Practiceroom']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($practiceroom['State']['name'], array('controller' => 'states', 'action' => 'view', $practiceroom['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($practiceroom['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroom['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($practiceroom['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $practiceroom['Room']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $practiceroom['Practiceroom']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $practiceroom['Practiceroom']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $practiceroom['Practiceroom']['id']), null, __('Are you sure you want to delete # %s?', $practiceroom['Practiceroom']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('action' => 'add')); ?></li>
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

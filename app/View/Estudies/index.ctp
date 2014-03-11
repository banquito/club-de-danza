<div class="estudies index">
	<h2><?php echo __('Estudies'); ?></h2>
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
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($estudies as $estudy): ?>
	<tr>
		<td><?php echo h($estudy['Estudy']['id']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['name']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['description']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['image']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['street']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['floor']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['department']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['website']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['email']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['phone']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['timetable']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['paid']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['created']); ?>&nbsp;</td>
		<td><?php echo h($estudy['Estudy']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($estudy['State']['name'], array('controller' => 'states', 'action' => 'view', $estudy['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($estudy['User']['name'], array('controller' => 'users', 'action' => 'view', $estudy['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $estudy['Estudy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $estudy['Estudy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $estudy['Estudy']['id']), null, __('Are you sure you want to delete # %s?', $estudy['Estudy']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Estudy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>

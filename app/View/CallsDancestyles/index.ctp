<div class="callsDancestyles index">
	<h2><?php echo __('Calls Dancestyles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('call_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dancestyle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($callsDancestyles as $callsDancestyle): ?>
	<tr>
		<td><?php echo h($callsDancestyle['CallsDancestyle']['id']); ?>&nbsp;</td>
		<td><?php echo h($callsDancestyle['CallsDancestyle']['created']); ?>&nbsp;</td>
		<td><?php echo h($callsDancestyle['CallsDancestyle']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($callsDancestyle['Call']['title'], array('controller' => 'calls', 'action' => 'view', $callsDancestyle['Call']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($callsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $callsDancestyle['Dancestyle']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($callsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $callsDancestyle['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $callsDancestyle['CallsDancestyle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $callsDancestyle['CallsDancestyle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $callsDancestyle['CallsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $callsDancestyle['CallsDancestyle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Calls Dancestyle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

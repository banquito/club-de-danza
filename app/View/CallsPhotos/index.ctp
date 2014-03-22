<div class="callsPhotos index">
	<h2><?php echo __('Calls Photos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('call_id'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($callsPhotos as $callsPhoto): ?>
	<tr>
		<td><?php echo h($callsPhoto['CallsPhoto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($callsPhoto['Call']['title'], array('controller' => 'calls', 'action' => 'view', $callsPhoto['Call']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($callsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $callsPhoto['Photo']['id'])); ?>
		</td>
		<td><?php echo h($callsPhoto['CallsPhoto']['created']); ?>&nbsp;</td>
		<td><?php echo h($callsPhoto['CallsPhoto']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($callsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $callsPhoto['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $callsPhoto['CallsPhoto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $callsPhoto['CallsPhoto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $callsPhoto['CallsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $callsPhoto['CallsPhoto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Calls Photo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

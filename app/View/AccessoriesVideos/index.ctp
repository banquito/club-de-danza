<div class="accessoriesVideos index">
	<h2><?php echo __('Accessories Videos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('accessory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('video_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($accessoriesVideos as $accessoriesVideo): ?>
	<tr>
		<td><?php echo h($accessoriesVideo['AccessoriesVideo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accessoriesVideo['Accessory']['name'], array('controller' => 'accessories', 'action' => 'view', $accessoriesVideo['Accessory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($accessoriesVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $accessoriesVideo['Video']['id'])); ?>
		</td>
		<td><?php echo h($accessoriesVideo['AccessoriesVideo']['created']); ?>&nbsp;</td>
		<td><?php echo h($accessoriesVideo['AccessoriesVideo']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accessoriesVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $accessoriesVideo['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessoriesVideo['AccessoriesVideo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accessoriesVideo['AccessoriesVideo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accessoriesVideo['AccessoriesVideo']['id']), null, __('Are you sure you want to delete # %s?', $accessoriesVideo['AccessoriesVideo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Accessories Video'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('controller' => 'accessories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessory'), array('controller' => 'accessories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

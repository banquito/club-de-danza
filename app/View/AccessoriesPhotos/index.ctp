<div class="accessoriesPhotos index">
	<h2><?php echo __('Accessories Photos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('accessory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($accessoriesPhotos as $accessoriesPhoto): ?>
	<tr>
		<td><?php echo h($accessoriesPhoto['AccessoriesPhoto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accessoriesPhoto['Accessory']['name'], array('controller' => 'accessories', 'action' => 'view', $accessoriesPhoto['Accessory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($accessoriesPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $accessoriesPhoto['Photo']['id'])); ?>
		</td>
		<td><?php echo h($accessoriesPhoto['AccessoriesPhoto']['created']); ?>&nbsp;</td>
		<td><?php echo h($accessoriesPhoto['AccessoriesPhoto']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accessoriesPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $accessoriesPhoto['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessoriesPhoto['AccessoriesPhoto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accessoriesPhoto['AccessoriesPhoto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accessoriesPhoto['AccessoriesPhoto']['id']), null, __('Are you sure you want to delete # %s?', $accessoriesPhoto['AccessoriesPhoto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Accessories Photo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('controller' => 'accessories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessory'), array('controller' => 'accessories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

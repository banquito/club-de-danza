<div class="practiceroomsPhotos index">
	<h2><?php echo __('Practicerooms Photos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('estudy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($practiceroomsPhotos as $practiceroomsPhoto): ?>
	<tr>
		<td><?php echo h($practiceroomsPhoto['PracticeroomsPhoto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($practiceroomsPhoto['Estudy']['name'], array('controller' => 'estudies', 'action' => 'view', $practiceroomsPhoto['Estudy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($practiceroomsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $practiceroomsPhoto['Photo']['id'])); ?>
		</td>
		<td><?php echo h($practiceroomsPhoto['PracticeroomsPhoto']['created']); ?>&nbsp;</td>
		<td><?php echo h($practiceroomsPhoto['PracticeroomsPhoto']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($practiceroomsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroomsPhoto['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $practiceroomsPhoto['PracticeroomsPhoto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $practiceroomsPhoto['PracticeroomsPhoto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $practiceroomsPhoto['PracticeroomsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsPhoto['PracticeroomsPhoto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Practicerooms Photo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

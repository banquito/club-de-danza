<div class="castingsPhotos index">
	<h2><?php echo __('Castings Photos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('job_id'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($castingsPhotos as $castingsPhoto): ?>
	<tr>
		<td><?php echo h($castingsPhoto['CastingsPhoto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($castingsPhoto['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $castingsPhoto['Job']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($castingsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $castingsPhoto['Photo']['id'])); ?>
		</td>
		<td><?php echo h($castingsPhoto['CastingsPhoto']['created']); ?>&nbsp;</td>
		<td><?php echo h($castingsPhoto['CastingsPhoto']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($castingsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $castingsPhoto['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $castingsPhoto['CastingsPhoto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $castingsPhoto['CastingsPhoto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $castingsPhoto['CastingsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $castingsPhoto['CastingsPhoto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Castings Photo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

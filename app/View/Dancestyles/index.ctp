<div class="dancestyles index">
	<h2><?php echo __('Dancestyles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dancestyles as $dancestyle): ?>
	<tr>
		<td><?php echo h($dancestyle['Dancestyle']['id']); ?>&nbsp;</td>
		<td><?php echo h($dancestyle['Dancestyle']['name']); ?>&nbsp;</td>
		<td><?php echo h($dancestyle['Dancestyle']['created']); ?>&nbsp;</td>
		<td><?php echo h($dancestyle['Dancestyle']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $dancestyle['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dancestyle['Dancestyle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dancestyle['Dancestyle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dancestyle['Dancestyle']['id']), null, __('Are you sure you want to delete # %s?', $dancestyle['Dancestyle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
	</ul>
</div>

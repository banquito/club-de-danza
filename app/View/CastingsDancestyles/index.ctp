<div class="castingsDancestyles index">
	<h2><?php echo __('Castings Dancestyles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('audition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dancestyle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($castingsDancestyles as $castingsDancestyle): ?>
	<tr>
		<td><?php echo h($castingsDancestyle['CastingsDancestyle']['id']); ?>&nbsp;</td>
		<td><?php echo h($castingsDancestyle['CastingsDancestyle']['created']); ?>&nbsp;</td>
		<td><?php echo h($castingsDancestyle['CastingsDancestyle']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($castingsDancestyle['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $castingsDancestyle['Audition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($castingsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $castingsDancestyle['Dancestyle']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($castingsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $castingsDancestyle['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $castingsDancestyle['CastingsDancestyle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $castingsDancestyle['CastingsDancestyle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $castingsDancestyle['CastingsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $castingsDancestyle['CastingsDancestyle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Castings Dancestyle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

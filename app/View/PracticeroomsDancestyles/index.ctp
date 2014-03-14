<div class="practiceroomsDancestyles index">
	<h2><?php echo __('Practicerooms Dancestyles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('practicerooms_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dancestyle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($practiceroomsDancestyles as $practiceroomsDancestyle): ?>
	<tr>
		<td><?php echo h($practiceroomsDancestyle['PracticeroomsDancestyle']['id']); ?>&nbsp;</td>
		<td><?php echo h($practiceroomsDancestyle['PracticeroomsDancestyle']['created']); ?>&nbsp;</td>
		<td><?php echo h($practiceroomsDancestyle['PracticeroomsDancestyle']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($practiceroomsDancestyle['Practicerooms']['name'], array('controller' => 'practicerooms', 'action' => 'view', $practiceroomsDancestyle['Practicerooms']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($practiceroomsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $practiceroomsDancestyle['Dancestyle']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($practiceroomsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroomsDancestyle['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $practiceroomsDancestyle['PracticeroomsDancestyle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $practiceroomsDancestyle['PracticeroomsDancestyle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $practiceroomsDancestyle['PracticeroomsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsDancestyle['PracticeroomsDancestyle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Practicerooms Dancestyle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practicerooms'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

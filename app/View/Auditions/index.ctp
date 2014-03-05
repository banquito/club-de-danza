<div class="auditions index">
	<h2><?php echo __('Auditions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('age-start'); ?></th>
			<th><?php echo $this->Paginator->sort('age-end'); ?></th>
			<th><?php echo $this->Paginator->sort('audition-date'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('floor'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th><?php echo $this->Paginator->sort('inscription-start'); ?></th>
			<th><?php echo $this->Paginator->sort('inscription-end'); ?></th>
			<th><?php echo $this->Paginator->sort('inscription-place'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($auditions as $audition): ?>
	<tr>
		<td><?php echo h($audition['Audition']['id']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['title']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['description']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['image']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['company']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['gender']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['age-start']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['age-end']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['audition-date']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['street']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['floor']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['department']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['inscription-start']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['inscription-end']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['inscription-place']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['website']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['email']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['phone']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['created']); ?>&nbsp;</td>
		<td><?php echo h($audition['Audition']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($audition['State']['name'], array('controller' => 'states', 'action' => 'view', $audition['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($audition['User']['name'], array('controller' => 'users', 'action' => 'view', $audition['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $audition['Audition']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $audition['Audition']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $audition['Audition']['id']), null, __('Are you sure you want to delete # %s?', $audition['Audition']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Audition'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
	</ul>
</div>

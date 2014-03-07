<div class="jobsProfessions index">
	<h2><?php echo __('Jobs Professions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('job_id'); ?></th>
			<th><?php echo $this->Paginator->sort('profession_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($jobsProfessions as $jobsProfession): ?>
	<tr>
		<td><?php echo h($jobsProfession['JobsProfession']['id']); ?>&nbsp;</td>
		<td><?php echo h($jobsProfession['JobsProfession']['created']); ?>&nbsp;</td>
		<td><?php echo h($jobsProfession['JobsProfession']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($jobsProfession['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $jobsProfession['Job']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobsProfession['Profession']['name'], array('controller' => 'professions', 'action' => 'view', $jobsProfession['Profession']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobsProfession['User']['name'], array('controller' => 'users', 'action' => 'view', $jobsProfession['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $jobsProfession['JobsProfession']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $jobsProfession['JobsProfession']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $jobsProfession['JobsProfession']['id']), null, __('Are you sure you want to delete # %s?', $jobsProfession['JobsProfession']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Jobs Profession'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

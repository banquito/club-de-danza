<div class="auditions index">
	<h1><?php echo __('Auditions'); ?></h1>
	<table class="table">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('company'); ?></th>
				<th><?php echo $this->Paginator->sort('element-date'); ?></th>
				<th><?php echo $this->Paginator->sort('street'); ?></th>
				<th><?php echo $this->Paginator->sort('inscription-start'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($auditions as $audition): ?>
				<tr>
					<td><?php echo h($audition['Audition']['title']); ?>&nbsp;</td>
					<td><?php echo h($audition['Audition']['company']); ?>&nbsp;</td>
					<td><?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['element-date']); ?>&nbsp;</td>
					<td><?php echo h($audition['Audition']['street']); ?>&nbsp;</td>
					<td><?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['inscription-start']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $audition['Audition']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $audition['Audition']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $audition['Audition']['id']), null, __('Are you sure you want to delete # %s?', $audition['Audition']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p class="text-center">
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>
	</p>
	<div class="paging text-center">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<!-- <div class="actions">
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
 -->
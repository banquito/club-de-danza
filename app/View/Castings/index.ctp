<div class="castings index">
	<h1><?php echo __('Castings'); ?></h1>
	<table class="table">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('element-date'); ?></th>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('company'); ?></th>
				<th><?php echo $this->Paginator->sort('street'); ?></th>
				<th><?php echo $this->Paginator->sort('inscription-start'); ?></th>
				<th><?php echo $this->Paginator->sort('inscription-place'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($castings as $casting): ?>
				<tr>
					<td><?php echo $this -> Time -> format('d-m-Y H:i', $casting['Casting']['element-date']); ?>&nbsp;</td>
					<td><?php echo h($casting['Casting']['title']); ?>&nbsp;</td>
					<td><?php echo h($casting['Casting']['company']); ?>&nbsp;</td>
					<td><?php echo h($casting['Casting']['street']); ?>&nbsp;</td>
					<td><?php echo $this -> Time -> format('d-m-Y H:i', $casting['Casting']['inscription-start']); ?>&nbsp;</td>
					<td><?php echo h($casting['Casting']['inscription-place']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $casting['Casting']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $casting['Casting']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $casting['Casting']['id']), null, __('Are you sure you want to delete # %s?', $casting['Casting']['id'])); ?>
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











<!-- <div class="castings index">
	<h2><?php echo __('Castings'); ?></h2>
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
			<th><?php echo $this->Paginator->sort('element-date'); ?></th>
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
	<?php foreach ($castings as $casting): ?>
	<tr>
		<td><?php echo h($casting['Casting']['id']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['title']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['description']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['image']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['company']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['gender']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['age-start']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['age-end']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['element-date']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['street']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['floor']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['department']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['inscription-start']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['inscription-end']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['inscription-place']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['website']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['email']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['phone']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['created']); ?>&nbsp;</td>
		<td><?php echo h($casting['Casting']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casting['State']['name'], array('controller' => 'states', 'action' => 'view', $casting['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casting['User']['name'], array('controller' => 'users', 'action' => 'view', $casting['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $casting['Casting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $casting['Casting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $casting['Casting']['id']), null, __('Are you sure you want to delete # %s?', $casting['Casting']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Casting'), array('action' => 'add')); ?></li>
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
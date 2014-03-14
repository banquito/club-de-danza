<div class="accessories index">
	<h1><?php echo __('Accessories'); ?></h1>
	<table class="table">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('street'); ?></th>
				<th><?php echo $this->Paginator->sort('phone'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($accessories as $accessory): ?>
				<tr>
					<td><?php echo h($accessory['Accessory']['name']); ?>&nbsp;</td>
					<td><?php echo h($accessory['Accessory']['street']); ?>&nbsp;</td>
					<td><?php echo h($accessory['Accessory']['phone']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessory['Accessory']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accessory['Accessory']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accessory['Accessory']['id']), null, __('Are you sure you want to delete # %s?', $accessory['Accessory']['id'])); ?>
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



<!-- <div class="accessories index">
	<h2><?php echo __('Accessories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('products'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('floor'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('paid'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($accessories as $accessory): ?>
	<tr>
		<td><?php echo h($accessory['Accessory']['id']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['name']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['description']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['image']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['products']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['street']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['floor']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['department']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['website']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['email']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['phone']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['paid']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['created']); ?>&nbsp;</td>
		<td><?php echo h($accessory['Accessory']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accessory['State']['name'], array('controller' => 'states', 'action' => 'view', $accessory['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($accessory['User']['name'], array('controller' => 'users', 'action' => 'view', $accessory['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessory['Accessory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accessory['Accessory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accessory['Accessory']['id']), null, __('Are you sure you want to delete # %s?', $accessory['Accessory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Accessory'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->
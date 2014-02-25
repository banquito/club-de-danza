<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('List Users'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<table class="table">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('username'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('lastname'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('state_id'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($user['State']['name'], array('controller' => 'states', 'action' => 'view', $user['State']['id'])); ?>
						</td>
						<td class="actions text-center">
							<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $user['User']['id']), array('escape'=>false)); ?>
							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $user['User']['id']), array('escape'=>false)); ?>
							<?php
							echo $this->Form->postLink('<i class="fa fa-times"></i>'
								, array('action' => 'delete', $user['User']['id'])
								, array('escape'=>false)
								, __('Are you sure you want to delete # %s?', $user['User']['id'])
							);
							?>
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
</div>

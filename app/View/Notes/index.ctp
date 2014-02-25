<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('List Notes'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<table class="table">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('created', 'Fecha'); ?></th>
						<th><?php echo $this->Paginator->sort('title'); ?></th>
						<th><?php echo $this->Paginator->sort('description'); ?></th>
						<th><?php echo $this->Paginator->sort('user'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($notes as $note): ?>
					<tr>
						<td><?php echo $this -> Time -> format('d-m-Y', h($note['Note']['created'])); ?>&nbsp;</td>
						<td><?php echo h($note['Note']['title']); ?>&nbsp;</td>
						<td><?php echo h($note['Note']['description']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($note['User']['name'], array('controller' => 'users', 'action' => 'view', $note['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $note['Note']['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $note['Note']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $note['Note']['id']), null, __('Are you sure you want to delete # %s?', $note['Note']['id'])); ?>
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
				echo $this->Paginator->prev('< ' . __('previous') . ' ', array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ' | '));
				echo $this->Paginator->next(' ' . __('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
		</div>
	</div>
</div>

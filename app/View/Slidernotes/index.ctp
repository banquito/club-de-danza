<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('List Slidernotes'); ?></h1>
	</div>
</div>

<div class="slidernotes index">
	<table class="table">
		<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('created', 'Fecha'); ?></th>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('link'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($slidernotes as $slidernote): ?>
				<tr>
					<td><?php echo $this -> Time -> format('d-m-Y', h($slidernote['Slidernote']['created'])); ?>&nbsp;</td>
					<td><?php echo h($slidernote['Slidernote']['title']); ?>&nbsp;</td>
					<td><?php echo h($slidernote['Slidernote']['link']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $slidernote['Slidernote']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $slidernote['Slidernote']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $slidernote['Slidernote']['id']), null, __('Are you sure you want to delete # %s?', $slidernote['Slidernote']['id'])); ?>
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

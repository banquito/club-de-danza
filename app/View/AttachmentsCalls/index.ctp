<div class="attachmentsCalls index">
	<h2><?php echo __('Attachments Calls'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('call_id'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attachmentsCalls as $attachmentsCall): ?>
	<tr>
		<td><?php echo h($attachmentsCall['AttachmentsCall']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attachmentsCall['Call']['title'], array('controller' => 'calls', 'action' => 'view', $attachmentsCall['Call']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attachmentsCall['Attachment']['name'], array('controller' => 'attachments', 'action' => 'view', $attachmentsCall['Attachment']['id'])); ?>
		</td>
		<td><?php echo h($attachmentsCall['AttachmentsCall']['created']); ?>&nbsp;</td>
		<td><?php echo h($attachmentsCall['AttachmentsCall']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attachmentsCall['User']['name'], array('controller' => 'users', 'action' => 'view', $attachmentsCall['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attachmentsCall['AttachmentsCall']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attachmentsCall['AttachmentsCall']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attachmentsCall['AttachmentsCall']['id']), null, __('Are you sure you want to delete # %s?', $attachmentsCall['AttachmentsCall']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Attachments Call'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

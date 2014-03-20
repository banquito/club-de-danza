<div class="attachmentsCastings index">
	<h2><?php echo __('Attachments Castings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('casting_id'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attachmentsCastings as $attachmentsCasting): ?>
	<tr>
		<td><?php echo h($attachmentsCasting['AttachmentsCasting']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attachmentsCasting['Casting']['title'], array('controller' => 'castings', 'action' => 'view', $attachmentsCasting['Casting']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attachmentsCasting['Attachment']['name'], array('controller' => 'attachments', 'action' => 'view', $attachmentsCasting['Attachment']['id'])); ?>
		</td>
		<td><?php echo h($attachmentsCasting['AttachmentsCasting']['created']); ?>&nbsp;</td>
		<td><?php echo h($attachmentsCasting['AttachmentsCasting']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attachmentsCasting['User']['name'], array('controller' => 'users', 'action' => 'view', $attachmentsCasting['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attachmentsCasting['AttachmentsCasting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attachmentsCasting['AttachmentsCasting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attachmentsCasting['AttachmentsCasting']['id']), null, __('Are you sure you want to delete # %s?', $attachmentsCasting['AttachmentsCasting']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Attachments Casting'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Castings'), array('controller' => 'castings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casting'), array('controller' => 'castings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="attachmentsCalls view">
<h2><?php echo __('Attachments Call'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachmentsCall['AttachmentsCall']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Call'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsCall['Call']['title'], array('controller' => 'calls', 'action' => 'view', $attachmentsCall['Call']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsCall['Attachment']['name'], array('controller' => 'attachments', 'action' => 'view', $attachmentsCall['Attachment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachmentsCall['AttachmentsCall']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attachmentsCall['AttachmentsCall']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsCall['User']['name'], array('controller' => 'users', 'action' => 'view', $attachmentsCall['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachments Call'), array('action' => 'edit', $attachmentsCall['AttachmentsCall']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachments Call'), array('action' => 'delete', $attachmentsCall['AttachmentsCall']['id']), null, __('Are you sure you want to delete # %s?', $attachmentsCall['AttachmentsCall']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments Calls'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachments Call'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

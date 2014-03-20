<div class="attachmentsCastings view">
<h2><?php echo __('Attachments Casting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachmentsCasting['AttachmentsCasting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Casting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsCasting['Casting']['title'], array('controller' => 'castings', 'action' => 'view', $attachmentsCasting['Casting']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsCasting['Attachment']['name'], array('controller' => 'attachments', 'action' => 'view', $attachmentsCasting['Attachment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachmentsCasting['AttachmentsCasting']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attachmentsCasting['AttachmentsCasting']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsCasting['User']['name'], array('controller' => 'users', 'action' => 'view', $attachmentsCasting['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachments Casting'), array('action' => 'edit', $attachmentsCasting['AttachmentsCasting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachments Casting'), array('action' => 'delete', $attachmentsCasting['AttachmentsCasting']['id']), null, __('Are you sure you want to delete # %s?', $attachmentsCasting['AttachmentsCasting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments Castings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachments Casting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings'), array('controller' => 'castings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casting'), array('controller' => 'castings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="attachmentsJobs view">
<h2><?php echo __('Attachments Job'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachmentsJob['AttachmentsJob']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsJob['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $attachmentsJob['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsJob['Attachment']['name'], array('controller' => 'attachments', 'action' => 'view', $attachmentsJob['Attachment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachmentsJob['AttachmentsJob']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attachmentsJob['AttachmentsJob']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsJob['User']['name'], array('controller' => 'users', 'action' => 'view', $attachmentsJob['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachments Job'), array('action' => 'edit', $attachmentsJob['AttachmentsJob']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachments Job'), array('action' => 'delete', $attachmentsJob['AttachmentsJob']['id']), null, __('Are you sure you want to delete # %s?', $attachmentsJob['AttachmentsJob']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments Jobs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachments Job'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

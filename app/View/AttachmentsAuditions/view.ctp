<div class="attachmentsAuditions view">
<h2><?php echo __('Attachments Audition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachmentsAudition['AttachmentsAudition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsAudition['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $attachmentsAudition['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsAudition['Attachment']['name'], array('controller' => 'attachments', 'action' => 'view', $attachmentsAudition['Attachment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachmentsAudition['AttachmentsAudition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attachmentsAudition['AttachmentsAudition']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachmentsAudition['User']['name'], array('controller' => 'users', 'action' => 'view', $attachmentsAudition['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachments Audition'), array('action' => 'edit', $attachmentsAudition['AttachmentsAudition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachments Audition'), array('action' => 'delete', $attachmentsAudition['AttachmentsAudition']['id']), null, __('Are you sure you want to delete # %s?', $attachmentsAudition['AttachmentsAudition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments Auditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachments Audition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

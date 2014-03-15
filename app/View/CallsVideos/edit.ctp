<div class="callsVideos form">
<?php echo $this->Form->create('CallsVideo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Calls Video'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('call_id');
		echo $this->Form->input('video_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CallsVideo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CallsVideo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calls Videos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

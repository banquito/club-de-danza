<div class="auditionsPhotos form">
<?php echo $this->Form->create('AuditionsPhoto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Auditions Photo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('audition_id');
		echo $this->Form->input('photo_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AuditionsPhoto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AuditionsPhoto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Auditions Photos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="videos form">
<?php echo $this->Form->create('Video'); ?>
	<fieldset>
		<legend><?php echo __('Edit Video'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('file');
		echo $this->Form->input('Practiceroom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Video.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
	</ul>
</div>

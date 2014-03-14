<div class="estudiesDancestyles form">
<?php echo $this->Form->create('EstudiesDancestyle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Estudies Dancestyle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('estudies_id');
		echo $this->Form->input('dancestyle_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EstudiesDancestyle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EstudiesDancestyle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies Dancestyles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudies'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

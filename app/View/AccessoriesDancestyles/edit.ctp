<div class="accessoriesDancestyles form">
<?php echo $this->Form->create('AccessoriesDancestyle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Accessories Dancestyle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('accessories_id');
		echo $this->Form->input('dancestyle_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AccessoriesDancestyle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AccessoriesDancestyle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accessories Dancestyles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('controller' => 'accessories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessories'), array('controller' => 'accessories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="dancestyles form">
<?php echo $this->Form->create('Dancestyle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dancestyle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Audition');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Dancestyle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Dancestyle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="bannercategories view">
<h2><?php echo __('Bannercategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bannercategory['User']['name'], array('controller' => 'users', 'action' => 'view', $bannercategory['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bannercategory'), array('action' => 'edit', $bannercategory['Bannercategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bannercategory'), array('action' => 'delete', $bannercategory['Bannercategory']['id']), null, __('Are you sure you want to delete # %s?', $bannercategory['Bannercategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bannercategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bannercategory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

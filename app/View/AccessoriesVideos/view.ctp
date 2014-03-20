<div class="accessoriesVideos view">
<h2><?php echo __('Accessories Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accessoriesVideo['AccessoriesVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accessory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesVideo['Accessory']['name'], array('controller' => 'accessories', 'action' => 'view', $accessoriesVideo['Accessory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $accessoriesVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accessoriesVideo['AccessoriesVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accessoriesVideo['AccessoriesVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $accessoriesVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accessories Video'), array('action' => 'edit', $accessoriesVideo['AccessoriesVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accessories Video'), array('action' => 'delete', $accessoriesVideo['AccessoriesVideo']['id']), null, __('Are you sure you want to delete # %s?', $accessoriesVideo['AccessoriesVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessories Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('controller' => 'accessories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessory'), array('controller' => 'accessories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

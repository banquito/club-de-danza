<div class="accessoriesPhotos view">
<h2><?php echo __('Accessories Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accessoriesPhoto['AccessoriesPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accessory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesPhoto['Accessory']['name'], array('controller' => 'accessories', 'action' => 'view', $accessoriesPhoto['Accessory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $accessoriesPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accessoriesPhoto['AccessoriesPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accessoriesPhoto['AccessoriesPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $accessoriesPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accessories Photo'), array('action' => 'edit', $accessoriesPhoto['AccessoriesPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accessories Photo'), array('action' => 'delete', $accessoriesPhoto['AccessoriesPhoto']['id']), null, __('Are you sure you want to delete # %s?', $accessoriesPhoto['AccessoriesPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessories Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('controller' => 'accessories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessory'), array('controller' => 'accessories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

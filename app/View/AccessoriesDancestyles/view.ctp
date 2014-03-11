<div class="accessoriesDancestyles view">
<h2><?php echo __('Accessories Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accessoriesDancestyle['AccessoriesDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accessoriesDancestyle['AccessoriesDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accessoriesDancestyle['AccessoriesDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accessories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesDancestyle['Accessories']['name'], array('controller' => 'accessories', 'action' => 'view', $accessoriesDancestyle['Accessories']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $accessoriesDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessoriesDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $accessoriesDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accessories Dancestyle'), array('action' => 'edit', $accessoriesDancestyle['AccessoriesDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accessories Dancestyle'), array('action' => 'delete', $accessoriesDancestyle['AccessoriesDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $accessoriesDancestyle['AccessoriesDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessories Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('controller' => 'accessories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessories'), array('controller' => 'accessories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

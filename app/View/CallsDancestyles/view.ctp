<div class="callsDancestyles view">
<h2><?php echo __('Calls Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($callsDancestyle['CallsDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($callsDancestyle['CallsDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($callsDancestyle['CallsDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Call'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsDancestyle['Call']['title'], array('controller' => 'calls', 'action' => 'view', $callsDancestyle['Call']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $callsDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $callsDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calls Dancestyle'), array('action' => 'edit', $callsDancestyle['CallsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calls Dancestyle'), array('action' => 'delete', $callsDancestyle['CallsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $callsDancestyle['CallsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calls Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

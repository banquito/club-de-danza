<div class="callsVideos view">
<h2><?php echo __('Calls Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($callsVideo['CallsVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Call'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsVideo['Call']['title'], array('controller' => 'calls', 'action' => 'view', $callsVideo['Call']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $callsVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($callsVideo['CallsVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($callsVideo['CallsVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $callsVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calls Video'), array('action' => 'edit', $callsVideo['CallsVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calls Video'), array('action' => 'delete', $callsVideo['CallsVideo']['id']), null, __('Are you sure you want to delete # %s?', $callsVideo['CallsVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calls Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

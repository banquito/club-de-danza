<div class="castingsVideos view">
<h2><?php echo __('Castings Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($castingsVideo['CastingsVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Casting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsVideo['Casting']['title'], array('controller' => 'castings', 'action' => 'view', $castingsVideo['Casting']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $castingsVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($castingsVideo['CastingsVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($castingsVideo['CastingsVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $castingsVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Castings Video'), array('action' => 'edit', $castingsVideo['CastingsVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Castings Video'), array('action' => 'delete', $castingsVideo['CastingsVideo']['id']), null, __('Are you sure you want to delete # %s?', $castingsVideo['CastingsVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Castings Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings'), array('controller' => 'castings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casting'), array('controller' => 'castings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="estudiesVideos view">
<h2><?php echo __('Estudies Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estudiesVideo['EstudiesVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estudy'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesVideo['Estudy']['name'], array('controller' => 'estudies', 'action' => 'view', $estudiesVideo['Estudy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $estudiesVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estudiesVideo['EstudiesVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estudiesVideo['EstudiesVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $estudiesVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estudies Video'), array('action' => 'edit', $estudiesVideo['EstudiesVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estudies Video'), array('action' => 'delete', $estudiesVideo['EstudiesVideo']['id']), null, __('Are you sure you want to delete # %s?', $estudiesVideo['EstudiesVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudies Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

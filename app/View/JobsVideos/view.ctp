<div class="jobsVideos view">
<h2><?php echo __('Jobs Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jobsVideo['JobsVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsVideo['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $jobsVideo['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $jobsVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($jobsVideo['JobsVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($jobsVideo['JobsVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $jobsVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jobs Video'), array('action' => 'edit', $jobsVideo['JobsVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jobs Video'), array('action' => 'delete', $jobsVideo['JobsVideo']['id']), null, __('Are you sure you want to delete # %s?', $jobsVideo['JobsVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobs Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

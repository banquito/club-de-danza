<div class="jobsPhotos view">
<h2><?php echo __('Jobs Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jobsPhoto['JobsPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Casting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsPhoto['Casting']['title'], array('controller' => 'castings', 'action' => 'view', $jobsPhoto['Casting']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $jobsPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($jobsPhoto['JobsPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($jobsPhoto['JobsPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $jobsPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jobs Photo'), array('action' => 'edit', $jobsPhoto['JobsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jobs Photo'), array('action' => 'delete', $jobsPhoto['JobsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $jobsPhoto['JobsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobs Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings'), array('controller' => 'castings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casting'), array('controller' => 'castings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

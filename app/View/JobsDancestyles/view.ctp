<div class="jobsDancestyles view">
<h2><?php echo __('Jobs Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jobsDancestyle['JobsDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($jobsDancestyle['JobsDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($jobsDancestyle['JobsDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsDancestyle['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $jobsDancestyle['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $jobsDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $jobsDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jobs Dancestyle'), array('action' => 'edit', $jobsDancestyle['JobsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jobs Dancestyle'), array('action' => 'delete', $jobsDancestyle['JobsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $jobsDancestyle['JobsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobs Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

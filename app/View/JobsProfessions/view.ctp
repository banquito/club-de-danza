<div class="jobsProfessions view">
<h2><?php echo __('Jobs Profession'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jobsProfession['JobsProfession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($jobsProfession['JobsProfession']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($jobsProfession['JobsProfession']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsProfession['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $jobsProfession['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profession'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsProfession['Profession']['name'], array('controller' => 'professions', 'action' => 'view', $jobsProfession['Profession']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobsProfession['User']['name'], array('controller' => 'users', 'action' => 'view', $jobsProfession['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jobs Profession'), array('action' => 'edit', $jobsProfession['JobsProfession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jobs Profession'), array('action' => 'delete', $jobsProfession['JobsProfession']['id']), null, __('Are you sure you want to delete # %s?', $jobsProfession['JobsProfession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs Professions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobs Profession'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

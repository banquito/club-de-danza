<div class="practiceroomsVideos view">
<h2><?php echo __('Practicerooms Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($practiceroomsVideo['PracticeroomsVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Practiceroom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsVideo['Practiceroom']['name'], array('controller' => 'practicerooms', 'action' => 'view', $practiceroomsVideo['Practiceroom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $practiceroomsVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($practiceroomsVideo['PracticeroomsVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($practiceroomsVideo['PracticeroomsVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroomsVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Practicerooms Video'), array('action' => 'edit', $practiceroomsVideo['PracticeroomsVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Practicerooms Video'), array('action' => 'delete', $practiceroomsVideo['PracticeroomsVideo']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsVideo['PracticeroomsVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practicerooms Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

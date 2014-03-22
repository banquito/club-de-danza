<div class="practiceroomsPhotos view">
<h2><?php echo __('Practicerooms Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($practiceroomsPhoto['PracticeroomsPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estudy'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsPhoto['Estudy']['name'], array('controller' => 'estudies', 'action' => 'view', $practiceroomsPhoto['Estudy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $practiceroomsPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($practiceroomsPhoto['PracticeroomsPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($practiceroomsPhoto['PracticeroomsPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroomsPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Practicerooms Photo'), array('action' => 'edit', $practiceroomsPhoto['PracticeroomsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Practicerooms Photo'), array('action' => 'delete', $practiceroomsPhoto['PracticeroomsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsPhoto['PracticeroomsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practicerooms Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

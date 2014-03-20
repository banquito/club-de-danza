<div class="auditionsVideos view">
<h2><?php echo __('Auditions Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($auditionsVideo['AuditionsVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsVideo['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $auditionsVideo['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsVideo['Video']['name'], array('controller' => 'videos', 'action' => 'view', $auditionsVideo['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($auditionsVideo['AuditionsVideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($auditionsVideo['AuditionsVideo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsVideo['User']['name'], array('controller' => 'users', 'action' => 'view', $auditionsVideo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Auditions Video'), array('action' => 'edit', $auditionsVideo['AuditionsVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Auditions Video'), array('action' => 'delete', $auditionsVideo['AuditionsVideo']['id']), null, __('Are you sure you want to delete # %s?', $auditionsVideo['AuditionsVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auditions Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

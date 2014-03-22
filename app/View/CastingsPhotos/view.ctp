<div class="castingsPhotos view">
<h2><?php echo __('Castings Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($castingsPhoto['CastingsPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsPhoto['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $castingsPhoto['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $castingsPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($castingsPhoto['CastingsPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($castingsPhoto['CastingsPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $castingsPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Castings Photo'), array('action' => 'edit', $castingsPhoto['CastingsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Castings Photo'), array('action' => 'delete', $castingsPhoto['CastingsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $castingsPhoto['CastingsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Castings Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

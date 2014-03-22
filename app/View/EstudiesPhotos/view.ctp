<div class="estudiesPhotos view">
<h2><?php echo __('Estudies Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estudiesPhoto['EstudiesPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Practiceroom Id'); ?></dt>
		<dd>
			<?php echo h($estudiesPhoto['EstudiesPhoto']['estudy_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $estudiesPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estudiesPhoto['EstudiesPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estudiesPhoto['EstudiesPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $estudiesPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estudies Photo'), array('action' => 'edit', $estudiesPhoto['EstudiesPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estudies Photo'), array('action' => 'delete', $estudiesPhoto['EstudiesPhoto']['id']), null, __('Are you sure you want to delete # %s?', $estudiesPhoto['EstudiesPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudies Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

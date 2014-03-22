<div class="callsPhotos view">
<h2><?php echo __('Calls Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($callsPhoto['CallsPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Call'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsPhoto['Call']['title'], array('controller' => 'calls', 'action' => 'view', $callsPhoto['Call']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $callsPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($callsPhoto['CallsPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($callsPhoto['CallsPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $callsPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calls Photo'), array('action' => 'edit', $callsPhoto['CallsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calls Photo'), array('action' => 'delete', $callsPhoto['CallsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $callsPhoto['CallsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calls Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

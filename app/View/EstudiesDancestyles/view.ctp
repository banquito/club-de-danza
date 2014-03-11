<div class="estudiesDancestyles view">
<h2><?php echo __('Estudies Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estudiesDancestyle['EstudiesDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estudiesDancestyle['EstudiesDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estudiesDancestyle['EstudiesDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estudies'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesDancestyle['Estudies']['name'], array('controller' => 'estudies', 'action' => 'view', $estudiesDancestyle['Estudies']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $estudiesDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $estudiesDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estudies Dancestyle'), array('action' => 'edit', $estudiesDancestyle['EstudiesDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estudies Dancestyle'), array('action' => 'delete', $estudiesDancestyle['EstudiesDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $estudiesDancestyle['EstudiesDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudies Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudies'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

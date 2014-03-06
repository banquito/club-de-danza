<div class="callsProfessions view">
<h2><?php echo __('Calls Profession'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($callsProfession['CallsProfession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($callsProfession['CallsProfession']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($callsProfession['CallsProfession']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Call'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsProfession['Call']['title'], array('controller' => 'calls', 'action' => 'view', $callsProfession['Call']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profession'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsProfession['Profession']['name'], array('controller' => 'professions', 'action' => 'view', $callsProfession['Profession']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($callsProfession['User']['name'], array('controller' => 'users', 'action' => 'view', $callsProfession['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calls Profession'), array('action' => 'edit', $callsProfession['CallsProfession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calls Profession'), array('action' => 'delete', $callsProfession['CallsProfession']['id']), null, __('Are you sure you want to delete # %s?', $callsProfession['CallsProfession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls Professions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calls Profession'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

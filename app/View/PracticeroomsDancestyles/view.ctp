<div class="practiceroomsDancestyles view">
<h2><?php echo __('Practicerooms Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($practiceroomsDancestyle['PracticeroomsDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($practiceroomsDancestyle['PracticeroomsDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($practiceroomsDancestyle['PracticeroomsDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Practicerooms'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsDancestyle['Practicerooms']['name'], array('controller' => 'practicerooms', 'action' => 'view', $practiceroomsDancestyle['Practicerooms']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $practiceroomsDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroomsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroomsDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Practicerooms Dancestyle'), array('action' => 'edit', $practiceroomsDancestyle['PracticeroomsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Practicerooms Dancestyle'), array('action' => 'delete', $practiceroomsDancestyle['PracticeroomsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $practiceroomsDancestyle['PracticeroomsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practicerooms Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practicerooms'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

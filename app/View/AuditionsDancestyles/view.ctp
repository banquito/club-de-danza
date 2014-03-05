<div class="auditionsDancestyles view">
<h2><?php echo __('Auditions Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($auditionsDancestyle['AuditionsDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($auditionsDancestyle['AuditionsDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($auditionsDancestyle['AuditionsDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsDancestyle['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $auditionsDancestyle['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $auditionsDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $auditionsDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Auditions Dancestyle'), array('action' => 'edit', $auditionsDancestyle['AuditionsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Auditions Dancestyle'), array('action' => 'delete', $auditionsDancestyle['AuditionsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $auditionsDancestyle['AuditionsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auditions Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

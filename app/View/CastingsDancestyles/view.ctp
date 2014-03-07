<div class="castingsDancestyles view">
<h2><?php echo __('Castings Dancestyle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($castingsDancestyle['CastingsDancestyle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($castingsDancestyle['CastingsDancestyle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($castingsDancestyle['CastingsDancestyle']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsDancestyle['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $castingsDancestyle['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dancestyle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsDancestyle['Dancestyle']['name'], array('controller' => 'dancestyles', 'action' => 'view', $castingsDancestyle['Dancestyle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsDancestyle['User']['name'], array('controller' => 'users', 'action' => 'view', $castingsDancestyle['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Castings Dancestyle'), array('action' => 'edit', $castingsDancestyle['CastingsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Castings Dancestyle'), array('action' => 'delete', $castingsDancestyle['CastingsDancestyle']['id']), null, __('Are you sure you want to delete # %s?', $castingsDancestyle['CastingsDancestyle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings Dancestyles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Castings Dancestyle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

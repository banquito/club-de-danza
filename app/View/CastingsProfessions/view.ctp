<div class="castingsProfessions view">
<h2><?php echo __('Castings Profession'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($castingsProfession['CastingsProfession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($castingsProfession['CastingsProfession']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($castingsProfession['CastingsProfession']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsProfession['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $castingsProfession['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profession'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsProfession['Profession']['name'], array('controller' => 'professions', 'action' => 'view', $castingsProfession['Profession']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($castingsProfession['User']['name'], array('controller' => 'users', 'action' => 'view', $castingsProfession['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Castings Profession'), array('action' => 'edit', $castingsProfession['CastingsProfession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Castings Profession'), array('action' => 'delete', $castingsProfession['CastingsProfession']['id']), null, __('Are you sure you want to delete # %s?', $castingsProfession['CastingsProfession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings Professions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Castings Profession'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

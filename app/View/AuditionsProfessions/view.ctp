<div class="auditionsProfessions view">
<h2><?php echo __('Auditions Profession'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($auditionsProfession['AuditionsProfession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($auditionsProfession['AuditionsProfession']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($auditionsProfession['AuditionsProfession']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsProfession['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $auditionsProfession['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profession'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsProfession['Profession']['name'], array('controller' => 'professions', 'action' => 'view', $auditionsProfession['Profession']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsProfession['User']['name'], array('controller' => 'users', 'action' => 'view', $auditionsProfession['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Auditions Profession'), array('action' => 'edit', $auditionsProfession['AuditionsProfession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Auditions Profession'), array('action' => 'delete', $auditionsProfession['AuditionsProfession']['id']), null, __('Are you sure you want to delete # %s?', $auditionsProfession['AuditionsProfession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions Professions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auditions Profession'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

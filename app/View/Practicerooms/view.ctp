<div class="practicerooms view">
<h2><?php echo __('Practiceroom'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timetable'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['timetable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($practiceroom['Practiceroom']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroom['State']['name'], array('controller' => 'states', 'action' => 'view', $practiceroom['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroom['User']['name'], array('controller' => 'users', 'action' => 'view', $practiceroom['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($practiceroom['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $practiceroom['Room']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Practiceroom'), array('action' => 'edit', $practiceroom['Practiceroom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Practiceroom'), array('action' => 'delete', $practiceroom['Practiceroom']['id']), null, __('Are you sure you want to delete # %s?', $practiceroom['Practiceroom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Dancestyles'); ?></h3>
	<?php if (!empty($practiceroom['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($practiceroom['Dancestyle'] as $dancestyle): ?>
		<tr>
			<td><?php echo $dancestyle['id']; ?></td>
			<td><?php echo $dancestyle['name']; ?></td>
			<td><?php echo $dancestyle['created']; ?></td>
			<td><?php echo $dancestyle['modified']; ?></td>
			<td><?php echo $dancestyle['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'dancestyles', 'action' => 'view', $dancestyle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'dancestyles', 'action' => 'edit', $dancestyle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dancestyles', 'action' => 'delete', $dancestyle['id']), null, __('Are you sure you want to delete # %s?', $dancestyle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

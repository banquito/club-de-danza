<div class="timetables view">
<h2><?php echo __('Timetable'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($timetable['Timetable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($timetable['Timetable']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($timetable['Timetable']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($timetable['Timetable']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Timetable'), array('action' => 'edit', $timetable['Timetable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Timetable'), array('action' => 'delete', $timetable['Timetable']['id']), null, __('Are you sure you want to delete # %s?', $timetable['Timetable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Timetables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timetable'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Practicerooms'), array('controller' => 'practicerooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Practicerooms'); ?></h3>
	<?php if (!empty($timetable['Practiceroom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Paid'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($timetable['Practiceroom'] as $practiceroom): ?>
		<tr>
			<td><?php echo $practiceroom['id']; ?></td>
			<td><?php echo $practiceroom['name']; ?></td>
			<td><?php echo $practiceroom['description']; ?></td>
			<td><?php echo $practiceroom['image']; ?></td>
			<td><?php echo $practiceroom['street']; ?></td>
			<td><?php echo $practiceroom['floor']; ?></td>
			<td><?php echo $practiceroom['department']; ?></td>
			<td><?php echo $practiceroom['website']; ?></td>
			<td><?php echo $practiceroom['email']; ?></td>
			<td><?php echo $practiceroom['phone']; ?></td>
			<td><?php echo $practiceroom['paid']; ?></td>
			<td><?php echo $practiceroom['created']; ?></td>
			<td><?php echo $practiceroom['modified']; ?></td>
			<td><?php echo $practiceroom['state_id']; ?></td>
			<td><?php echo $practiceroom['user_id']; ?></td>
			<td><?php echo $practiceroom['room_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'practicerooms', 'action' => 'view', $practiceroom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'practicerooms', 'action' => 'edit', $practiceroom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'practicerooms', 'action' => 'delete', $practiceroom['id']), null, __('Are you sure you want to delete # %s?', $practiceroom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Practiceroom'), array('controller' => 'practicerooms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

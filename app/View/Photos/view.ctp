<div class="photos view">
<h2><?php echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Photo'), array('action' => 'edit', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Estudies'); ?></h3>
	<?php if (!empty($photo['Estudy'])): ?>
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
		<th><?php echo __('Timetable'); ?></th>
		<th><?php echo __('Paid'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($photo['Estudy'] as $estudy): ?>
		<tr>
			<td><?php echo $estudy['id']; ?></td>
			<td><?php echo $estudy['name']; ?></td>
			<td><?php echo $estudy['description']; ?></td>
			<td><?php echo $estudy['image']; ?></td>
			<td><?php echo $estudy['street']; ?></td>
			<td><?php echo $estudy['floor']; ?></td>
			<td><?php echo $estudy['department']; ?></td>
			<td><?php echo $estudy['website']; ?></td>
			<td><?php echo $estudy['email']; ?></td>
			<td><?php echo $estudy['phone']; ?></td>
			<td><?php echo $estudy['timetable']; ?></td>
			<td><?php echo $estudy['paid']; ?></td>
			<td><?php echo $estudy['created']; ?></td>
			<td><?php echo $estudy['modified']; ?></td>
			<td><?php echo $estudy['state_id']; ?></td>
			<td><?php echo $estudy['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'estudies', 'action' => 'view', $estudy['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'estudies', 'action' => 'edit', $estudy['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'estudies', 'action' => 'delete', $estudy['id']), null, __('Are you sure you want to delete # %s?', $estudy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

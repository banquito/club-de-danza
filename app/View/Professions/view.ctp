<div class="professions view">
<h2><?php echo __('Profession'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profession['Profession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($profession['Profession']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($profession['Profession']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($profession['Profession']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profession['User']['name'], array('controller' => 'users', 'action' => 'view', $profession['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profession'), array('action' => 'edit', $profession['Profession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profession'), array('action' => 'delete', $profession['Profession']['id']), null, __('Are you sure you want to delete # %s?', $profession['Profession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Auditions'); ?></h3>
	<?php if (!empty($profession['Audition'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Company'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Age-start'); ?></th>
		<th><?php echo __('Age-end'); ?></th>
		<th><?php echo __('Audition-date'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Inscription-star'); ?></th>
		<th><?php echo __('Inscription-end'); ?></th>
		<th><?php echo __('Inscription-place'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($profession['Audition'] as $audition): ?>
		<tr>
			<td><?php echo $audition['id']; ?></td>
			<td><?php echo $audition['title']; ?></td>
			<td><?php echo $audition['description']; ?></td>
			<td><?php echo $audition['image']; ?></td>
			<td><?php echo $audition['company']; ?></td>
			<td><?php echo $audition['gender']; ?></td>
			<td><?php echo $audition['age-start']; ?></td>
			<td><?php echo $audition['age-end']; ?></td>
			<td><?php echo $audition['audition-date']; ?></td>
			<td><?php echo $audition['street']; ?></td>
			<td><?php echo $audition['floor']; ?></td>
			<td><?php echo $audition['department']; ?></td>
			<td><?php echo $audition['inscription-star']; ?></td>
			<td><?php echo $audition['inscription-end']; ?></td>
			<td><?php echo $audition['inscription-place']; ?></td>
			<td><?php echo $audition['website']; ?></td>
			<td><?php echo $audition['email']; ?></td>
			<td><?php echo $audition['phone']; ?></td>
			<td><?php echo $audition['created']; ?></td>
			<td><?php echo $audition['modified']; ?></td>
			<td><?php echo $audition['state_id']; ?></td>
			<td><?php echo $audition['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'auditions', 'action' => 'view', $audition['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'auditions', 'action' => 'edit', $audition['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'auditions', 'action' => 'delete', $audition['id']), null, __('Are you sure you want to delete # %s?', $audition['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

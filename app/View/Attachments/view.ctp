<div class="attachments view">
<h2><?php echo __('Attachment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachment'), array('action' => 'edit', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachment'), array('action' => 'delete', $attachment['Attachment']['id']), null, __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('controller' => 'calls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings'), array('controller' => 'castings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casting'), array('controller' => 'castings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Auditions'); ?></h3>
	<?php if (!empty($attachment['Audition'])): ?>
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
		<th><?php echo __('Element-date'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Inscription-start'); ?></th>
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
	<?php foreach ($attachment['Audition'] as $audition): ?>
		<tr>
			<td><?php echo $audition['id']; ?></td>
			<td><?php echo $audition['title']; ?></td>
			<td><?php echo $audition['description']; ?></td>
			<td><?php echo $audition['image']; ?></td>
			<td><?php echo $audition['company']; ?></td>
			<td><?php echo $audition['gender']; ?></td>
			<td><?php echo $audition['age-start']; ?></td>
			<td><?php echo $audition['age-end']; ?></td>
			<td><?php echo $audition['element-date']; ?></td>
			<td><?php echo $audition['street']; ?></td>
			<td><?php echo $audition['floor']; ?></td>
			<td><?php echo $audition['department']; ?></td>
			<td><?php echo $audition['inscription-start']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Calls'); ?></h3>
	<?php if (!empty($attachment['Call'])): ?>
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
		<th><?php echo __('Element-date'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Inscription-start'); ?></th>
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
	<?php foreach ($attachment['Call'] as $call): ?>
		<tr>
			<td><?php echo $call['id']; ?></td>
			<td><?php echo $call['title']; ?></td>
			<td><?php echo $call['description']; ?></td>
			<td><?php echo $call['image']; ?></td>
			<td><?php echo $call['company']; ?></td>
			<td><?php echo $call['gender']; ?></td>
			<td><?php echo $call['age-start']; ?></td>
			<td><?php echo $call['age-end']; ?></td>
			<td><?php echo $call['element-date']; ?></td>
			<td><?php echo $call['street']; ?></td>
			<td><?php echo $call['floor']; ?></td>
			<td><?php echo $call['department']; ?></td>
			<td><?php echo $call['inscription-start']; ?></td>
			<td><?php echo $call['inscription-end']; ?></td>
			<td><?php echo $call['inscription-place']; ?></td>
			<td><?php echo $call['website']; ?></td>
			<td><?php echo $call['email']; ?></td>
			<td><?php echo $call['phone']; ?></td>
			<td><?php echo $call['created']; ?></td>
			<td><?php echo $call['modified']; ?></td>
			<td><?php echo $call['state_id']; ?></td>
			<td><?php echo $call['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'calls', 'action' => 'view', $call['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'calls', 'action' => 'edit', $call['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'calls', 'action' => 'delete', $call['id']), null, __('Are you sure you want to delete # %s?', $call['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Call'), array('controller' => 'calls', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Castings'); ?></h3>
	<?php if (!empty($attachment['Casting'])): ?>
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
		<th><?php echo __('Element-date'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Inscription-start'); ?></th>
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
	<?php foreach ($attachment['Casting'] as $casting): ?>
		<tr>
			<td><?php echo $casting['id']; ?></td>
			<td><?php echo $casting['title']; ?></td>
			<td><?php echo $casting['description']; ?></td>
			<td><?php echo $casting['image']; ?></td>
			<td><?php echo $casting['company']; ?></td>
			<td><?php echo $casting['gender']; ?></td>
			<td><?php echo $casting['age-start']; ?></td>
			<td><?php echo $casting['age-end']; ?></td>
			<td><?php echo $casting['element-date']; ?></td>
			<td><?php echo $casting['street']; ?></td>
			<td><?php echo $casting['floor']; ?></td>
			<td><?php echo $casting['department']; ?></td>
			<td><?php echo $casting['inscription-start']; ?></td>
			<td><?php echo $casting['inscription-end']; ?></td>
			<td><?php echo $casting['inscription-place']; ?></td>
			<td><?php echo $casting['website']; ?></td>
			<td><?php echo $casting['email']; ?></td>
			<td><?php echo $casting['phone']; ?></td>
			<td><?php echo $casting['created']; ?></td>
			<td><?php echo $casting['modified']; ?></td>
			<td><?php echo $casting['state_id']; ?></td>
			<td><?php echo $casting['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'castings', 'action' => 'view', $casting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'castings', 'action' => 'edit', $casting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'castings', 'action' => 'delete', $casting['id']), null, __('Are you sure you want to delete # %s?', $casting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casting'), array('controller' => 'castings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Jobs'); ?></h3>
	<?php if (!empty($attachment['Job'])): ?>
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
		<th><?php echo __('Element-date'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Floor'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Inscription-start'); ?></th>
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
	<?php foreach ($attachment['Job'] as $job): ?>
		<tr>
			<td><?php echo $job['id']; ?></td>
			<td><?php echo $job['title']; ?></td>
			<td><?php echo $job['description']; ?></td>
			<td><?php echo $job['image']; ?></td>
			<td><?php echo $job['company']; ?></td>
			<td><?php echo $job['gender']; ?></td>
			<td><?php echo $job['age-start']; ?></td>
			<td><?php echo $job['age-end']; ?></td>
			<td><?php echo $job['element-date']; ?></td>
			<td><?php echo $job['street']; ?></td>
			<td><?php echo $job['floor']; ?></td>
			<td><?php echo $job['department']; ?></td>
			<td><?php echo $job['inscription-start']; ?></td>
			<td><?php echo $job['inscription-end']; ?></td>
			<td><?php echo $job['inscription-place']; ?></td>
			<td><?php echo $job['website']; ?></td>
			<td><?php echo $job['email']; ?></td>
			<td><?php echo $job['phone']; ?></td>
			<td><?php echo $job['created']; ?></td>
			<td><?php echo $job['modified']; ?></td>
			<td><?php echo $job['state_id']; ?></td>
			<td><?php echo $job['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jobs', 'action' => 'view', $job['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'jobs', 'action' => 'edit', $job['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'jobs', 'action' => 'delete', $job['id']), null, __('Are you sure you want to delete # %s?', $job['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

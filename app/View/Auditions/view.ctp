<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($audition['Audition']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<?php echo $this->Html->image('auditions/'.$audition['Audition']['image']); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo h($audition['Audition']['description']); ?>
			</div>
		</div>
	</div>
	
	<div class="col-sm-6">
		<p><?php echo h($audition['Audition']['company']); ?></p>
		<p><?php echo h($audition['Audition']['gender']); ?></p>
		<p>
			Desde <?php echo h($audition['Audition']['age-start']); ?> 
			hasta <?php echo h($audition['Audition']['age-end']); ?>
		</p>
		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['audition-date']); ?></p>
		<p>
			Lugar: <?php echo h($audition['Audition']['street']); ?>, 
			piso: <?php echo h($audition['Audition']['floor']); ?>, 
			depto.: <?php echo h($audition['Audition']['department']); ?>
		</p>
		<p>
			Inscripción: desde el <?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['inscription-start']); ?>, 
			hasta el <?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['inscription-end']); ?>, 
			en <?php echo h($audition['Audition']['inscription-place']); ?>
		</p>
		<p>
			Contacto: <?php echo h($audition['Audition']['email']); ?>, 
			<?php echo h($audition['Audition']['website']); ?>, 
			<?php echo h($audition['Audition']['phone']); ?>
		</p>
	</div>
</div>


<!-- 
<div class="auditions view">
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-start'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['age-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-end'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['age-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition-date'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['audition-date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-start'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['inscription-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-end'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['inscription-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-place'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['inscription-place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($audition['Audition']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($audition['State']['name'], array('controller' => 'states', 'action' => 'view', $audition['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($audition['User']['name'], array('controller' => 'users', 'action' => 'view', $audition['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Audition'), array('action' => 'edit', $audition['Audition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Audition'), array('action' => 'delete', $audition['Audition']['id']), null, __('Are you sure you want to delete # %s?', $audition['Audition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Dancestyles'); ?></h3>
	<?php if (!empty($audition['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($audition['Dancestyle'] as $dancestyle): ?>
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
<div class="related">
	<h3><?php echo __('Related Professions'); ?></h3>
	<?php if (!empty($audition['Profession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($audition['Profession'] as $profession): ?>
		<tr>
			<td><?php echo $profession['id']; ?></td>
			<td><?php echo $profession['name']; ?></td>
			<td><?php echo $profession['created']; ?></td>
			<td><?php echo $profession['modified']; ?></td>
			<td><?php echo $profession['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'professions', 'action' => 'view', $profession['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'professions', 'action' => 'edit', $profession['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'professions', 'action' => 'delete', $profession['id']), null, __('Are you sure you want to delete # %s?', $profession['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
 -->
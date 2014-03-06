<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($call['Call']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<?php 
				echo $this->Html->image('calls/'.$call['Call']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo $call['Call']['description']; ?>
			</div>
		</div>
	</div>
	
	<div class="col-sm-6">
		<p><?php echo h($call['Call']['company']); ?></p>
		<p><?php echo h($call['Call']['gender']); ?></p>
		<p>
			Desde <?php echo h($call['Call']['age-start']); ?> 
			hasta <?php echo h($call['Call']['age-end']); ?>
		</p>
		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $call['Call']['call-date']); ?></p>
		<p>
			Lugar: <?php echo h($call['Call']['street']); ?>, 
			piso: <?php echo h($call['Call']['floor']); ?>, 
			depto.: <?php echo h($call['Call']['department']); ?>
		</p>
		<p>
			Inscripción: desde el <?php echo $this -> Time -> format('d-m-Y H:i', $call['Call']['inscription-start']); ?>, 
			hasta el <?php echo $this -> Time -> format('d-m-Y H:i', $call['Call']['inscription-end']); ?>, 
			en <?php echo h($call['Call']['inscription-place']); ?>
		</p>
		<p>
			Contacto: <?php echo h($call['Call']['email']); ?>, 
			<?php echo h($call['Call']['website']); ?>, 
			<?php echo h($call['Call']['phone']); ?>
		</p>
	</div>
</div>
<!-- 
<div class="calls view">
<h2><?php echo __('Call'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($call['Call']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($call['Call']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($call['Call']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($call['Call']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($call['Call']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($call['Call']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-start'); ?></dt>
		<dd>
			<?php echo h($call['Call']['age-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-end'); ?></dt>
		<dd>
			<?php echo h($call['Call']['age-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Call-date'); ?></dt>
		<dd>
			<?php echo h($call['Call']['call-date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($call['Call']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($call['Call']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($call['Call']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-date-start'); ?></dt>
		<dd>
			<?php echo h($call['Call']['inscription-date-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-date-end'); ?></dt>
		<dd>
			<?php echo h($call['Call']['inscription-date-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-place'); ?></dt>
		<dd>
			<?php echo h($call['Call']['inscription-place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($call['Call']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($call['Call']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($call['Call']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($call['Call']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($call['Call']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($call['State']['name'], array('controller' => 'states', 'action' => 'view', $call['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($call['User']['name'], array('controller' => 'users', 'action' => 'view', $call['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Call'), array('action' => 'edit', $call['Call']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Call'), array('action' => 'delete', $call['Call']['id']), null, __('Are you sure you want to delete # %s?', $call['Call']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calls'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Call'), array('action' => 'add')); ?> </li>
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
	<?php if (!empty($call['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($call['Dancestyle'] as $dancestyle): ?>
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
	<?php if (!empty($call['Profession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($call['Profession'] as $profession): ?>
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
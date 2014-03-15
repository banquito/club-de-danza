<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($job['Job']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<?php 
				echo $this->Html->image('jobs/'.$job['Job']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>
	</div>
	
	<div class="col-sm-6 view-info">
		<p><?php echo h($job['Job']['company']); ?></p>
		<p>
			<?php 
			switch ($job['Job']['gender']) {
				case User::FEMENINO:
					echo "Femenino";
					break;
				case User::MASCULINO:
					echo "Masculino";
					break;
				default:
					echo "Otro";
					break;
			}
			?>
		</p>
		<p>
			Desde <?php echo h($job['Job']['age-start']); ?> 
			hasta <?php echo h($job['Job']['age-end']); ?>
		</p>
		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $job['Job']['element-date']); ?></p>
		<p>
			Lugar: <?php echo h($job['Job']['street']); ?>, 
			piso: <?php echo h($job['Job']['floor']); ?>, 
			depto.: <?php echo h($job['Job']['department']); ?>
		</p>
		<p>
			Inscripción: desde el <?php echo $this -> Time -> format('d-m-Y H:i', $job['Job']['inscription-start']); ?>, 
			hasta el <?php echo $this -> Time -> format('d-m-Y H:i', $job['Job']['inscription-end']); ?>, 
			en <?php echo h($job['Job']['inscription-place']); ?>
		</p>
		<p>
			Contacto: <?php echo h($job['Job']['email']); ?>, 
			<?php echo h($job['Job']['website']); ?>, 
			<?php echo h($job['Job']['phone']); ?>
		</p>
	</div>
</div>

<!-- Descripción -->
<div class="row">
	<div class="col-sm-12">
		<?php echo $job['Job']['description']; ?>
	</div>
</div>

<!-- Attachments -->
<?php if(isset($job['Attachment']) && sizeof($job['Attachment']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<h2>Archivos</h2>
			<?php
			foreach ($job['Attachment'] as $key => $attachment):
				$fileAux = pathinfo($attachment['name']);
				echo '<p>';
				echo $this->Html->link($fileAux['filename']
					, Router::url('/files/attachments/').$attachment['file']
					, array('target' => '_blank')
				);
				echo '</p>';
			endforeach;
			?>
		</div>
	</div>
<?php endif; ?>

<!-- Videos -->
<?php if(isset($job['Video']) && sizeof($job['Video']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<?php
				foreach ($job['Video'] as $key => $video):
					echo '<p class="text-center">'.$video['file'].'</p>';
				endforeach;
			?>
		</div>
	</div>
<?php endif; ?>

<!-- <div class="jobs view">
<h2><?php echo __('Job'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($job['Job']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($job['Job']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($job['Job']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($job['Job']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($job['Job']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-start'); ?></dt>
		<dd>
			<?php echo h($job['Job']['age-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-end'); ?></dt>
		<dd>
			<?php echo h($job['Job']['age-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job-date'); ?></dt>
		<dd>
			<?php echo h($job['Job']['element-date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($job['Job']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($job['Job']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($job['Job']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-start'); ?></dt>
		<dd>
			<?php echo h($job['Job']['inscription-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-end'); ?></dt>
		<dd>
			<?php echo h($job['Job']['inscription-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-place'); ?></dt>
		<dd>
			<?php echo h($job['Job']['inscription-place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($job['Job']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($job['Job']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($job['Job']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($job['Job']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($job['Job']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($job['State']['name'], array('controller' => 'states', 'action' => 'view', $job['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($job['User']['name'], array('controller' => 'users', 'action' => 'view', $job['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Job'), array('action' => 'edit', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Job'), array('action' => 'delete', $job['Job']['id']), null, __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?> </li>
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
	<?php if (!empty($job['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($job['Dancestyle'] as $dancestyle): ?>
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
	<?php if (!empty($job['Profession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($job['Profession'] as $profession): ?>
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
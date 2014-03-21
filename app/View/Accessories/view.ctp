<?php //debug($accessory, $showHtml = null, $showFrom = true) ?>

<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($accessory['Accessory']['name']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<?php
				echo $this->Html->image('accessories/'.$accessory['Accessory']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="text-description">
					<?php echo $accessory['Accessory']['description']; ?>
				</div>
			</div>
		</div>
		
		<!-- Videos -->
		<?php if(isset($accessory['Video']) && sizeof($accessory['Video']) > 0): ?>
			<div class="row">
				<div class="col-sm-12">
					<?php
						foreach ($accessory['Video'] as $key => $video):
							echo '<p class="text-center">'.$video['file'].'</p>';
						endforeach;
					?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	
	<!-- Info -->
	<div class="col-sm-6 view-info">
		<p class="text-pink"><?php echo h($accessory['Accessory']['products']); ?></p>
		
		<p class="direccion">
			Lugar: 
			<?php echo h($accessory['Accessory']['street']); ?>
			
			<?php if($accessory['Accessory']['floor'] != ''): ?>
				, piso: <?php echo h($accessory['Accessory']['floor']); ?>
			<?php endif; ?>
			
			<?php if($accessory['Accessory']['department'] != ''): ?>
				, depto.: <?php echo h($accessory['Accessory']['department']); ?>
			<?php endif; ?>
		</p>

		<?php if(sizeof($accessory['Dancestyle']) > 0): ?>
			<p>
			<?php foreach ($accessory['Dancestyle'] as $key => $dancestyle) {
				if($key != 0) echo ', ';
				echo $dancestyle['name'];
			} ?>
			</p>
		<?php endif; ?>

		<p>
			Horario de atención: <?php echo h($accessory['Accessory']['schedule']); ?>
		</p>
		
		<p class="text-pink">
			Contacto: <?php echo h($accessory['Accessory']['email']); ?>, 
			<?php echo h($accessory['Accessory']['website']); ?>, 
			<?php echo h($accessory['Accessory']['phone']); ?>
		</p>
	</div>
</div>


<!-- <div class="accessories view">
<h2><?php echo __('Accessory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Products'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['products']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accessory['Accessory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessory['State']['name'], array('controller' => 'states', 'action' => 'view', $accessory['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accessory['User']['name'], array('controller' => 'users', 'action' => 'view', $accessory['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accessory'), array('action' => 'edit', $accessory['Accessory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accessory'), array('action' => 'delete', $accessory['Accessory']['id']), null, __('Are you sure you want to delete # %s?', $accessory['Accessory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Dancestyles'); ?></h3>
	<?php if (!empty($accessory['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($accessory['Dancestyle'] as $dancestyle): ?>
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
 -->
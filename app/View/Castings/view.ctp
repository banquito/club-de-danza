<?php echo $this->Html->css('pages/audiciones', array('inline' => false)); ?>
<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($casting['Casting']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<!--<div class="row">
			<div class="col-sm-12">
				<?php 
				echo $this->Html->image('castings/'.$casting['Casting']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>-->
		<div class="row">
			<div class="col-sm-12">
				<?php if(isset($casting['Photo']) && sizeof($casting['Photo']) > 0): ?>
					<div id="slider-photo" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
					    	<li data-target="#slider-photo" data-slide-to="0" class="active"></li>
					    	<?php foreach ($casting['Photo'] as $key => $photo): ?>
								<li data-target="#slider-photo" data-slide-to="<?php echo ($key+1); ?>" ></li>
							<?php endforeach; ?>
						</ol>
					    
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<?php echo $this->Html->image('castings/'.$casting['Casting']['image'], array('class'=>'image-center'));?>
					            <div class="carousel-caption">
					            	<h3>
					                	<a><?php echo $casting['Casting']['image']; ?></a>
									</h3>
					            </div>
							</div>
							<?php foreach ($casting['Photo'] as $key => $photo): ?>
								<!--<div class="item<?php echo ($key == 0) ? ' active' : ''; ?>">-->
								<div class="item">
									<?php echo $this->Html->image('photos/' . $photo['file'], array('class' => 'image-center')); ?>
					                <div class="carousel-caption">
					                    <h3>
					                        <a><?php echo $photo['name']; ?></a>
					                    </h3>
					                </div>
								</div>
							<?php endforeach; ?>
						</div>
					
						<!-- Controls -->
						<a class="left carousel-control" href="#slider-photo" data-slide="prev">
							<span class="fa fa-angle-left fa-2x"></span>
						</a>
						<a class="right carousel-control" href="#slider-photo" data-slide="next">
							<span class="fa fa-angle-right fa-2x"></span>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<div class="col-sm-6 view-info">
		<p class="text-pink"><?php echo h($casting['Casting']['company']); ?></p>
		<?php if(sizeof($casting['Profession']) > 0): ?>
			<p>
			<?php foreach ($casting['Profession'] as $key => $profession) {
				if($key != 0) echo ', ';
				echo $profession['name'];
			} ?>
			</p>
		<?php endif; ?>
		<p>
			<?php 
			switch ($casting['Casting']['gender']) {
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
			Desde <?php echo h($casting['Casting']['age-start']); ?> 
			hasta <?php echo h($casting['Casting']['age-end']); ?>
			años
		</p>

		<?php if(sizeof($casting['Dancestyle']) > 0): ?>
			<p>
			<?php foreach ($casting['Dancestyle'] as $key => $dancestyle) {
				if($key != 0) echo ', ';
				echo $dancestyle['name'];
			} ?>
			</p>
		<?php endif; ?>

		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $casting['Casting']['element-date']); ?></p>
		
		<p class="direccion">
			Lugar:
			<?php echo h($casting['Casting']['street']); ?>
			
			<?php if($casting['Casting']['floor'] != ''): ?>
				, piso: <?php echo h($casting['Casting']['floor']); ?>
			<?php endif; ?>
			
			<?php if($casting['Casting']['department'] != ''): ?>
				, depto.: <?php echo h($casting['Casting']['department']); ?>
			<?php endif; ?>
		</p>
		
		<p>
			Inscripción: desde el <?php echo $this -> Time -> format('d-m-Y H:i', $casting['Casting']['inscription-start']); ?>, 
			hasta el <?php echo $this -> Time -> format('d-m-Y H:i', $casting['Casting']['inscription-end']); ?>, 
			en <?php echo h($casting['Casting']['inscription-place']); ?>
		</p>
		<p>
			Contacto: <?php echo h($casting['Casting']['email']); ?>, 
			<?php echo h($casting['Casting']['website']); ?>, 
			<?php echo h($casting['Casting']['phone']); ?>
		</p>
	</div>
</div>

<!-- Descripción -->
<div class="row">
	<div class="col-sm-12">
		<div class="text-description">
			<?php echo $casting['Casting']['description']; ?>
		</div>
	</div>
</div>

<!-- Attachments -->
<?php if(isset($casting['Attachment']) && sizeof($casting['Attachment']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<?php
			foreach ($casting['Attachment'] as $key => $attachment):
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
<?php if(isset($casting['Video']) && sizeof($casting['Video']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<?php
				foreach ($casting['Video'] as $key => $video):
					echo '<p class="text-center">'.$video['file'].'</p>';
				endforeach;
			?>
		</div>
	</div>
<?php endif; ?>

<!-- <div class="castings view">
<h2><?php echo __('Casting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-start'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['age-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age-end'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['age-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Casting-date'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['element-date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-start'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['inscription-start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-end'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['inscription-end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inscription-place'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['inscription-place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($casting['Casting']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($casting['State']['name'], array('controller' => 'states', 'action' => 'view', $casting['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($casting['User']['name'], array('controller' => 'users', 'action' => 'view', $casting['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casting'), array('action' => 'edit', $casting['Casting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Casting'), array('action' => 'delete', $casting['Casting']['id']), null, __('Are you sure you want to delete # %s?', $casting['Casting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Castings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casting'), array('action' => 'add')); ?> </li>
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
	<?php if (!empty($casting['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($casting['Dancestyle'] as $dancestyle): ?>
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
	<?php if (!empty($casting['Profession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($casting['Profession'] as $profession): ?>
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
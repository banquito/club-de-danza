<?php echo $this->Html->css('pages/audiciones', array('inline' => false)); ?>
<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($call['Call']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<!--<div class="row">
			<div class="col-sm-12">
				<?php 
				echo $this->Html->image('calls/'.$call['Call']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>-->
		<div class="row">
			<div class="col-sm-12">
				<!-- Sliders -->
				<?php if(isset($call['Photo']) && sizeof($call['Photo']) > 0): ?>
					<div id="slider-photo" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
					    	<li data-target="#slider-photo" data-slide-to="0" class="active"></li>
					    	<?php foreach ($call['Photo'] as $key => $photo): ?>
								<li data-target="#slider-photo" data-slide-to="<?php echo ($key+1); ?>" ></li>
							<?php endforeach; ?>
						</ol>
					    
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<?php echo $this->Html->image('calls/'.$call['Call']['image'], array('class'=>'image-center'));?>
					            <div class="carousel-caption">
					            	<h3>
					                	<a><?php echo $call['Call']['image']; ?></a>
									</h3>
					            </div>
							</div>
							<?php foreach ($call['Photo'] as $key => $photo): ?>
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
				<!-- Fin Sliders -->
			</div>
		</div>
	</div>
	
	<div class="col-sm-6 view-info">
		<p class="text-pink"><?php echo h($call['Call']['company']); ?></p>
		<?php if(sizeof($call['Profession']) > 0): ?>
			<p>
			<?php foreach ($call['Profession'] as $key => $profession) {
				if($key != 0) echo ', ';
				echo $profession['name'];
			} ?>
			</p>
		<?php endif; ?>
		<p>
			<?php 
			switch ($call['Call']['gender']) {
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
			Desde <?php echo h($call['Call']['age-start']); ?> 
			hasta <?php echo h($call['Call']['age-end']); ?>
			años
		</p>
		
		<?php if(sizeof($call['Dancestyle']) > 0): ?>
			<p>
			<?php foreach ($call['Dancestyle'] as $key => $dancestyle) {
				if($key != 0) echo ', ';
				echo $dancestyle['name'];
			} ?>
			</p>
		<?php endif; ?>

		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $call['Call']['element-date']); ?></p>
		
		<p class="direccion">
			Lugar:
			<?php echo h($call['Call']['street']); ?>
			
			<?php if($call['Call']['floor'] != ''): ?>
				, piso: <?php echo h($call['Call']['floor']); ?>
			<?php endif; ?>
			
			<?php if($call['Call']['department'] != ''): ?>
				, depto.: <?php echo h($call['Call']['department']); ?>
			<?php endif; ?>
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

<!-- Descripción -->
<div class="row">
	<div class="col-sm-12">
		<div class="text-description">
			<?php echo $call['Call']['description']; ?>
		</div>
	</div>
</div>

<!-- Attachments -->
<?php if(isset($call['Attachment']) && sizeof($call['Attachment']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<h2>Archivos</h2>
			<?php
			foreach ($call['Attachment'] as $key => $attachment):
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
<?php if(isset($call['Video']) && sizeof($call['Video']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<?php
				foreach ($call['Video'] as $key => $video):
					echo '<p class="text-center">'.$video['file'].'</p>';
				endforeach;
			?>
		</div>
	</div>
<?php endif; ?>


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
			<?php echo h($call['Call']['element-date']); ?>
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
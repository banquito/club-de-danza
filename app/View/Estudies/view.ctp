<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($estudy['Estudy']['name']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<!--<div class="row">
			<div class="col-sm-12">
				<?php
				echo $this->Html->image('estudies/'.$estudy['Estudy']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>-->
		<div class="row">
			<div class="col-sm-12">
				<!-- Sliders -->
				<?php if(isset($estudy['Photo']) && sizeof($estudy['Photo']) > 0): ?>
					<div id="slider-photo" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
					    	<li data-target="#slider-photo" data-slide-to="0" class="active"></li>
					    	<?php foreach ($estudy['Photo'] as $key => $photo): ?>
								<li data-target="#slider-photo" data-slide-to="<?php echo ($key+1); ?>" ></li>
							<?php endforeach; ?>
						</ol>
					    
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<?php echo $this->Html->image('estudies/'.$estudy['Estudy']['image'], array('class'=>'image-center'));?>
					            <div class="carousel-caption">
					            	<h3>
					                	<a><?php echo $estudy['Estudy']['image']; ?></a>
									</h3>
					            </div>
							</div>
							<?php foreach ($estudy['Photo'] as $key => $photo): ?>
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
				<?php else:?>
					<?php
						echo $this->Html->image('estudies/'.$estudy['Estudy']['image']
							, array('class'=>'img-responsive')
						);
					?>	
				<?php endif; ?>
				<!-- Fin Sliders -->
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="text-description">
					<?php echo $estudy['Estudy']['description']; ?>
				</div>
			</div>
		</div>
		
		<!-- Videos -->
		<?php if(isset($estudy['Video']) && sizeof($estudy['Video']) > 0): ?>
			<div class="row">
				<div class="col-sm-12">
					<?php
						foreach ($estudy['Video'] as $key => $video):
							echo '<p class="text-center">'.$video['file'].'</p>';
						endforeach;
					?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	
	<div class="col-sm-6">
		<div class="view-info">
			<p class="direccion">
				<?php echo h($estudy['Estudy']['street']); ?>
				
				<?php if($estudy['Estudy']['floor'] != ''): ?>
					, piso: <?php echo h($estudy['Estudy']['floor']); ?>
				<?php endif; ?>
				
				<?php if($estudy['Estudy']['department'] != ''): ?>
					, depto.: <?php echo h($estudy['Estudy']['department']); ?>
				<?php endif; ?>
			</p>
		
			<?php if(sizeof($estudy['Dancestyle']) > 0): ?>
				<p>
				<?php foreach ($estudy['Dancestyle'] as $key => $dancestyle) {
					if($key != 0) echo ', ';
					echo $dancestyle['name'];
				} ?>
				</p>
			<?php endif; ?>
		
			<p>
				Contacto: <?php echo h($estudy['Estudy']['email']); ?>, 
				<?php echo h($estudy['Estudy']['website']); ?>, 
				<?php echo h($estudy['Estudy']['phone']); ?>
			</p>
		</div>
		<div>
			<?php if(isset($estudy['Timetable']) && sizeof($estudy['Timetable']) > 0): ?>
				<p>
					<?php
					foreach ($estudy['Timetable'] as $key => $timetable):
						echo $this->Html->image('timetables/'.$timetable['file']
							, array('class' => 'img-responsive'));
					endforeach;
					?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</div>


<!-- <div class="estudies view">
<h2><?php echo __('Estudy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Floor'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timetable'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['timetable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estudy['Estudy']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudy['State']['name'], array('controller' => 'states', 'action' => 'view', $estudy['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudy['User']['name'], array('controller' => 'users', 'action' => 'view', $estudy['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estudy'), array('action' => 'edit', $estudy['Estudy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estudy'), array('action' => 'delete', $estudy['Estudy']['id']), null, __('Are you sure you want to delete # %s?', $estudy['Estudy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('action' => 'add')); ?> </li>
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
	<?php if (!empty($estudy['Dancestyle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($estudy['Dancestyle'] as $dancestyle): ?>
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
</div> -->
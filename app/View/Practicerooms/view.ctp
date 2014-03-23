<?php //debug($practiceroom, $showHtml = null, $showFrom = true) ?>

<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($practiceroom['Practiceroom']['name']); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<!--<div class="row">
			<div class="col-sm-12">
				<?php
				echo $this->Html->image('practicerooms/'.$practiceroom['Practiceroom']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>-->
		<div class="row">
			<div class="col-sm-12">
				<?php if(isset($practiceroom['Photo']) && sizeof($practiceroom['Photo']) > 0): ?>
					<div id="slider-photo" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
					    	<li data-target="#slider-photo" data-slide-to="0" class="active"></li>
					    	<?php foreach ($practiceroom['Photo'] as $key => $photo): ?>
								<li data-target="#slider-photo" data-slide-to="<?php echo ($key+1); ?>" ></li>
							<?php endforeach; ?>
						</ol>
					    
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<?php echo $this->Html->image('practicerooms/'.$practiceroom['Practiceroom']['image'], array('class'=>'image-center'));?>
					            <div class="carousel-caption">
					            	<h3>
					                	<a><?php echo $practiceroom['Practiceroom']['image']; ?></a>
									</h3>
					            </div>
							</div>
							<?php foreach ($practiceroom['Photo'] as $key => $photo): ?>
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
		<div class="row">
			<div class="col-sm-12">
				<div class="text-description">
					<?php echo $practiceroom['Practiceroom']['description']; ?>
				</div>
			</div>
		</div>
		
		<!-- Videos -->
		<?php if(isset($practiceroom['Video']) && sizeof($practiceroom['Video']) > 0): ?>
			<div class="row">
				<div class="col-sm-12">
					<?php
						foreach ($practiceroom['Video'] as $key => $video):
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
				<?php echo h($practiceroom['Practiceroom']['street']); ?>
				
				<?php if($practiceroom['Practiceroom']['floor'] != ''): ?>
					, piso: <?php echo h($practiceroom['Practiceroom']['floor']); ?>
				<?php endif; ?>
				
				<?php if($practiceroom['Practiceroom']['department'] != ''): ?>
					, depto.: <?php echo h($practiceroom['Practiceroom']['department']); ?>
				<?php endif; ?>
			</p>
			<?php if(sizeof($practiceroom['Dancestyle']) > 0): ?>
			<p>
				<?php foreach ($practiceroom['Dancestyle'] as $key => $dancestyle) {
					if($key != 0) echo ', ';
					echo $dancestyle['name'];
				} ?>
			</p>
			<?php endif; ?>
			<p>
				Contacto: <?php echo h($practiceroom['Practiceroom']['email']); ?>, 
				<?php echo h($practiceroom['Practiceroom']['website']); ?>, 
				<?php echo h($practiceroom['Practiceroom']['phone']); ?>
			</p>	
		</div>
		<div>
			<?php if(isset($practiceroom['Timetable']) && sizeof($practiceroom['Timetable']) > 0): ?>
				<p>
					<?php
					foreach ($practiceroom['Timetable'] as $key => $timetable):
						echo $this->Html->image('timetables/'.$timetable['file']
							, array('class' => 'img-responsive'));
					endforeach;
					?>
				</p>
			<?php endif; ?>	
		</div>
	</div>
</div>
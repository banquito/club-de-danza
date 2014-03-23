<?php echo $this->Html->css('pages/audiciones', array('inline' => false)); ?>
<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($audition['Audition']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<!--<div class="row">
			<div class="col-sm-12">
				<?php
				echo $this->Html->image('auditions/'.$audition['Audition']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>-->
		<div class="row">
			<div class="col-sm-12">
				<?php if(isset($audition['Photo']) && sizeof($audition['Photo']) > 0): ?>
					<div id="slider-photo" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
					    	<li data-target="#slider-photo" data-slide-to="0" class="active"></li>
					    	<?php foreach ($audition['Photo'] as $key => $photo): ?>
								<li data-target="#slider-photo" data-slide-to="<?php echo ($key+1); ?>" ></li>
							<?php endforeach; ?>
						</ol>
					    
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<?php echo $this->Html->image('auditions/'.$audition['Audition']['image'], array('class'=>'image-center'));?>
					            <div class="carousel-caption">
					            	<h3>
					                	<a><?php echo $audition['Audition']['image']; ?></a>
									</h3>
					            </div>
							</div>
							<?php foreach ($audition['Photo'] as $key => $photo): ?>
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
		<p class="text-pink"><?php echo h($audition['Audition']['company']); ?></p>
		<?php if(sizeof($audition['Profession']) > 0): ?>
			<p>
			<?php foreach ($audition['Profession'] as $key => $profession) {
				if($key != 0) echo ', ';
				echo $profession['name'];
			} ?>
			</p>
		<?php endif; ?>
		<p>
			<?php 
			switch ($audition['Audition']['gender']) {
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
			Desde <?php echo h($audition['Audition']['age-start']); ?> 
			hasta <?php echo h($audition['Audition']['age-end']); ?>
			años
		</p>
						
		<?php if(sizeof($audition['Dancestyle']) > 0): ?>
			<p>
			<?php foreach ($audition['Dancestyle'] as $key => $dancestyle) {
				if($key != 0) echo ', ';
				echo $dancestyle['name'];
			} ?>
			</p>
		<?php endif; ?>

		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['element-date']); ?></p>
		
		<p class="direccion">
			Lugar: 
			<?php echo h($audition['Audition']['street']); ?>
			
			<?php if($audition['Audition']['floor'] != ''): ?>
				, piso: <?php echo h($audition['Audition']['floor']); ?>
			<?php endif; ?>
			
			<?php if($audition['Audition']['department'] != ''): ?>
				, depto.: <?php echo h($audition['Audition']['department']); ?>
			<?php endif; ?>
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

<!-- Descripción -->
<div class="row">
	<div class="col-sm-12">
		<div class="text-description">
			<?php echo $audition['Audition']['description']; ?>
		</div>
	</div>
</div>

<!-- Attachments -->
<?php if(isset($audition['Attachment']) && sizeof($audition['Attachment']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<?php
			foreach ($audition['Attachment'] as $key => $attachment):
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
<?php if(isset($audition['Video']) && sizeof($audition['Video']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<?php
				foreach ($audition['Video'] as $key => $video):
					echo '<p class="text-center">'.$video['file'].'</p>';
				endforeach;
			?>
		</div>
	</div>
<?php endif; ?>
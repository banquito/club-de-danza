<?php //debug($practiceroom, $showHtml = null, $showFrom = true) ?>

<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($practiceroom['Practiceroom']['name']); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<?php
				echo $this->Html->image('practicerooms/'.$practiceroom['Practiceroom']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>
	</div>
	
	<div class="col-sm-6 view-info">
		<p>
			Lugar: <?php echo h($practiceroom['Practiceroom']['street']); ?>, 
			piso: <?php echo h($practiceroom['Practiceroom']['floor']); ?>, 
			depto.: <?php echo h($practiceroom['Practiceroom']['department']); ?>
		</p>
		<p>
			Contacto: <?php echo h($practiceroom['Practiceroom']['email']); ?>, 
			<?php echo h($practiceroom['Practiceroom']['website']); ?>, 
			<?php echo h($practiceroom['Practiceroom']['phone']); ?>
		</p>
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

<div class="row">
	<div class="col-sm-12">
		<?php echo $practiceroom['Practiceroom']['description']; ?>
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
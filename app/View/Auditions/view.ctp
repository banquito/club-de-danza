<div class="row">
	<div class="col-sm-12">
		<h1><?php echo h($audition['Audition']['title']); ?></h1>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<?php
				echo $this->Html->image('auditions/'.$audition['Audition']['image']
					, array('class'=>'img-responsive')
				);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo $audition['Audition']['description']; ?>
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
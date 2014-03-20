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
	</div>
	
	<div class="col-sm-6 view-info">
		<p><?php echo h($audition['Audition']['company']); ?></p>
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
		</p>
		<p>Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $audition['Audition']['element-date']); ?></p>
		
		<p class="direccion">
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
		<h2>Descripción</h2>
		<?php echo $audition['Audition']['description']; ?>
	</div>
</div>

<!-- Attachments -->
<?php if(isset($audition['Attachment']) && sizeof($audition['Attachment']) > 0): ?>
	<div class="row">
		<div class="col-sm-12">
			<h2>Archivos</h2>
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
			<h2>Videos</h2>
			<?php
				foreach ($audition['Video'] as $key => $video):
					echo '<p class="text-center">'.$video['file'].'</p>';
				endforeach;
			?>
		</div>
	</div>
<?php endif; ?>
<?php //if(isset($data)) debug($data, $showHtml = null, $showFrom = true) ?>
<?php //if(isset($elements)) debug($elements, $showHtml = null, $showFrom = true) ?>
<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Auditionsearches', array('url' => '/audiciones', 'class' => 'form-inline')) ?>
			<div class="form-group hidden">
				<label>Categorías</label>
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('auditions', array('hiddenField' => false)) ?>
						Audiciones
					</label>
				</div>
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('calls', array('hiddenField' => false)) ?>
						Convocatorias
					</label>
				</div>
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('castings', array('hiddenField' => false)) ?>
						Castings
					</label>
				</div>
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('jobs', array('hiddenField' => false)) ?>
						Búsquedas Laborales
					</label>
				</div>
			</div>
			<div class="form-group">
				<?php 
					$categories = array(
						'all' => 'Categoría',
						'auditions' => 'Audiciones', 
						'calls' => 'Convocatorias', 
						'castings' => 'Castings', 
						'jobs' => 'Búsquedas Laborales'
					);
					echo $this->Form->input(
					    'Categoría',
					    array('label' => false, 'options' => $categories, 'default' => 'all', 'class' => 'form-control')
					);
				?>
			</div>
			<div class="form-group">
				<?php 
					$pais = array(
						'all' => 'Pais',
						'ar' => 'Argentina'
					);
					echo $this->Form->input(
					    'Pais',
					    array('label' => false, 'options' => $pais, 'default' => 'all', 'class' => 'form-control')
					);
				?>
			</div>
			<div class="form-group">
				<?php 
					$profesion = array(
						'all' => 'Profesión',
						'cantante' => 'Cantante'
					);
					echo $this->Form->input(
					    'Profesión',
					    array('label' => false, 'options' => $profesion, 'default' => 'all', 'class' => 'form-control')
					);
				?>
			</div>
			<div class="form-group">
				<label class="sr-only">Palabra clave</label>
				<input type="text" class="form-control" placeholder="Palabra clave" />
			</div>
			<button type="submit" class="btn btn-default"><?php echo __('Submit') ?></button>
		<?php echo $this->Form->end() ?>
	</div>
</div>
<hr>

<div class="row">
	<div class="col-sm-12">
		<?php
		foreach($elements as $key => $element):
			if ($key != 0 && $key % 3 == 0) echo '</div>';
			if ($key % 3 == 0) echo '<div class="row">';
		?>
			<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
				<a href="<?php echo $element['link'] ?>">
					<div class="thumbnail thumbnail-vermas thumbnail-vertical">
					 	<div class="img-vertical text-center">
							<img alt="imagen-nota" src="<?php echo $element['image']; ?>" />
						</div>
						<div class="caption caption-vermas">
							<p class="title-vermas">
								<?php echo $element['title']; ?>
							</p>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
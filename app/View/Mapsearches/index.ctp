<?php //if(isset($data)) debug($data, $showHtml = null, $showFrom = true) ?>
<?php //if(isset($elements)) debug($elements, $showHtml = null, $showFrom = true) ?>
<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Mapsearches', array('url' => '/mapadeladanza', 'class' => 'form-inline')) ?>
			<div class="form-group hidden">
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('accessories', array('hiddenField' => false)) ?>
						Accesorios
					</label>
				</div>
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('estudies', array('hiddenField' => false)) ?>
						Estudios
					</label>
				</div>
				<div class="checkbox">
					<label>
						<?php echo $this->Form->checkbox('practicerooms', array('hiddenField' => false)) ?>
						Salas de Ensayo
					</label>
				</div>
			</div>
			<div class="form-group">
				<?php 
					$categories = array(
						'all' => 'Categoría',
						'accessories' => 'Accesorios', 
						'estudies' => 'Estudios', 
						'practicerooms' => 'Salas de Ensayo'
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
					$estilo = array(
						'all' => 'Estilo',
						'disco' => 'Disco',
						'flamenco' => 'Flamenco'
					);
					echo $this->Form->input(
					    'Estilo',
					    array('label' => false, 'options' => $estilo, 'default' => 'all', 'class' => 'form-control')
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
								<?php echo $element['name']; ?>
							</p>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
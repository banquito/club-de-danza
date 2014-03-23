<?php //if(isset($data)) debug($data, $showHtml = null, $showFrom = true) ?>
<?php //if(isset($elements)) debug($elements, $showHtml = null, $showFrom = true) ?>
<?php //if(isset($salients)) debug($salients, $showHtml = null, $showFrom = true) ?>
<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>

<h1>Búsquedas</h1>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Filter', array('url' => '/audiciones', 'class' => 'form-inline')) ?>
			<div class="form-group">
				<?php 
					$categories = array(
						'auditions' => 'Audiciones', 
						'calls' => 'Convocatorias', 
						'castings' => 'Castings', 
						'jobs' => 'Búsquedas Laborales'
					);
					echo $this->Form->input(
					    'category',
					    array('label' => false, 'options' => $categories, 'empty' => 'Categoría', 'class' => 'form-control')
					);
				?>
			</div>
			<div class="form-group">
				<?php 
					$pais = array(
						'ar' => 'Argentina'
					);
					echo $this->Form->input(
					    'country',
					    array('label' => false, 'options' => $pais, 'empty' => 'País', 'class' => 'form-control')
					);
				?>
			</div>
			<div class="form-group">
				<?php 
					$professions = array(
						'all' => 'Profesión',
						'cantante' => 'Cantante'
					);
					echo $this->Form->input(
					    'professions',
					    array('label' => false, 'options' => $professions, 'empty' => 'Profesión', 'class' => 'form-control')

					);
				?>
			</div>
			<div class="form-group">
				<label class="sr-only">Palabra clave</label>
				<input type="text" class="form-control" placeholder="Palabra clave" />
			</div>
			<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Buscar</button>
		<?php echo $this->Form->end() ?>
	</div>
</div>
<hr>

<?php if(isset($salients) && sizeof($salients) > 0) echo $this->element('sliderSalients', array("items" => $salients)); # Slider Salients ?>

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
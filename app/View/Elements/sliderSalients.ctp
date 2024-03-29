<?php echo $this->Html->css('elements/slider-salients', array('inline' => false)); ?>

<?php $sliderLink = (isset($items[0]['link']) && $items[0]['link'] != '') ? $items[0]['link'] : '#'; ?>
<div class="row slide">
	<div class="col-sm-12">
		<div class="thumbnail">
				<a href="<?php echo $sliderLink; ?>">
					<div class="col-sm-6">
						<?php echo $this->Html->image($items[0]['image'], array('class' => 'image-center')); ?>
					</div>
				</a>
			<div class="col-sm-6">
				<a href="<?php echo $sliderLink; ?>">
					<h4>
						<?php echo $items[0]['title']; ?>
					</h4>

					<div class="row">
						<div class="col-sm-12">
							<?php if(isset($items[0]['products'])) ?>
								<p class="text-pink"><?php echo h($items[0]['products']); ?></p>

							<?php if(isset($items[0]['element-date']) && $items[0]['element-date']): ?>
								<p class="text-pink">Fecha: <?php echo $this -> Time -> format('d-m-Y H:i', $items[0]['element-date']); ?></p>
							<?php endif; ?>
							
							<p class="text-pink">
								Lugar: 
								<?php echo h($items[0]['street']); ?>
								
								<?php if($items[0]['floor'] != ''): ?>
									, piso: <?php echo h($items[0]['floor']); ?>
								<?php endif; ?>
								
								<?php if($items[0]['department'] != ''): ?>
									, depto.: <?php echo h($items[0]['department']); ?>
								<?php endif; ?>
							</p>

							<?php if(sizeof($items[0]['Dancestyle']) > 0): ?>
								<p>
								<?php foreach ($items[0]['Dancestyle'] as $key => $dancestyle) {
									if($key != 0) echo ', ';
									echo $dancestyle['name'];
								} ?>
								</p>
							<?php endif; ?>

							<p class="text-pink">
								Contacto: <?php echo h($items[0]['email']); ?>, 
								<?php echo h($items[0]['website']); ?>, 
								<?php echo h($items[0]['phone']); ?>
							</p>
						</div>
					</div>

				</a>
			</div>
		</div>
	</div>
</div>


<?php 
/*
Lo dejo por si nos lo piden a futuro...

<div id="slider-home" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php foreach ($items as $key => $item): ?>
			<li data-target="#slider-home" data-slide-to="<?php echo $key; ?>" class="<?php echo ($key == 0) ? 'active' : ''; ?>"></li>
		<?php endforeach; ?>
	</ol>
	
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php foreach ($items as $key => $item): ?>
			<div class="item<?php echo ($key == 0) ? ' active' : ''; ?>">
				<?php $sliderLink = (isset($item['link']) && $item['link'] != '') ? $item['link'] : '#'; ?>
				<a href="<?php echo $sliderLink; ?>">
					<?php echo $this->Html->image($item['image'], array('class' => 'image-center')); ?>
				</a>
				<div class="carousel-caption">
					<h3>
						<a href="<?php echo $sliderLink; ?>"><?php echo $item['title']; ?></a>
					</h3>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#slider-home" data-slide="prev">
		<span class="fa fa-angle-left fa-2x"></span>
	</a>
	<a class="right carousel-control" href="#slider-home" data-slide="next">
		<span class="fa fa-angle-right fa-2x"></span>
	</a>
</div>
*/
?>
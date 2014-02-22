<?php
// debug($notes, $showHtml = null, $showFrom = true);
echo $this->Html->css('pages/inicio', array('inline' => false)); 
?>


<!-- Carrusel / Slider -->
<div id="slider-home" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#slider-home" data-slide-to="0" class="active"></li>
		<li data-target="#slider-home" data-slide-to="1"></li>
		<li data-target="#slider-home" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<?php echo $this->Html->image('sliders/01.jpg', array('class' => 'image-center')); ?>
			<div class="carousel-caption ">
                <h3>TÍTULO</h3>
            </div>
		</div>
		<div class="item">
			<?php echo $this->Html->image('sliders/01.jpg', array('class' => 'image-center')); ?>
			<div class="carousel-caption ">
                <h3>TÍTULO</h3>
            </div>
		</div>
		<div class="item">
			<?php echo $this->Html->image('sliders/01.jpg', array('class' => 'image-center')); ?>
			<div class="carousel-caption ">
                <h3>TÍTULO</h3>
            </div>
		</div>
	</div>
	<!-- Controls -->
	<a class="left carousel-control" href="#slider-home" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
	<a class="right carousel-control" href="#slider-home" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>

<!-- Título -->
<div class="row row-header-h1">
	<div class="col-sm-4">
			<h1>Notas</h1>
			<div></div>
	</div>
</div>

<!-- Notas -->
<?php
for ($i=0; $i < sizeof($notes); $i++):
	$note = $notes[$i];

	if ($i != 0 && $i % 3 == 0) {
		echo '</div>';
	}
	if ($i % 3 == 0) {
		echo '<div class="row">';
	}
?>
	<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
		<a href="/notas/ver/<?php echo $note['Note']['id']; ?>">
			<div class="thumbnail thumbnail-vermas thumbnail-vertical">
			 	<div class="img-vertical text-center">
					<?php $image = IMAGES_URL . ($note['Note']['image'] ? 'notes/'.$note['Note']['image'] : 'layouts/sinfoto.jpg'); ?>
					<img alt="imagen-nota" src="<?php echo $image; ?>" />
				</div>
				<div class="caption caption-vermas">
					<p class="title-vermas">
						<?php echo ($title = $note['Note']['title']) ? substr($title, 0, 50) : __('No Title'); ?>
					</p>
				</div>
			</div>
		</a>
	</div>

<?php
endfor;
?>

<p class="text-center">
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
</p>
<div class="paging text-center">
	<?php
		echo $this->Paginator->prev('< ' . __('previous') . ' ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(' ' . __('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</div>
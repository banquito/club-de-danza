<?php echo $this->Html->css('pages/inicio', array('inline' => false)); ?>

<!-- Slider & Carrusel -->
<?php echo $this -> element('slider'); ?>

<!-- Título -->
<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1>Notas</h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		
		<!-- Notas -->
		<?php
		foreach($notes as $key => $note):
			if ($key != 0 && $key % 3 == 0) echo '</div>';
			if ($key % 3 == 0) echo '<div class="row">';
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
		<?php endforeach; ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<!-- Paginación -->
		<p class="text-center">
			<?php
			//echo $this->Paginator->counter(array(
			//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			//));
			?>
		</p>
		<ul class="pagination">
		  <li>
		  	<?php echo $this->Paginator->prev('«', array('tag' => 'li'), null, array('class' => 'disabled')); ?>
		  </li>
		  
			<?php
				echo $this->Paginator->numbers(
					array(
						'currentClass' => 'active',
						'separator' => '',
						'tag' => 'li',
						'currentTag' => 'span'
					)
				);				
			?>
		  
		  <li> 
		  	<?php echo $this->Paginator->next('»', array('tag' => 'li'), null, array('class' => 'disabled')); ?>
		  </li>
		</ul>
	</div>
</div>
<?php $elements = $this->requestAction(array('controller' => 'auditions', 'action' => 'getAuditions')) ?>
<?php debug($elements, $showHtml = null, $showFrom = true) ?>

<div class="row">
	<div class="col-sm-12">
		
		<!-- Notas -->
		<?php
		foreach($elements as $key => $element):
			if ($key != 0 && $key % 3 == 0) echo '</div>';
			if ($key % 3 == 0) echo '<div class="row">';
		?>
			<div class="col-xs-4 col-sm-4 col-md-4 col-sm-4">
				<a href="/auditions/view/<?php echo $element['Audition']['id']; ?>">
					<div class="thumbnail thumbnail-vermas thumbnail-vertical">
					 	<div class="img-vertical text-center">
							<?php $image = IMAGES_URL . ($element['Audition']['image'] ? 'auditions/'.$element['Audition']['image'] : 'layouts/sinfoto.jpg'); ?>
							<img alt="imagen-nota" src="<?php echo $image; ?>" />
						</div>
						<div class="caption caption-vermas">
							<p class="title-vermas">
								<?php echo ($title = $element['Audition']['title']) ? substr($title, 0, 50) : __('No Title'); ?>
							</p>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
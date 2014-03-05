<?php //if(isset($data)) debug($data, $showHtml = null, $showFrom = true) ?>

<div class="row">
	<div class="col-sm-12">
		<form action="/audiciones" method="post">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="data[auditions]" value="1"> Audiciones
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="data[calls]" value="1"> Convocatorias
				</label>
			</div>
			<button type="submit"><?php echo __('Submit') ?></button>
		</form>
	</div>
</div>

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
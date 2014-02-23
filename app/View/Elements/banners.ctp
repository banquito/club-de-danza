<?php
$cantidad = 1;
$excluidos = null;

$categoria1 = $this->requestAction(Router::url(array('controller' => 'banners'
		, 'action' => 'get', $cantidad, '1'))
);

foreach ($categoria1 as $banner)
	$excluidos .= '-'.$banner['Banner']['id'];

$categoria2 = $this->requestAction(Router::url(array('controller' => 'banners'
		, 'action' => 'get', $cantidad, '2', $excluidos))
);

foreach ($categoria2 as $banner)
	$excluidos .= '-'.$banner['Banner']['id'];

$categoria3 = $this->requestAction(Router::url(array('controller' => 'banners'
		, 'action' => 'get', $cantidad, '3', $excluidos))
);

foreach ($categoria3 as $banner)
	$excluidos .= '-'.$banner['Banner']['id'];

$categoria4 = $this->requestAction(Router::url(array('controller' => 'banners'
		, 'action' => 'get', $cantidad, '4', $excluidos))
);
?>

<div class="row row-banner">
	<div class="col-sm-12">
		<a href="<?php echo $categoria1[0]['Banner']['link']; ?>" target="_blank">
			<img src="/img/banners/<?php echo $categoria1[0]['Banner']['image']; ?>" alt="" class="image-center img-responsive">
		</a>
	</div>
</div>
<div class="row row-banner">
	<div class="col-sm-12">
		<a href="<?php echo $categoria2[0]['Banner']['link']; ?>" target="_blank">
			<img src="/img/banners/<?php echo $categoria2[0]['Banner']['image']; ?>" alt="" class="image-center img-responsive banner-large">
		</a>
	</div>
</div>
<div class="row row-banner">
	<div class="col-sm-12">
		<a href="<?php echo $categoria3[0]['Banner']['link']; ?>" target="_blank">
			<img src="/img/banners/<?php echo $categoria3[0]['Banner']['image']; ?>" alt="" class="image-center img-responsive">
		</a>
	</div>
</div>
<div class="row row-banner">
	<div class="col-sm-12">
		<a href="<?php echo $categoria4[0]['Banner']['link']; ?>" target="_blank">
			<img src="/img/banners/<?php echo $categoria4[0]['Banner']['image']; ?>" alt="" class="image-center img-responsive">
		</a>
	</div>
</div>
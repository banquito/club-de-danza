<?php

$related_notes = $this->requestAction(Router::url(array('controller' => 'notes', 'action' => 'related', $note['Note']['id'])));

?>

<?php foreach ($related_notes as $note): ?>
    <div class="row">
        <div class="col-sm-12">
            <a href="/notas/ver/<?php echo $note['Note']['id']; ?>">
                <div class="thumbnail thumbnail-vermas thumbnail-vertical">
                    <div class="img-vertical text-center">
                        <?php $image = '/' . IMAGES_URL . ($note['Note']['image'] ? 'notes/'.$note['Note']['image'] : 'layouts/sinfoto.jpg'); ?>
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
    </div>
<?php endforeach; ?>
<div id="galleryAdmin">
<?php
foreach ($galleries as $image){
    ?>
    <div class="gallery-line" data-id="<?= $image->getId() ?>">
        <img src="/<?php echo $image->getUrl() ?>" alt="<?= $image->getName() ?>" class="gallery-image" width="150">
        <button class="gallery-delete" data-id="<?= $image->getId() ?>">Supprimer la photo</button>
    </div>
    <?php
}?>
</div>

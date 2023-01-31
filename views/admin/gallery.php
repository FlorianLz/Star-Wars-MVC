<section class="galery" id="galleryAdmin">
    <div class="container">
        <div class="galery--content">
            <div class="galery--list">
                <?php foreach ($galleries as $image) { ?>
                    <div class="galery--item gallery-line" data-id="<?= $image->getId() ?>">
                        <img src="/<?= $image->getUrl() ?>" alt="<?= $image->getName() ?>">
                        <button class="gallery-delete" data-id="<?= $image->getId() ?>">Supprimer la photo</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

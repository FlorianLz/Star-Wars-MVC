<section class="banner default">
    <div class="container">
        <div class="banner--content">
            <h1 class="title">Galerie</h1>
            <img class="banner--image" src="/public/images/bannerDefault.png" alt="">
        </div>
    </div>
</section>

<section class="galery">
    <div class="container">
        <div class="galery--content">
            <h1 class="title">Galerie photo</h1>
            <div class="galery--list">
                <?php foreach ($galleries as $gallery) { ?>
                    <div class="galery--item">
                        <img src="<?= $gallery->getUrl() ?>" alt="<?= $gallery->getName() ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

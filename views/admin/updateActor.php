<h1>Modifier un acteur</h1>
<form action="/admin/actors/update/<?= $actor->getId() ?>" method="POST" enctype="multipart/form-data" id="updateActors">
    <input type="text" name="actorName" value="<?php echo $actor->getName(); ?>" />
    <input type="file" name="picture" />
    <input type="hidden" name="idActor" value="<?php echo $actor->getId(); ?>" />
    <input type="hidden" name="oldPicture" value="<?php echo $actor->getPicture(); ?>">
    <input type="submit" value="mettre à jour" class="generic-cta" />
</form>

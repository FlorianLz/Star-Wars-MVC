<h1>Ajouter un acteur</h1>
<form action="/admin/actors/add" method="POST" enctype="multipart/form-data" id="addActor">
    <label for="name">Nom de l'acteur</label>
    <input type="text" id="name" name="name" placeholder="Nom de l'acteur..." required>
    <label for="picture">Photo de l'acteur</label>
    <input type="file" id="picture" name="picture">
    <input class="generic-cta" type="submit" value="Ajouter l'acteur">
</form>

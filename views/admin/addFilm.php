<h1>Ajouter un film</h1>
<form method="POST" action="/admin/films/add" enctype="multipart/form-data">
    <label for="name">Titre du film</label>
    <input type="text" id="name" name="name" placeholder="Titre du film...">
    <label for="resume">Résumé du film</label>
    <input type="text" id="resume" name="resume" placeholder="Résumé du film...">
    <label for="synopsis">Synopsis du film</label>
    <input type="text" id="synopsis" name="synopsis" placeholder="Synopsis du film...">
    <label for="release_date">Date de sortie</label>
    <input type="date" id="release_date" name="release_date" placeholder="Date de sortie...">
    <label for="trailer">Lien du trailer</label>
    <input type="text" id="trailer" name="trailer" placeholder="Lien du trailer...">
    <label for="cover">Cover image</label>
    <input type="file" id="cover" name="cover">
    <label for="gallery">Gallery images</label>
    <input type="file" id="gallery" name="gallery[]" multiple>
    <label for="actors">Acteurs :</label>
    <select name="actor1" id="actor1">
        <?php foreach ($actors as $actor) : ?>
            <option value="<?= $actor->getId() ?>"><?= $actor->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" id="actor2character" name="actor1character" placeholder="Personnage joué...">
    <input type="hidden" id="nbActors" name="nbActors" value="2">
    <input type="submit" value="Ajouter">
</form>

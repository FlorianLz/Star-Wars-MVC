<h1>Ajouter un film</h1>
<form method="POST" action="/admin/films/add" enctype="multipart/form-data" id="addFilm">
    <label for="name">Titre du film</label>
    <input type="text" id="name" name="name" placeholder="Titre du film..." required>
    <label for="resume">Résumé du film</label>
    <input type="text" id="resume" name="resume" placeholder="Résumé du film..." required>
    <label for="synopsis">Synopsis du film</label>
    <input type="text" id="synopsis" name="synopsis" placeholder="Synopsis du film..." required>
    <label for="release_date">Date de sortie</label>
    <input type="date" id="release_date" name="release_date" placeholder="Date de sortie..." required>
    <label for="trailer">Lien du trailer</label>
    <input type="text" id="trailer" name="trailer" placeholder="Lien du trailer..." required>
    <label for="cover">Cover image</label>
    <input type="file" id="cover" name="cover" required>
    <label for="cover">Bannière</label>
    <input type="file" id="banner" name="banner" required>
    <label for="gallery">Gallery images</label>
    <input type="file" id="gallery" name="gallery[]" multiple>
    <label for="actors">Acteurs :</label>
    <div class="actors-container">
        <div class="actors-line">
            <select name="actor1" id="actor1">
                <?php foreach ($actors as $key => $actor) : ?>
                    <option value="<?= $actor->getId() ?>"

                    ><?= $actor->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" id="actor1character" name="actor1character"
                   placeholder="Personnage joué..." value="">
        </div>
    </div>
    <input type="hidden" id="nbActors" name="nbActors" value="1">
    <input type="submit" value="Ajouter" class="generic-cta">
</form>

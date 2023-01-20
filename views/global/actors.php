<h1>Actors</h1>
<?php
foreach ($actors as $actor) {
    echo "<h3>" . $actor->getName() . " -> " . $actor->getPlayedCharacter() . "</h3>";
    echo "<ul>";
    if($actor->getFilmsPresence() != null){
        foreach ($actor->getFilmsPresence() as $film) {
            echo "<li>" . $film . "</li>";
        }
    }
    echo "</ul>";

    if($admin){
        echo "<form action='/admin/actors/delete/" . $actor->getId() . "' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $actor->getId() . "'>";
        echo "<input type='submit' value='Supprimer'>";
        echo "</form>";
    }

}
?>

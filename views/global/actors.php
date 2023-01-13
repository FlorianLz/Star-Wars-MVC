<h1>Actors</h1>
<?php
foreach ($actors as $actor) {
    echo "<h3>" . $actor->getName() . " -> " . $actor->getPlayedCharacter() . "</h3>";
    echo "<ul>";
    foreach ($actor->getFilmsPresence() as $film) {
        echo "<li>" . $film . "</li>";
    }
    echo "</ul>";
}
?>

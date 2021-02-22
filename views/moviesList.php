<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Lista filmów</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <?php
    echo '<table border=1>';
    echo '<tr><th>ID filmu</th><th>Tytuł</th><th>Nazwa kategorii</th><th>Reżyser</th><th>Rok wydania</th><th>Przedział wiekowy</th><th>Bieżąca cena</th><th>Akcje</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo $movies[$i]->getIDFILM();
        echo '</td><td>';
        echo $movies[$i]->getTYTUL();
        echo '</td><td>';
        echo $movies[$i]->getKATEGORIA();
        echo '</td><td>';
        echo $movies[$i]->getIMIE().' '.$movies[$i]->getNAZWISKO();
        echo '</td><td>';
        echo $movies[$i]->getROKWYDANIA();
        echo '</td><td>';
        echo $movies[$i]->getPRZEDZIALWIEKOWY();
        echo '</td><td>';
        echo $movies[$i]->getBIEZACACENA();
        echo '</td><td>';
        echo '<a href="index.php?action=editMovie&id='.$movies[$i]->getIDFILM().'">Edytuj</a>';
        echo '<a href="index.php?action=deleteMovie&id='.$movies[$i]->getIDFILM().'"> Usuń</a>';
        echo '</td></tr>';
    }
    echo '</table>';
    ?>
    <a href="index.php?action=addMovie">Dodaj film...</a>
</main>
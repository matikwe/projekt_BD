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
    echo '<tr><th>ID</th><th>Tytuł</th><th>Kategoria</th><th>Nazwa kategorii</th><th>Reżyser</th><th>Rok wydania</th><th>Przedział wiekowy</th><th>Bieżąca cena</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo $movies[$i]->getIDKATEGORIA();
        echo '</td><td>';
        echo $movies[$i]->getKATEGORIA();
        echo '</td></tr>';
    }
    echo '</table>';
    ?>
    <a href="index.php?action=addCategories">Dodaj kategorię...</a>
</main>
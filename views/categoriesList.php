<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Lista kategorii</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>

    <a href="index.php?action=addCategories" class="smallButton">Dodaj kategorię...</a>
    <?php
    echo '<table border=1>';
    echo '<tr><th>Nazwa kategorii</th><th>Akcje</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr>';
        echo '<td>';
        echo $categories[$i]->getKATEGORIA();
        echo '</td><td>';
        echo '<a href="index.php?action=editCategory&id='.$categories[$i]->getIDKATEGORIA().'" class="smallButtonV2">Edytuj</a>';
        echo '<a href="index.php?action=deleteCategory&id='.$categories[$i]->getIDKATEGORIA().'" class="smallButtonV2"> Usuń</a>';
        echo '</td></tr>';
    }
    echo '</table>';
    ?>
</main>

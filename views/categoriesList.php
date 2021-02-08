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
    <?php
    echo '<table border=1>';
    echo '<tr><th>ID</th><th>Nazwa kategorii</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo $categories[$i]->getIDKATEGORIA();
        echo '</td><td>';
        echo $categories[$i]->getKATEGORIA();
        echo '</td></tr>';
    }
    echo '</table>';
    ?>
    <a href="index.php?action=addCategories">Dodaj kategorię...</a>
</main>

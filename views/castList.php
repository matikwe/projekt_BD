<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Lista aktorów</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>
    <a href="index.php?action=addCast" class="smallButton">Dodaj aktora...</a>
    <?php
    echo '<table border=1>';
    echo '<tr><th>Aktor</th><th>Akcje</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo $actors[$i]->getIMIE().' '.$actors[$i]->getNAZWISKO();
        echo '</td><td>';
        echo '<a href="index.php?action=deleteActor" class="smallButtonV2">Usuń</a>';
        echo '</td></tr>';
    }
    echo '</table>';
    ?>

</main>

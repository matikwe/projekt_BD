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
    <?php
        echo '<table border=1>';
        echo '<tr><th>ID</th><th>Imię</th><th>Nazwisko</th></tr>';
        $count = $i;
        for($i = 0; $i < $count; $i++) {
            echo '<tr><td>';
            echo $actors[$i]->getIDAKTOR();
            echo '</td><td>';
            echo $actors[$i]->getIMIE();
            echo '</td><td>';
            echo $actors[$i]->getNAZWISKO();
            echo '</td></tr>';
        }
        echo '</table>';
    ?>
    <a href="index.php?action=addActor">Dodaj aktora...</a>
</main>

<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Lista reżyserów</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>
    <a href="index.php?action=addDirector" class="smallButton">Dodaj reżysera...</a>
    <?php
    echo '<table border=1>';
    echo '<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Akcje</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo $dirs[$i]->getIDREZYSER();
        echo '</td><td>';
        echo $dirs[$i]->getIMIE();
        echo '</td><td>';
        echo $dirs[$i]->getNAZWISKO();
        echo '</td><td>';
        echo '<a href="index.php?action=editDirector&id='.$dirs[$i]->getIDREZYSER().'" class="smallButtonV2">Edytuj</a>';
        echo '<a href="index.php?action=deleteDirector&id='.$dirs[$i]->getIDREZYSER().'" class="smallButtonV2">Usuń</a>';
        echo '</td></tr>';
    }
    echo '</table>';
    ?>

</main>

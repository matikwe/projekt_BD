<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Dodawanie obsady</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>
    <?php
    echo '<table border=1>';
    echo '<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Akcje</th></tr>';
    $count = $i;
    for($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo $actors[$i]->getIDAKTOR();
        echo '</td><td>';
        echo $actors[$i]->getIMIE();
        echo '</td><td>';
        echo $actors[$i]->getNAZWISKO();
        echo '</td><td>';
        $query = $dbh->query("SELECT COUNT(ID_AKTOR) FROM OBSADA WHERE ID_FILM=".$_SESSION['ID']." AND ID_AKTOR=".$actors[$i]->getIDAKTOR());
        $count2 = $query->fetchColumn();
        if($count2 <= 0) {
            echo '<a href="index.php?action=addCast&idAct='.$actors[$i]->getIDAKTOR().'" class="smallButtonV2">Dodaj</a>';
        } else {
            echo 'Dodany!';
        }
        echo '</td></tr>';
    }
    echo '</table>';
    ?>

</main>

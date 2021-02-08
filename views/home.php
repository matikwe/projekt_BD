<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
include "topMenu.php";

for($i = 0; $i < $_SESSION['countFilms']; $i++){
    $films = unserialize($_SESSION['films'][$i]);


echo '<article>';
    echo '<h1>'.$films->getTYTUL().'</h1>';
    echo '<h5>'.'Reżyser: '.$films->getIMIE().' '.$films->getNAZWISKO().'</h5>';
    echo '<h5>'.'Obsada: ';
        for($j = 0; $j < $_SESSION['countActors']; $j++){

            $actors = unserialize($_SESSION['actors'][$j]);
            if($_SESSION['ID_FILM'][$j] == $films->getIDFILM())
            {
               echo $actors->getIMIE().' '. $actors->getNAZWISKO(). ', ';
            }
        }

    echo '<h5>Kategoria: '.$films->getKATEGORIA().'</h5>';
    echo '<h5>Przedział wiekowy: '.$films->getPRZEDZIALWIEKOWY().'</h5>';
    echo '<h5>Rok wydania: '.$films->getROKWYDANIA().'</h5>';
    echo '<h5>Cena: '.$films->getBIEZACACENA().'</h5>';
    //przycisk wyp
echo '</article>';
}
?>
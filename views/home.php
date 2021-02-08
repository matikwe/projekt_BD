<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
include "topMenu.php";
echo '<h1>TOP ileś FILMÓW</h1>';
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
    if(empty($_SESSION['currID']))
    {
        echo '<a href="index.php?action=login" class="smallButton">Zaloguj się, aby wypożyczyć</a>';
    }else{
        echo '<a href="index.php?action=order&id_film='.$films->getIDFILM().'&price='.$films->getBIEZACACENA().'" class="smallButton">Wypożycz</a>';
    }
echo '</article>';
}
?>

<a href="index.php?action=partnerProgram">Program partnerski</a>
<a href="index.php?action=moviesList">Lista filmów</a>
<a href="index.php?action=actorsList">Lista aktorów</a>
<a href="index.php?action=categoriesList">Lista kategorii</a>
<a href="index.php?action=logout">WYLOGUJ</a>

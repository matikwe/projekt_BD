<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
include "topMenu.php";

echo '<h1>NAJNOWSZE FILMY</h1>';
for($i = $_SESSION['countMovies']-1; $i >= 0; $i--) {
    $movies = unserialize($_SESSION['movies'][$i]);

    $RABAT = $movies->getBIEZACACENA() * 0.9;

    if(empty($_SESSION['DateOfBirth']) || !empty($_SESSION['idreff'])){
        $_SESSION['DateOfBirth'] = 1900;
    }
    if ($_SESSION['Now'] - $_SESSION['DateOfBirth'] >= $movies->getPRZEDZIALWIEKOWY()) {
        echo '<article>';
        echo '<h1>' . $movies->getTYTUL() . '</h1>';
        echo '<h5>' . 'Reżyser: ' . $movies->getIMIE() . ' ' . $movies->getNAZWISKO() . '</h5>';
        echo '<h5>' . 'Obsada: ';
        for ($j = 0; $j < $_SESSION['countActors']; $j++) {

            $actors = unserialize($_SESSION['actors'][$j]);
            if ($_SESSION['ID_FILM'][$j] == $movies->getIDFILM()) {
                echo $actors->getIMIE() . ' ' . $actors->getNAZWISKO() . ', ';
            }
        }

        echo '<h5>Kategoria: ' . $movies->getKATEGORIA() . '</h5>';
        echo '<h5>Przedział wiekowy: ' . $movies->getPRZEDZIALWIEKOWY() . '</h5>';
        echo '<h5>Rok wydania: ' . $movies->getROKWYDANIA() . '</h5>';

        if(empty($_SESSION['discount'])){
            echo '<h5>Cena: ' . $movies->getBIEZACACENA() . ' zł</h5>';
        }else{
        if($_SESSION['discount'] == true){
            echo '<h5>Cena: <s>' . $movies->getBIEZACACENA().' zł ' . '</s>  '.round($RABAT,2).' zł</h5>';
        }else if($_SESSION['discount'] == false){
            echo '<h5>Cena: ' . $movies->getBIEZACACENA() . ' zł</h5>';
        }}

        //przycisk wyp
        if (empty($_SESSION['currID'])) {
            echo '<a href="index.php?action=login" class="smallButton">Zaloguj się na konto użytkownika, aby wypożyczyć</a>';
        } else if (!empty($_SESSION['currID'])) {
            echo '<a href="index.php?action=order&id_film=' . $movies->getIDFILM() . '&price=' . $movies->getBIEZACACENA() . '&a=home" class="smallButton">Wypożycz</a>';
        }

        echo '</article>';
    }
}
    if(!empty($_SESSION['errorOrder']))
        echo '<p>'.$_SESSION['errorOrder'].'</p>';

?>
<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Wyszukiwarka</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>
<form action="index.php?action=search" class="test2" method="post">
    <select name="category">
        <?php
        for($i = 0; $i < $_SESSION['countCategories']; $i++){
            $caregories = unserialize($_SESSION['categories'][$i]);
            echo '<option value="'.$caregories->getIDKATEGORIA().'">'.$caregories->getKATEGORIA().'</option>';
        }
        ?>
    </select>
    <input type="text" placeholder="Wpisz tytuł, reżysera lub aktora..." name="info">
    <input type="submit" value="SZUKAJ" class="submit" name="buttonSearch">
</form>
</main>
<?php
    for($i = 0; $i < $_SESSION['countSearchMovies']; $i++) {
    $movies = unserialize($_SESSION['searchMovies'][$i]);

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
            echo '<h5>Cena: ' . $movies->getBIEZACACENA() . '</h5>';
            }else if($_SESSION['discount'] == true){
            echo '<h5>Cena: <s>' . $movies->getBIEZACACENA() . '</s>  '.$RABAT.'</h5>';
            }

            //przycisk wyp
            if (empty($_SESSION['currID'])) {
            echo '<a href="index.php?action=login" class="smallButton">Zaloguj się na konto użytkownika, aby wypożyczyć</a>';
            } else if (!empty($_SESSION['currID'])) {
            echo '<a href="index.php?action=order&id_film=' . $movies->getIDFILM() . '&price=' . $movies->getBIEZACACENA() . '" class="smallButton">Wypożycz</a>';
            }
            echo '</article>';
    }
}

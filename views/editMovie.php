<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Edytowanie filmu</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <form action="index.php?action=editMovie" class="test2" method="post">
        <input type="text" placeholder="Tytuł" name="title">
        <select name="director">
            <?php
            $count = $i;
            for($i = 0; $i < $count; $i++) {
                $dir = unserialize($_SESSION['directors'][$i]);
                echo '<option value="'.$dir->getIDREZYSER().'">';
                echo $dir->getIMIE().' '.$dir->getNAZWISKO();
                echo '</option>';
            }
            ?>
        </select>
        <select name="category">
            <?php
            $count = $j;
            for($j = 0; $j < $count; $j++) {
                $cat = unserialize($_SESSION['category'][$j]);
                echo '<option value="'.$cat->getIDKATEGORIA().'">';
                echo $cat->getKATEGORIA();
                echo '</option>';
            }
            ?>
        </select>
        <input type="number" placeholder="Rok wydania" min="1870" max="2100" name="year">
        <input type="number" placeholder="Przedział wiekowy" min="3" max="21" name="age">
        <input type="number" placeholder="Cena bieżąca (zł)" name="price1">
        <input type="number" placeholder="Cena bieżąca (gr)" min="0" max="99" name="price2">
        <?php
        if(!empty($_SESSION['error'])){
            echo'<p>'.$_SESSION['error'].'</p>';
        }
        ?>
        <input type="submit" value="Edytuj" class="submit">
    </form>
</main>
<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Dodawanie kategorii</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>
    <form action="index.php?action=addCategories" class="test2" method="post">
        <input type="text" placeholder="Nazwa kategorii" name="category">
        <?php
        if(!empty($_SESSION['error'])){
            echo'<p>'.$_SESSION['error'].'</p>';
        }
        ?>
        <input type="submit" value="Dodaj" class="submit" name="add">
    </form>
</main>
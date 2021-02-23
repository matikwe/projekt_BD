<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Edytowanie kategorii</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <form action="index.php?action=editCategory" class="test2" method="post">
        <input type="text" placeholder="Nazwa" name="category">
        <?php
        if(!empty($_SESSION['error'])){
            echo'<p>'.$_SESSION['error'].'</p>';
        }
        ?>
        <input type="submit" value="Edytuj" class="submit" name="add">
    </form>
</main>
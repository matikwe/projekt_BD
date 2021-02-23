<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Edytowanie reżysera</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <form action="index.php?action=editDirector" class="test2" method="post">
        <input type="text" placeholder="Imię" name="name">
        <input type="text" placeholder="Nazwisko" name="surname">
        <?php
        if(!empty($_SESSION['error'])){
            echo'<p>'.$_SESSION['error'].'</p>';
        }
        ?>
        <input type="submit" value="Edytuj" class="submit" name="add">
    </form>
</main>
<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Dodawanie aktora</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <form action="index.php?action=addActor" class="test2" method="post">
        <input type="text" placeholder="Imię" name="name">
        <input type="text" placeholder="Nazwisko" name="surname">
        <input type="submit" value="Dodaj" class="submit" name="buttonLogin">
    </form>
</main>
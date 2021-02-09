<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Usuwanie aktora</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <h1>Na pewno chcesz usunąć?</h1>
    <a href="index.php?action=actorsList">NIE</a>
    <a href="index.php?action=deleteActor&confirmed=1">TAK</a>
</main>
<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Usuwanie filmu</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <h1>Na pewno chcesz usunąć film?</h1>
    <a href="index.php?action=moviesList">NIE</a>
    <a href="index.php?action=deleteMovie&confirmed=1">TAK</a>
</main>
<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Usuwanie kategorii</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <h1>Na pewno chcesz usunąć kategorię?</h1>
    <a href="index.php?action=categoryList">NIE</a>
    <a href="index.php?action=deleteCategory&confirmed=1">TAK</a>
</main>
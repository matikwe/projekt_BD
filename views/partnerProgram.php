<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Program partnerski</title>
</head>
<body>
<?php
include "topMenu.php";

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$url = "https://";
else
$url = "http://";

$url.= $_SERVER['HTTP_HOST'];

$url.= '/projekt_BD/index.php?action=registration&ReffID='.$_SESSION['ReffID'];

echo 'Zarabiaj 10 % za każdy zakup !!! Twój link: '.$url;
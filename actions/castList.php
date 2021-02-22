<?php
include 'Actor.php';

if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT * FROM OBSADA o INNER JOIN AKTORZY a ON o.ID_AKTOR = a.ID_AKTOR WHERE o.ID_FILM = ".$_SESSION['ID']);

$i = 0;
foreach($query as $row) {
    $actors[$i] = new Actor($row['ID_AKTOR'], $row['IMIE'], $row['NAZWISKO']);
    $i++;
}
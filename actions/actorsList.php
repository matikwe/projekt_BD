<?php

include 'Actor.php';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT * FROM AKTORZY");

$i = 0;
foreach($query as $row) {
    $actors[$i] = new Actor($row['ID_AKTOR'], $row['IMIE'], $row['NAZWISKO']);
    $i++;
}
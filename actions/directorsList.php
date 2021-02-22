<?php

include 'Director.php';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT * FROM REZYSERZY");

$i = 0;
foreach($query as $row) {
    $dirs[$i] = new Director($row['ID_REZYSER'], $row['IMIE'], $row['NAZWISKO']);
    $i++;
}
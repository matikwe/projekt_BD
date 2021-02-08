<?php

include 'Category.php';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT * FROM KATEGORIE");

$i = 0;
foreach($query as $row) {
    $categories[$i] = new Category($row['ID_KATEGORIA'], $row['KATEGORIA']);
    $i++;
}
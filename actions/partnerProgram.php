<?php

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT coalesce (SUM(cena-rabat), '0') FROM wypozyczenia WHERE ID_PRACOWNIK = '".$_SESSION['idreff']."' AND extract(year from DATA_WYPOZYCZENIA)= extract(year from cast('NOW' as date))");

foreach($query as $row) {
    $_SESSION['profitY'] = $row['COALESCE'];
}

$query = $dbh->query("SELECT coalesce (SUM(cena-rabat), '0') FROM wypozyczenia WHERE ID_PRACOWNIK = '".$_SESSION['idreff']."' AND extract(year from DATA_WYPOZYCZENIA)= extract(year from cast('NOW' as date)) 
AND extract(month from DATA_WYPOZYCZENIA)= extract(month from cast('NOW' as date))");

foreach($query as $row) {
    $_SESSION['profitM'] = $row['COALESCE'];
}

$query = $dbh->query("SELECT coalesce (SUM(cena-rabat), '0') FROM wypozyczenia WHERE ID_PRACOWNIK = '".$_SESSION['idreff']."' AND DATA_WYPOZYCZENIA= cast('NOW' as date)");

foreach($query as $row) {
    $_SESSION['profitD'] = $row['COALESCE'];
}

<?php

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT coalesce (SUM(cena-rabat), '0') FROM wypozyczenia WHERE ID_PRACOWNIK = '".$_SESSION['idreff']."' AND extract(year from DATA_WYPOZYCZENIA)= extract(year from cast('NOW' as date))");

foreach($query as $row) {
    $_SESSION['profitY'] = round($row['COALESCE'] * 0.1, 2); //10% od zysku
}

$query = $dbh->query("SELECT coalesce (SUM(cena-rabat), '0') FROM wypozyczenia WHERE ID_PRACOWNIK = '".$_SESSION['idreff']."' AND extract(year from DATA_WYPOZYCZENIA)= extract(year from cast('NOW' as date)) 
AND extract(month from DATA_WYPOZYCZENIA)= extract(month from cast('NOW' as date))");

foreach($query as $row) {
    $_SESSION['profitM'] = round($row['COALESCE'] * 0.1, 2);//10% od zysku
}

$query = $dbh->query("SELECT coalesce (SUM(cena-rabat), '0') FROM wypozyczenia WHERE ID_PRACOWNIK = '".$_SESSION['idreff']."' AND DATA_WYPOZYCZENIA= cast('NOW' as date)");

foreach($query as $row) {
    $_SESSION['profitD'] = round($row['COALESCE'] * 0.1,2);//10% od zysku
}

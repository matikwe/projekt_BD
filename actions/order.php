<?php

$currID = $_SESSION['currID'];

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

$query = $dbh->query("SELECT CENA, ID_UZYTKOWNIK, cast('NOW' as date) FROM wypozyczenia WHERE ID_UZYTKOWNIK='".$currID."' AND extract(year from DATA_WYPOZYCZENIA) = extract(year from cast('NOW' as date)) ORDER BY ID_UZYTKOWNIK");
$price = 0;
foreach ($query as $row){
   $price += $row['CENA'];
   $currDATE = $row['CAST'];
}
if($price >= 200){
    $RABAT = $_GET['price'] * 0.1;
}else{
    $RABAT = 0;
}
$idreff = $_SESSION['idreff'];
$IDfilm = $_GET['id_film'];
$currPrice = $_GET['price'];

$query = $dbh->query("INSERT INTO WYPOZYCZENIA (ID_UZYTKOWNIK, DATA_WYPOZYCZENIA, ID_PRACOWNIK, DATA_WYGASNIECIA_FILMU, ID_FILM, RABAT, CENA) values('".$currID."', '".$currDATE."','1','11.11.1111','".$IDfilm."','".$RABAT."','".$currPrice."')");


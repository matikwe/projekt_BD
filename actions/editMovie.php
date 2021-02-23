<?php

include 'Director.php';
include 'Category.php';

$_SESSION['error'] = '';

if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

if(isset($_POST['title']) && isset($_POST['director']) && isset($_POST['category']) && isset($_POST['year']) && isset($_POST['age']) && isset($_POST['price1']) && isset($_POST['price2'])) {
    $price = $_POST['price1'] + $_POST['price2'] / 100;
    $query = $dbh->query("UPDATE FILMY SET ID_KATEGORIA=".$_POST['category'].", TYTUL='".$_POST['title']."', ID_REZYSER=".$_POST['director'].", ROK_WYDANIA=".$_POST['year'].", PRZEDZIAL_WIEKOWY=".$_POST['age'].", BIEZACA_CENA=".$_POST['price']." WHERE ID_FILM=".$_SESSION['ID']);
    header('Location: index.php?action=moviesList');
} else {
    $query = $dbh->query("SELECT * FROM REZYSERZY");

    $i = 0;
    foreach ($query as $row) {
        $_SESSION['directors'][$i] = serialize(new Director($row['ID_REZYSER'], $row['IMIE'], $row['NAZWISKO']));
        $i++;
    }

    $query = $dbh->query("SELECT * FROM KATEGORIE");

    $j = 0;
    foreach ($query as $row) {
        $_SESSION['category'][$j] = serialize(new Category($row['ID_KATEGORIA'], $row['KATEGORIA']));
        $j++;
    }
}
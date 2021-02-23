<?php
include 'Director.php';
include 'Category.php';

$_SESSION['error'] = '';
$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

if(isset($_POST['title']) && isset($_POST['director']) && isset($_POST['category']) && isset($_POST['year']) && isset($_POST['age']) && isset($_POST['price1']) && isset($_POST['price2'])) {
    $price = $_POST['price1'] + $_POST['price2'] / 100;
    $dbh->query("INSERT INTO FILMY (ID_KATEGORIA, TYTUL, ID_REZYSER, ROK_WYDANIA, PRZEDZIAL_WIEKOWY, BIEZACA_CENA) 
                            VALUES ('".$_POST['category']."', '".$_POST['title']."', '".$_POST['director']."', '".$_POST['year']."', '".$_POST['age']."', '".$price."')");
    header("Location: index.php?action=moviesList");
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
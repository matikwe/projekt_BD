<?php
$_SESSION['error'] = '';
if(isset($_POST['category'])) {
    $category = strtolower($_POST['category']);
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("SELECT COUNT(KATEGORIA) FROM KATEGORIE WHERE KATEGORIA='".$category."'");
    $count = $query->fetchColumn();

    if($count <= 0){
        $query = $dbh->query("INSERT INTO KATEGORIE (KATEGORIA) VALUES('".$category."')");
        header('Location: index.php?action=categoriesList');
    } else {
        $_SESSION['error'] = 'Kategoria o takich danych już istnieje';
    }

}
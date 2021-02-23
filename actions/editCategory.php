<?php

if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}

if(isset($_POST['name'])) {
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("SELECT COUNT(KATEGORIA) FROM KATEGORIE WHERE KATEGORIA='".$_POST['name']."'");
    $count = $query->fetchColumn();
    if($count <= 0) {
        $query = $dbh->query("UPDATE KATEGORIE SET KATEGORIA='" . $_POST['name'] . "' WHERE ID_KATEGORIA=" . $_SESSION['ID']);
        header('Location: index.php?action=categoriesList');
    } else {
        $_SESSION['error'] = 'Kategoria o takich danych już istnieje';
    }
}
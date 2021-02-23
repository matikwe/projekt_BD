<?php

if(isset($_POST['name']) && isset($_POST['surname'])) {
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

    $query = $dbh->query("SELECT COUNT(ID_REZYSER) FROM REZYSERZY WHERE IMIE='".$_POST['name']."' AND NAZWISKO='".$_POST['surname']."'");
    $count = $query->fetchColumn();

    if($count <= 0){
        $query = $dbh->query("INSERT INTO REZYSERZY (IMIE, NAZWISKO) VALUES('".$_POST['name']."', '".$_POST['surname']."')");
        header('Location: index.php?action=directorsList');
    } else {
        $_SESSION['error'] = 'Reżyser o takich danych już istnieje';
    }
}
<?php

if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}

if(isset($_GET['confirmed'])) {
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("DELETE FROM REZYSERZY WHERE ID_REZYSER=".$_SESSION['ID']);
    header('Location: index.php?action=directorsList');
}
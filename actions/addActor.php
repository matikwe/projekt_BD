<?php

if(isset($_POST['name']) && $_POST['surname']) {
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("INSERT INTO AKTORZY (IMIE, NAZWISKO) VALUES ('".$_POST['name']."', '".$_POST['surname']."')");
    header('Location: index.php?action=actorsList');
}
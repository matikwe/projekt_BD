<?php
if(isset($_POST['category'])) {
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("INSERT INTO KATEGORIE (KATEGORIA) VALUES('".$_POST['category']."')");
    header('Location: index.php?action=categoriesList');
}
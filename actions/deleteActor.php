<?php
if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}
$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
if(isset($_GET['confirmed'])) {
    $query = $dbh->query("DELETE FROM AKTORZY WHERE ID_AKTOR=".$_SESSION['ID']);
    $query = $dbh->query("DELETE FROM OBSADA WHERE ID_AKTOR=".$_SESSION['ID']);
    header('Location: index.php?action=actorsList');
} else {
    $query = $dbh->query("SELECT IMIE, NAZWISKO FROM AKTORZY WHERE ID_AKTOR=".$_SESSION['ID']);
    foreach($query as $row) {
        $name = $row['IMIE'];
        $surname = $row['NAZWISKO'];
    }
}
if(empty($name) || empty($surname)) {
    header('Location: index.php?action=actorsList');
}
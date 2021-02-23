<?php

if(isset($_GET['id'])) {
    $_SESSION['ID2'] = $_GET['id'];
}

if(isset($_GET['confirmed'])) {
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("DELETE FROM OBSADA WHERE ID_AKTOR=".$_SESSION['ID2']." AND ID_FILM=".$_SESSION['ID']);
    header('Location: index.php?action=castList&id='.$_SESSION['ID']);
}
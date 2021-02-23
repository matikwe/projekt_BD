<?php
$_SESSION['error'] = '';
if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}
if(isset($_POST['add'])) {
    if (!empty($_POST['name']) && !empty($_POST['surname'])) {
        $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
        $query = $dbh->query("SELECT COUNT(ID_REZYSER) FROM REZYSERZY WHERE IMIE='" . $_POST['name'] . "' AND NAZWISKO='" . $_POST['surname'] . "'");
        $count = $query->fetchColumn();
        if ($count <= 0) {
            $query = $dbh->query("UPDATE REZYSERZY SET IMIE='" . $_POST['name'] . "', NAZWISKO='" . $_POST['surname'] . "' WHERE ID_REZYSER=" . $_SESSION['ID']);
            header('Location: index.php?action=directorsList');
        } else {
            $_SESSION['error'] = 'Reżyser o takich danych już istnieje';
        }
    } else {
        $_SESSION['error'] = "Uzupełnij dane!";
    }
}
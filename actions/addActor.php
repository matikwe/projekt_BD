<?php
$_SESSION['error'] = '';
if(isset($_POST['buttonLogin'])) {
    if (isset($_POST['name']) && $_POST['surname']) {
        $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
        $query = $dbh->query("SELECT COUNT(IMIE) FROM AKTORZY WHERE IMIE ='" . $_POST['name'] . "' AND NAZWISKO= '" . $_POST['surname'] . "'");
        $count = $query->fetchColumn();

        if ($count <= 0) {
            $query = $dbh->query("INSERT INTO AKTORZY (IMIE, NAZWISKO) VALUES ('" . $_POST['name'] . "', '" . $_POST['surname'] . "')");
            header('Location: index.php?action=actorsList');
        } else {
            $_SESSION['error'] = 'Aktor o takich danych już istnieje';
        }
    } else {
        $_SESSION['error'] .= ' Uzupełnij dane !';
    }
}
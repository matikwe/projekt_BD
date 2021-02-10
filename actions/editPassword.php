<?php
if(isset($_POST['action'])) {
    $passwordA = $_POST['passwordA'];
    $passwordB = $_POST['passwordB'];
    $_SESSION['error']='';

    $correct = true;

    if ($passwordA == $passwordB) {
        if (strlen($passwordA) < 7) {
            $_SESSION['error'] .= "Hasło musi mieć 8 znaków. ";
            $correct = false;
        }
    } else {
        $_SESSION['error'] .= "Hasło się różnią. ";
        $correct = false;
    }

    if ($correct == true) {
        $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
        $query = $dbh->query("UPDATE PRACOWNICY SET HASLO='" . $passwordA . "' WHERE ID_PRACOWNIK=" . $_SESSION['idreff']);
        header('Location: index.php?action=adminPanel');
    }
}
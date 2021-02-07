<?php
$_SESSION['error'] = '';
$correctLogin = false;

if(isset($_POST['buttonLogin'])){
    if(empty($_POST['login']) || empty($_POST['password'])) {
        $_SESSION['error'] = "Uzupełnij dane logowania.";
        $correctLogin = true;
    } else {
        $login = $_POST['login'];

        $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
        $query = $dbh->query("select id_pracownik, login, haslo from pracownicy WHERE login = "."'$login'");

        foreach ($query as $row) {
            if ($_POST['password'] == $row['HASLO']) {
                $correctLogin = true;
                $_SESSION['ReffID'] = $row['ID_PRACOWNIK'];
            }
        }

    }


    if($correctLogin == false) {
    $_SESSION['error'] = "Błędne dane logowania. ";
    }
}

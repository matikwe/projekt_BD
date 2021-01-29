<?php

$_SESSION['error'] = '';
$correctLogin = false;

if(isset($_POST['buttonLogin'])){
    if(empty($_POST['login']) || empty($_POST['password'])){
        $_SESSION['error'] = "Uzupełnij dane logowania.";
        $correctLogin = true;
    }else{
        $login = $_POST['login'];
        $dbh = ibase_connect('127.0.0.1:c:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey', 'WIN1250');
        $query = "select id_uzytkownik, login, haslo from uzytkownicy WHERE login = "."'$login'";
        $sth = ibase_query($dbh, $query);

        while ($row = ibase_fetch_object($sth)) {
                if(password_verify($_POST['password'], $row->HASLO) == true) {
                    $_SESSION['currID'] = $row->ID_UZYTKOWNIK;
                    $_SESSION['currUser'] = $row->LOGIN;
                    echo $_SESSION['currUser'];
                    $correctLogin = true;
                }
            }
            ibase_close($dbh);
        header("Location: index.php?action=home");
        }


        if($correctLogin == false) {
            $_SESSION['error'] = "Błędne dane logowania. ";
        }
}

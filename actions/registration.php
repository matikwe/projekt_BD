<?php

$_SESSION['error'] = '';

if(isset($_POST['action'])){

    $login = $_POST['login'];
    $passwordA = $_POST['passwordA'];
    $passwordB = $_POST['passwordB'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mailA = $_POST['mailA'];
    $mailB = $_POST['mailB'];
    $date = $_POST['date'];
    $correct = true;

    $dbh = ibase_connect('127.0.0.1:c:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey', 'WIN1250');
    $query = "select DISTINCT cast('TODAY' as date) from uzytkownicy";

    $sth = ibase_query($dbh, $query);

    while ($row = ibase_fetch_object($sth)) {
        $_SESSION['currTime'] = $row->CAST;
    }

    if(empty($login) || empty($passwordA) || empty($passwordB) || empty($name) ||
        empty($surname) || empty($mailA) || empty($mailB) || empty($date)){

        $_SESSION['error'] .= "Uzupełnij dane.";

    }else{

        if($passwordA == $passwordB){
            if(strlen($passwordA) < 7){
                $_SESSION['error'] .= "Hasło musi mieć 8 znaków. ";
                $correct = false;
            }
        }else{
            $_SESSION['error'] .= "Hasło się różnią. ";
            $correct = false;
        }

        if(filter_var($mailA, FILTER_VALIDATE_EMAIL)){
            if($mailA != $mailB){
                $_SESSION['error'] .= "Maile się różnią. ";
                $correct = false;
            }else{
                $query = "SELECT * FROM uzytkownicy WHERE email = "."'$mailA'";

                $sth = ibase_query($dbh, $query);

                if(ibase_fetch_row($sth) == false){
                    //nie ma takiego loginu
                }else{
                    $_SESSION['error'] .= "Podany email istnieje. ";
                    $correct = false;
                }
            }
        }else{
            $_SESSION['error'] .= "Zły format maila. ";
            $correct = false;
        }

        $query = "SELECT * FROM uzytkownicy WHERE login = "."'$login'";

        $sth = ibase_query($dbh, $query);

        if(ibase_fetch_row($sth) == false){
            //nie ma takiego loginu
        }else{
            $_SESSION['error'] .= "Podany login istnieje. ";
            $correct = false;
        }
    }

    //warunek instniejacego maila
    if($correct == true) {

        $passHash = password_hash($passwordA, PASSWORD_DEFAULT);

        $query = "INSERT INTO uzytkownicy (login, haslo, imie, nazwisko, email, data_urodzenia) 
                    values('$login', '$passHash', '$name', '$surname', '$mailA', '$date')";

        $sth = ibase_query($dbh, $query);

        header("Location: index.php?action=login");
    }

    ibase_close($dbh);
}



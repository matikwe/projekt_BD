<?php

$_SESSION['error'] = '';

if(isset($_POST['action'])){

    $login = strtolower($_POST['login']);
    $passwordA = $_POST['passwordA'];
    $passwordB = $_POST['passwordB'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mailA = strtolower($_POST['mailA']);
    $mailB = strtolower($_POST['mailB']);
    $date = $_POST['date'];
    $correct = true;

    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("select DISTINCT cast('TODAY' as date) from uzytkownicy");

    foreach($query as $row) {
        $_SESSION['currTime'] = $row['CAST'];
    }

    if(empty($login) || empty($passwordA) || empty($passwordB) || empty($name) ||
        empty($surname) || empty($mailA) || empty($mailB) || empty($date)) {

        $_SESSION['error'] .= "Uzupełnij dane.";
        $correct = false;
    } else {

        if($passwordA == $passwordB) {
            if(strlen($passwordA) < 7) {
                $_SESSION['error'] .= "Hasło musi mieć 8 znaków. ";
                $correct = false;
            }
        } else {
            $_SESSION['error'] .= "Hasło się różnią. ";
            $correct = false;
        }

        if(filter_var($mailA, FILTER_VALIDATE_EMAIL)) {
            if($mailA != $mailB) {
                $_SESSION['error'] .= "Maile się różnią. ";
                $correct = false;
            } else {
                        $query = $dbh->query("SELECT count(email) FROM uzytkownicy WHERE email = "."'$mailA'");

                        if($query->fetchColumn() >= 1) { //tu coś
                            $_SESSION['error'] .= "Podany email istnieje. ";
                            $correct = false;
                        }
                    }
        }else {
            $_SESSION['error'] .= "Zły format maila. ";
            $correct = false;
        }

        $query = $dbh->query("SELECT count(login) FROM uzytkownicy WHERE login = '".$login."'");

        if($query->fetchColumn() >= 1) { //tu coś
            $_SESSION['error'] .= "Podany login istnieje. ";
            $correct = false;
        }
    }

    if($correct == true) {

        $passHash = password_hash($passwordA, PASSWORD_DEFAULT);

        $query = $dbh->query("INSERT INTO uzytkownicy (login,haslo,imie,nazwisko,email,data_urodzenia) values('".$login."','".$passHash."','".$name."','".$surname."','".$mailA."','".$date."')");
        header("Location: index.php?action=login");
    }
}



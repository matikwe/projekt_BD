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
            }
        }else{
            $_SESSION['error'] .= "Zły format maila. ";
            $correct = false;
        }
    }

    //warunek istniejącego usera

    //warunek instniejacego maila

    //dodanie do bazy

}

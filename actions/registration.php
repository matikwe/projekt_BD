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

    if(empty($login) || empty($passwordA) || empty($passwordB) || empty($name) ||
        empty($surname) || empty($mailA) || empty($mailB) || empty($date)){

        $_SESSION['error'] = 'ello';

    }else{
        $_SESSION['error'] = 'dalsdze kroki';

    }
}

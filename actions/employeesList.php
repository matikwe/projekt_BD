<?php

include 'Employees.php';
include "Role.php";

$_SESSION['error']='';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT ID_PRACOWNIK, LOGIN, coalesce(ROLA,'brak') FROM PRACOWNICY P LEFT OUTER JOIN ROLE R ON P.ID_ROLA = R.ID_ROLA ORDER BY LOGIN, ROLA");

$i = 0;
foreach ($query as $row){
    $employees = new Employees($row['ID_PRACOWNIK'],$row['LOGIN'],$row['COALESCE']);
    $_SESSION['employees'][$i] = serialize($employees);
    $i++;
}

$_SESSION['countEmployees'] = $i;

$query = $dbh->query("SELECT * FROM ROLE");

$i=0;
foreach ($query as $row){
    $roles = new Role($row['ID_ROLA'], $row['ROLA']);
    $_SESSION['roles'][$i] = serialize($roles);
    $i++;
}
$_SESSION['countRoles'] = $i;

if(!empty($_GET['a'])) {
    if ($_GET['a'] == 'add') {
        if (empty($_POST['login'])) {
            if(isset($_POST['action']))
                $_SESSION['error'] = 'Wpisz login';
        }else{
            $login = strtolower($_POST['login']);
            $query = $dbh->query("SELECT COUNT(ID_PRACOWNIK) FROM PRACOWNICY WHERE LOGIN='".$login."'");
            if($query ->fetchColumn() > 0){
                $_SESSION['error'] .= 'Podany login już na istnieje...';
            }else{
                $query = $dbh->query("INSERT INTO PRACOWNICY (LOGIN, HASLO, ID_ROLA) VALUES('".$login."','123','".$_POST['role']."')");
                header('Location: index.php?action=employeesList');
            }
        }
    }else if($_GET['a'] == 'edit') {
        if(isset($_POST['action'])) {
            $query = $dbh->query("UPDATE PRACOWNICY SET ID_ROLA='" . $_POST['role'] . "' WHERE ID_PRACOWNIK=" . $_GET['id']);
            header('Location: index.php?action=employeesList');
        }
    }else if($_GET['a'] == 'delete') {
        $query = $dbh->query("DELETE FROM PRACOWNICY WHERE ID_PRACOWNIK=" . $_GET['id']);
        header('Location: index.php?action=employeesList');
    }
}
<?php
include "Role.php";

$_SESSION['error']='';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT * FROM ROLE");

$i=0;
foreach ($query as $row){
    $roles = new Role($row['ID_ROLA'], $row['ROLA']);
    $_SESSION['roles'][$i] = serialize($roles);
    $i++;
}
$_SESSION['countRoles'] = $i;

if(!empty($_GET['a'])) {
    if ($_GET['a'] == 'delete') {
        $query = $dbh->query("DELETE FROM ROLE WHERE ID_ROLA=" . $_GET['id']);
        header('Location: index.php?action=roleList');

    }else if($_GET['a'] == 'edit'){
        if(empty($_POST['role'])){
            if(isset($_POST['action']))
                $_SESSION['error'] = 'Wpisz rolę';
        }else{
            $query = $dbh->query("UPDATE ROLE SET ROLA='" . $_POST['role'] . "' WHERE ID_ROLA=" . $_GET['id']);
            header('Location: index.php?action=roleList');
        }
    }else if($_GET['a'] == 'add'){
        if(empty($_POST['role'])){
            if(isset($_POST['action']))
                $_SESSION['error'] = 'Wpisz rolę';
        }else{
            $role = strtolower($_POST['role']);
            $query = $dbh->query("SELECT COUNT(ID_ROLA) FROM ROLE WHERE ROLA='".$role."'");
            if($query ->fetchColumn() > 0){
                $_SESSION['error'] .= 'Podana rola jest już na liście...';
            }else{
                $query = $dbh->query("INSERT INTO ROLE (ROLA) VALUES('".$role."')");
                header('Location: index.php?action=roleList');
            }
        }
    }
}
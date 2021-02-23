<?php
$_SESSION['error'] = '';
if(isset($_GET['id'])) {
    $_SESSION['ID'] = $_GET['id'];
}
if(isset($_POST['add'])){

    if(!empty($_POST['category'])) {
    $category = strtolower($_POST['category']);
    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
    $query = $dbh->query("SELECT COUNT(KATEGORIA) FROM KATEGORIE WHERE KATEGORIA='".$category."'");
    $count = $query->fetchColumn();
    if($count <= 0) {
        $query = $dbh->query("UPDATE KATEGORIE SET KATEGORIA='" . $category . "' WHERE ID_KATEGORIA=" . $_SESSION['ID']);
        header('Location: index.php?action=categoriesList');
    } else {
        $_SESSION['error'] = 'Kategoria o takich danych już istnieje';
    }
}else{
        $_SESSION['error'] = "Uzupełnij dane !";
    }
}
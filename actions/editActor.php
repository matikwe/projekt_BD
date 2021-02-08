<?php

 if(isset($_GET['id'])) {
     $_SESSION['ID'] = $_GET['id'];
 }

 if(isset($_POST['name']) && isset($_POST['surname'])) {
     $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
     $query = $dbh->query("UPDATE AKTORZY SET IMIE='".$_POST['name']."', NAZWISKO='".$_POST['surname']."' WHERE ID_AKTOR=".$_SESSION['ID']);
     header('Location: index.php?action=actorsList');
 }
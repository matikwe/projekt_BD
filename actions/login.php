<?php
include 'MovieV2.php';

$_SESSION['error'] = '';
$correctLogin = false;

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

if(isset($_POST['buttonLogin'])){
    if(empty($_POST['login']) || empty($_POST['password'])) {
        $_SESSION['error'] = "Uzupełnij dane logowania.";
        $correctLogin = true;
    } else {
        $login = $_POST['login'];
        $query = $dbh->query("select id_uzytkownik, login, haslo, ID_REFF, extract(year from DATA_URODZENIA) from uzytkownicy WHERE login = "."'$login'");

        foreach($query as $row) {

            if(password_verify($_POST['password'], $row['HASLO']) == true) {
                $_SESSION['currID'] = $row['ID_UZYTKOWNIK'];
                $_SESSION['currUser'] = $row['LOGIN'];
                $_SESSION['idreff'] = $row['ID_REFF'];
                $_SESSION['DateOfBirth'] = $row['EXTRACT'];
                $correctLogin = true;
                header("Location: index.php?action=home");
            }
        }
    }
    if($correctLogin == false) {
        $_SESSION['error'] = "Błędne dane logowania. ";
    }
}



    if(!empty($_GET['display'])&&(!empty($_SESSION['currID']))){

        if(($_GET['display'] == 'current')){

            $query = $dbh->query("SELECT TYTUL, KATEGORIA, ROK_WYDANIA, DATA_WYPOZYCZENIA, DATA_WYGASNIECIA_FILMU, COALESCE(CENA, 0) - COALESCE(RABAT, 0)
                FROM FILMY F
                LEFT OUTER JOIN WYPOZYCZENIA W ON W.ID_FILM=F.ID_FILM
                LEFT OUTER JOIN KATEGORIE K ON F.ID_KATEGORIA=K.ID_KATEGORIA
                WHERE (DATA_WYGASNIECIA_FILMU - CAST('NOW' AS DATE)) >=0 AND ID_UZYTKOWNIK='".$_SESSION['currID']."'
                ORDER BY 1,2,3,4,5,6");

        }else if ($_GET['display'] == 'history'){
            $query = $dbh->query("SELECT TYTUL, KATEGORIA, ROK_WYDANIA, DATA_WYPOZYCZENIA, DATA_WYGASNIECIA_FILMU, COALESCE(CENA, 0) - COALESCE(RABAT, 0)
                FROM FILMY F
                LEFT OUTER JOIN WYPOZYCZENIA W ON W.ID_FILM=F.ID_FILM
                LEFT OUTER JOIN KATEGORIE K ON F.ID_KATEGORIA=K.ID_KATEGORIA
                WHERE ((DATA_WYGASNIECIA_FILMU - CAST('NOW' AS DATE)) < 0) AND ID_UZYTKOWNIK='".$_SESSION['currID']."'
                ORDER BY 1,2,3,4,5,6");
        }

        $i = 0;
        foreach ($query as $row){
            $movies[$i] = new MovieV2($row['TYTUL'], $row['KATEGORIA'], $row['ROK_WYDANIA'], $row['DATA_WYPOZYCZENIA'], $row['DATA_WYGASNIECIA_FILMU'], $row['SUBTRACT']);

            $i++;
        }
        $_SESSION['countMoviesV2'] = $i;

    }





<?php

    $currID = $_SESSION['currID'];
    $IDfilm = $_GET['id_film'];
    $_SESSION['errorOrder'] = '';
    $action = $_GET['a'];

    $dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

    $query = $dbh->query("SELECT COUNT(ID_WYPOZYCZENIE) FROM WYPOZYCZENIA WHERE ID_FILM ='" . $IDfilm . "' AND  ((DATA_WYGASNIECIA_FILMU-cast('NOW' as date)) >= 0)");

    foreach ($query as $row){
        $count = $row['COUNT'];
    }



        $query = $dbh->query("SELECT CENA, ID_UZYTKOWNIK FROM wypozyczenia WHERE ID_UZYTKOWNIK='" . $currID . "' AND extract(year from DATA_WYPOZYCZENIA) = extract(year from cast('NOW' as date)) ORDER BY ID_UZYTKOWNIK");
        $price = 0;
        foreach ($query as $row) {
            $price += $row['CENA'];
        }

        $query = $dbh->query("SELECT cast('NOW' as date) FROM wypozyczenia");

        foreach ($query as $row) {
            $currDATE = $row['CAST'];
        }

        if ($price >= 200) {
            $RABAT = $_GET['price'] * 0.1;

        } else {
            $RABAT = 0;
        }
        $query = $dbh->query("select cast('NOW' as date)+3 from FILMY");
        foreach ($query as $row) {
            $expirationDate = $row['ADD'];
        }
        if (empty($_SESSION['idreff'])) {
            $idreff = 0;
        } else {
            $idreff = $_SESSION['idreff'];
        }

        $currPrice = $_GET['price'];

        echo $count;
        if ($count > 0) {
            $_SESSION['errorOrder'] = 'Masz wypożyczony ten film na aktualny okres.';

        } else {
            $query = $dbh->query("INSERT INTO WYPOZYCZENIA (ID_UZYTKOWNIK, DATA_WYPOZYCZENIA, ID_PRACOWNIK, DATA_WYGASNIECIA_FILMU, ID_FILM, RABAT, CENA) values('" . $currID . "', '" . $currDATE . "','" . $idreff . "','" . $expirationDate . "','" . $IDfilm . "','" . $RABAT . "','" . $currPrice . "')");

        }

        header("Location: index.php?action=".$action);
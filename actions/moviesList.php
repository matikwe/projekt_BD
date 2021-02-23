<?php

include 'Movie.php';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = $dbh->query("SELECT * FROM FILMY f 
    LEFT OUTER JOIN KATEGORIE k ON f.ID_KATEGORIA = k.ID_KATEGORIA 
    LEFT OUTER JOIN REZYSERZY r ON f.ID_REZYSER = r.ID_REZYSER
    ORDER BY TYTUL, KATEGORIA");

$i = 0;
foreach($query as $row) {
    $movies[$i] = new Movie($row['ID_FILM'],
        $row['ID_KATEGORIA'],
        $row['KATEGORIA'],
        $row['ID_REZYSER'],
        $row['TYTUL'],
        $row['IMIE'],
        $row['NAZWISKO'],
        $row['ROK_WYDANIA'],
        $row['PRZEDZIAL_WIEKOWY'],
        $row['BIEZACA_CENA']);
    $i++;
}
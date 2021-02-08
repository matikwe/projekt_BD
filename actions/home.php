<?php

include 'Actor.php';
include 'Movie.php';

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

$query = $dbh->query("SELECT ID_FILM, F.ID_KATEGORIA, KATEGORIA, F.ID_REZYSER, TYTUL, IMIE, NAZWISKO, ROK_WYDANIA, PRZEDZIAL_WIEKOWY, BIEZACA_CENA FROM FILMY F left outer join KATEGORIE K ON F.ID_KATEGORIA = K.ID_KATEGORIA
left outer join REZYSERZY R ON F.ID_REZYSER = R.ID_REZYSER");

$i = 0;
foreach($query as $row) {
    $films = new Movie($row['ID_FILM'], $row['ID_KATEGORIA'], $row['KATEGORIA'], $row['ID_REZYSER'], $row['TYTUL'],
        $row['IMIE'], $row['NAZWISKO'], $row['ROK_WYDANIA'], $row['PRZEDZIAL_WIEKOWY'], $row['BIEZACA_CENA']);
    $_SESSION['films'][$i] = serialize($films);
    $i++;
}

$_SESSION['countFilms'] = $i;
$query = $dbh->query("SELECT O.ID_FILM, A.ID_AKTOR, IMIE, NAZWISKO FROM AKTORZY A left outer join OBSADA O ON A.ID_AKTOR=O.ID_AKTOR");

$i = 0;
foreach($query as $row) {
    $actors = new Actor($row['ID_AKTOR'], $row['IMIE'], $row['NAZWISKO']);
    $_SESSION['ID_FILM'][$i] = $row['ID_FILM'];
    $_SESSION['actors'][$i] = serialize($actors);
    $i++;
}
$_SESSION['countActors'] = $i;
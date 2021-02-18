<?php
include 'Category.php';
include 'Movie.php';
include "Actor.php";

$dbh = new PDO('firebird:dbname=127.0.0.1:C:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');

$query = $dbh->query("SELECT ID_KATEGORIA, KATEGORIA FROM KATEGORIE");

$i = 0;
foreach ($query as $row){
    $categories = new Category($row['ID_KATEGORIA'], $row['KATEGORIA']);
    $_SESSION['categories'][$i] = serialize($categories);
    $i++;
}
$_SESSION['countCategories'] = $i;

if(isset($_POST['buttonSearch'])) {
    $INFO = $_POST['info'];

    $query = $dbh->query("SELECT DISTINCT COALESCE(ID_FILM,0)
        FROM AKTORZY A
        LEFT OUTER JOIN OBSADA O ON A.ID_AKTOR=O.ID_AKTOR
        WHERE IMIE || ' ' || NAZWISKO LIKE '%".$INFO."%'");

    $in = ' OR F.ID_FILM IN(';
    $tmp = '';
    $count = 0;
    foreach ($query as $row){
        if($row['COALESCE'] >= 1) {
            $tmp .= $row['COALESCE'] . ', ';
            $count ++;
        }
    }
    $in .= substr($tmp,0,strlen($tmp)-2);
    $in .= ')';
    if($count <= 0)
        $in = '';
    $query = $dbh->query("SELECT DISTINCT F.ID_FILM, K.ID_KATEGORIA, KATEGORIA, R.ID_REZYSER, TYTUL, IMIE, NAZWISKO, ROK_WYDANIA, PRZEDZIAL_WIEKOWY, BIEZACA_CENA
        FROM FILMY F
        LEFT OUTER JOIN KATEGORIE K ON F.ID_KATEGORIA=K.ID_KATEGORIA
        LEFT OUTER JOIN REZYSERZY R ON F.ID_REZYSER=R.ID_REZYSER
        LEFT OUTER JOIN OBSADA O ON F.ID_FILM=O.ID_FILM
        WHERE K.ID_KATEGORIA = '".$_POST['category']."' AND( TYTUL LIKE '%".$INFO."%' OR IMIE || ' ' || NAZWISKO LIKE '%".$INFO."%' $in) ");

    $i = 0;
    foreach ($query as $row){
        $movies = new Movie($row['ID_FILM'], $row['ID_KATEGORIA'], $row['KATEGORIA'], $row['ID_REZYSER'], $row['TYTUL'], $row['IMIE'], $row['NAZWISKO'], $row['ROK_WYDANIA'], $row['PRZEDZIAL_WIEKOWY'], $row['BIEZACA_CENA']);
        $_SESSION['searchMovies'][$i] = serialize($movies);
        $i++;
    }
    $_SESSION['countSearchMovies'] = $i;

    $query = $dbh->query("SELECT O.ID_FILM, A.ID_AKTOR, IMIE, NAZWISKO FROM AKTORZY A left outer join OBSADA O ON A.ID_AKTOR=O.ID_AKTOR");

    $i = 0;
    foreach($query as $row) {
        $actors = new Actor($row['ID_AKTOR'], $row['IMIE'], $row['NAZWISKO']);
        $_SESSION['ID_FILM'][$i] = $row['ID_FILM'];
        $_SESSION['actors'][$i] = serialize($actors);
        $i++;
    }
    $_SESSION['countActors'] = $i;

}

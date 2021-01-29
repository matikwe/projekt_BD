<?php

$dbh = ibase_connect('127.0.0.1:c:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey', 'WIN1250');
$query = "SELECT * FROM AKTORZY";

$sth = ibase_query($dbh, $query);
while ($row = ibase_fetch_object($sth)) {
    echo $row->IMIE, $row->NAZWISKO, "\n";
}

ibase_free_result($sth);
ibase_close($dbh);

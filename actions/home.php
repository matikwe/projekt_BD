<?php

$dbh = ibase_connect('127.0.0.1:c:\bazy\PROJEKT.FDB', 'SYSDBA', 'masterkey');
$query = "SELECT test FROM TEST";

$sth = ibase_query($dbh, $query);
while ($row = ibase_fetch_object($sth)) {
    echo $row->TEST, "\n";
}

ibase_free_result($sth);
ibase_close($dbh);

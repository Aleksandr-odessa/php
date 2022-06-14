<?php
function createDB($nameDB) {
$link = new mysqli("localhost", "root", "");
if ($link){
    echo "connection is successful";
}
else {
    die ("Error: connection to MySQL is not successful " . $link->connect_error);
}
$link -> set_charset("utf8");
$create = "CREATE DATABASE $nameDB";
if ($link->query($create)) {
    echo "<br> Data base created";
}
else {
    echo "<br> Error of creating data base,". $link->error;
}
echo  "<br> Connection completed";
$link->close();
}

createDB('Loterie');
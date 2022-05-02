<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "swzsso";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Połączenie z bazą nie powiodło się: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}

?>
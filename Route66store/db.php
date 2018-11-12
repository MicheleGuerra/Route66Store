<?php

$servername = "127.0.0.1";
$username = "root";
$password = "password";
$db = "ecom";

// CREA CONNESSIONE
$con = mysqli_connect($servername, $username, $password,$db);

// CONTROLLO CONNESSIONE
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

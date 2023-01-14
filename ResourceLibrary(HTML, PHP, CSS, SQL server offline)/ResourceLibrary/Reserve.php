<?php
session_start();

//Change to require once connect
$db = new mysqli("fareham.city.ac.uk", "adbb016", "190007030", "adbb016"); 
if ($db->connect_errno) {
    echo("Connection failed");
    exit();
} else {
    echo ("Connected");
}



?>
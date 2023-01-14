<?php
//Connects to the database
$db = new mysqli("fareham.city.ac.uk", "adbb016", "190007030", "adbb016");
if ($db->connect_errno) {
    echo("Connection failed");
    exit();
}
?>
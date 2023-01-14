
<?php
//Destroys the session, resulting in the user being logged out
session_start();
session_destroy();
//Returns to main index page
header('location:index.php');
?>
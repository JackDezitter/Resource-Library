<?php
session_start();
//Change to require once connect
require_once "connect.php";
//Takes the inputted values from the search form, sanitises the data and sets session variables to match each input, used to display the search results in Search.php
if(!empty($_POST) && $_POST['form'] == '#searchForm'){
    $title = htmlspecialchars($_POST['title']);
    $title = strip_tags($title);
    $title = mysqli_real_escape_string($db, $title);

    $module = htmlspecialchars($_POST['module']);
    $module = strip_tags($module);
    $module = mysqli_real_escape_string($db, $module);

    $author = htmlspecialchars($_POST['author']);
    $author = strip_tags($author);
    $author = mysqli_real_escape_string($db, $author);

    $_SESSION["SearchTitle"] = $title;
    $_SESSION["SearchModule"] = $module;
    $_SESSION["SearchAuthor"] = $author;
    echo("Success");
}
?>
<?php
session_start();
//Connects to database
require_once "connect.php";

//Takes the title of the resource being reserved and if there is a logged in user the title, user and datetime are inputted as an entry into the Loan database
$title = $_POST['title'];
$title = htmlspecialchars($title);
$title = strip_tags($title);
$title = mysqli_real_escape_string($db, $title);
if(isset($_SESSION["User"])){
    $user = $_SESSION["User"];
    $user = htmlspecialchars($user);
    $user = strip_tags($user);
    $user = mysqli_real_escape_string($db,$user);

    $date = date('Y-m-d h:i:s');

    echo($title);
    echo($user);
    echo($date);
    //Prepare the query, set its parameters and run it
    if($query = $db->prepare("INSERT INTO Loan (ResourceTitle, LoanDate, UserEmail) VALUES (?,?,?)")){

        $query -> bind_param('sss',$title,$date,$user);
        $query->execute();

        //Successful query
        if($query->affected_rows >0){
            //Retrieves Stock of the current resource
            $query = "SELECT Stock FROM Resources WHERE ResourceTitle = '".$title."'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
            //Updates stock to be current stock - 1
            $query = $db->prepare("UPDATE Resources SET Stock ='".--$row['Stock']."' WHERE ResourceTitle = '".$title."'");
            $query->execute();
            echo "Reserved";
        }

    }
    else{
        //A database error has occured
        echo "No";
    }
}


else{
    //If there is no user an alert will tell the user they must be logged in to reserve resources
    echo(noUser);
}

?>
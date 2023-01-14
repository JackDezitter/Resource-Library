<?php
//Creates new accounts or logs users into accounts
session_start();

require_once "connect.php";

//If the form inputted is the create account form
if(!empty($_POST) && $_POST['form'] == '#createAccountForm'){

    //Sanitises email, password, first name and last name data
    $email = htmlspecialchars($_POST['email']);
    $email = strip_tags($email);
    $email = mysqli_real_escape_string($db, $email);

    $password = htmlspecialchars($_POST['password']);
    $password = strip_tags($password);
    $password = mysqli_real_escape_string($db, $password);

    $firstName = htmlspecialchars($_POST['firstName']);
    $firstName = strip_tags($firstName);
    $firstName = mysqli_real_escape_string($db, $firstName);

    $lastName = htmlspecialchars($_POST['lastName']);
    $lastName = strip_tags($lastName);
    $lastName = mysqli_real_escape_string($db, $lastName);

    //Check if there is currently an account with said email in the database through counting how many entries in user have the given email
    $query = "SELECT COUNT(*) AS count FROM User WHERE Email = '".$email."'";
    $result = $db->query($query);
    $data = $result->fetch_assoc();

    //If there is at least 1 entry
    if($data['count']>0){
        //User is notified that the email address is already in use
        echo "email";
    }
    else{
        //Hash password
        $passwordHash = md5($password);

        //Inserts data into database User
        if($query = $db->prepare("INSERT INTO User (First_Name, Last_Name, Email, Password) VALUES (?,?,?,?)")){
            $query -> bind_param('ssss',$firstName,$lastName, $email,$passwordHash);
            $query->execute();

            //Successful query
            if($query->affected_rows >0){
                echo "Yes";
                //Sets the session user to the email submitted so they are logged on
                $_SESSION["User"] = $email;
            }
            else{
                //A database error has occured
                echo "No";
            }
        }
    }
}
//If the form submitted is the log-in form
if(!empty($_POST) && $_POST['form'] == '#log-in-form'){
    //Sanitise email and password. Hash password
    $email = htmlspecialchars($_POST['email']);
    $email = strip_tags($email);
    $email = mysqli_real_escape_string($db, $email);

    $password = htmlspecialchars($_POST['password']);
    $password = strip_tags($password);
    $password = mysqli_real_escape_string($db, $password);
    $passwordHash = md5($password);

    //Counts how many entries in User have the given email and password
    $query = "SELECT COUNT(*) AS count FROM User WHERE Email = '".$email."' AND Password = '".$passwordHash."'";
    $result = $db->query($query);
    $data = $result->fetch_assoc();

    //If there is an entry with the given email and password the user is logged in and the session user is set to the given email
    if($data['count']>0){
        echo "Logged-In";
        $_SESSION["User"] = $email;

    }
    else{
        //If there is not match with the given email and password combination an alert is given to the user
        echo "failed-log-in";
    }
}

?>

<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/1/17
 * Time: 6:07 PM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    $mysqli = db_connection();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $license = $_POST['license'];
    $issue_date = $_POST['license_date'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $hashed_pw = password_encrypt($_POST['pw']);
    $password = $_POST['pw'];

    #Create a unique key for customer account
    do {
        $customerID = "CUST".rand(100,999);
        $checkIDquery = "SELECT * FROM Customer WHERE custID = '".$customerID."'";
        $result = $mysqli->query($checkIDquery);
    } while ($result->num_rows > 0);

    #Check to see if email has already been used
    $query = "SELECT * FROM Customer ";
    $query .= "WHERE email = '".$email."' ";
    $query .= "LIMIT 1";
    $result = $mysqli->query($query);
    if ($result && $result->num_rows > 0) {
        $_SESSION["message"] = "The email you provided has already been associated with an account.";
        redirect_to("signup.php");
        exit;
    }

    #If email has not been used, perform query to add customer
    $addQuery = "INSERT INTO Customer VALUES (";
    $addQuery .= "'".$customerID."', ";
    $addQuery .= "'".$fname."', ";
    $addQuery .= "'".$lname."', ";
    $addQuery .= "'".$street."', ";
    $addQuery .= "'".$city."', ";
    $addQuery .= "'".$state."', ";
    $addQuery .= "".$zip.", ";
    $addQuery .= "'".$phone."', ";
    $addQuery .= "'".$email."', ";
    $addQuery .= "'".$hashed_pw."', ";
    $addQuery .= "'".$dob."', ";
    $addQuery .= "'".$license."', ";
    $addQuery .= "'".$issue_date."')";

    $result = $mysqli->query($addQuery);
    if (!$result){
        $_SESSION["message"] = "The account can't be created.";
        redirect_to("signup.php");
        exit;
    }

    # Set session values:
    $_SESSION["userID"] = $customerID;
    $_SESSION["email"] = $email;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link href="signin.css" rel="stylesheet">
    </head>

    <body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">OXFORD CAR RENTAL</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
                <li><a href="reserve.php">Reserve</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <br/><br/>
        <div class="page-header">
            <?php
                echo "<h1><div class=\"text-center\">".$fname." ".$lname.", Welcome to Oxford Car Rental!</div></h1>";
            ?>
        </div>
        <br/>
    </div>

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }
    </style>

    </body>
</html>
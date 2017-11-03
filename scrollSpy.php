<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/2/17
 * Time: 2:49 PM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    verify_login();
    $mysqli = db_connection();

    $ID = $_SESSION['userID'];
    $query = "SELECT * FROM Customer ";
    $query .= "WHERE custID = '".$ID."' LIMIT 1";

    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        body {
            position: relative;
        }
        .affix {
            top: 100px;
        }
        .hr {
            border: none;
            height: 2px;
            /* Set the hr color */
            color: #2aabd2 ; /* old IE */
            background-color: #2aabd2; /* Modern Browsers */
        }
        div.col-lg-9 div {
            min-height: 450px;
            font-size: 20px;
        }
        #section1 {color: #0f0f0f; background-color: transparent;}
        #section2 {color: #0f0f0f; background-color: transparent;}
        #section3 {color: #0f0f0f; background-color: transparent;}
        #section4 {color: #0f0f0f; background-color: transparent;}
        #section5 {color: #0f0f0f; background-color: transparent;}

        @media screen and (max-width: 810px) {
            #section1, #section2, #section3, #section4, #section5  {
                margin-left: 150px;
            }
        }
    </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="15">

<nav class="navbar navbar-default navbar-static-top">
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
                <li class="active"><a href="account.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="page-header">
        <h1><div class="text-center">My Account</div></h1>
    </div>
    <br/>
</div>

<div class="container">
    <div class="row">
        <nav class="col-lg-3" id="myScrollspy">
            <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="200">
                <li><a href="#section1">Account Overview</a></li>
                <li><a href="#section2">My Reservations</a></li>
                <li><a href="#section3">Transaction History</a></li>
                <li><a href="#section4">Edit Account</a></li>
                <li><a href="#section5">Delete Account</a></li>
            </ul>
        </nav>
        <div class="col-lg-9">
            <div id="section1">
                <h1 style="color: #245580">Account Overview</h1>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody>
                <?php
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name</strong></td><td>".$row['fname']." ".$row['lname']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Birthdate</strong></td><td>".$row['DOB']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Address</strong></td><td>".$row['street']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>State</strong></td><td>".$row['state']."</td></tr>";
                echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>ZIP Code</strong></td><td>".$row['zip']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Phone</strong></td><td>".$row['phone']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Email</strong></td><td>".$row['email']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>License #</strong></td><td>".$row['license_number']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>License Issued Date</strong></td><td>".$row['license_issue_date']."</td></tr>";
                ?>
                    </tbody>
                </table>
            </div>
            <div id="section2">
                <hr>
                <h1 style="color: #245580"> My Reservations</h1>
                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            </div>
            <div id="section3">
                <hr>
                <h1 style="color: #245580"> Transaction History</h1>
                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            </div>
            <div id="section4">
                <hr>
                <h1 style="color: #245580"> Edit Account</h1>
                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            </div>
            <div id="section5">
                <hr>
                <h1 style="color: #245580"> Delete Account</h1>
                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>
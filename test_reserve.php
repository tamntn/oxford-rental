<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/4/17
 * Time: 11:51 PM
 */
require_once ('session.php');
require_once ('included_functions.php');
verify_login();
$mysqli = db_connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="signin.css" rel="stylesheet">

    <!--Inclduing Bootstrap Form Validation File-->
    <link href="dist/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="dist/js/bootstrapValidator.min.js"></script>

    <!-- DatePicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Moment -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }
    </style>
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
                <li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Print Alert if there's a message -->
<?php
if (($output = message()) !== null) {
    echo "<br/><br/><br/><br/>";
    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-2'></div>";
    echo "<div class='col-lg-8'>";
    echo        $output;
    echo "</div>";
    echo "<div class='col-lg-2'></div>";
    echo "</div>";
    echo "</div>";
}
else{
    echo "<br><br>";
}
?>

<div class="container-fluid">
    <div class="page-header">
        <h1><div class="text-center">NEW CUSTOMER SIGNUP</div></h1>
    </div>
    <br>
    <input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />

    <script type="text/javascript">
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                "autoApply": true,
                "startDate": "05/05/2017",
                "endDate": "05/15/2017",
                "minDate": "05/05/2017",
                "opens": "center"
            }, function(start, end, label) {
                console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
            });
        });
    </script>

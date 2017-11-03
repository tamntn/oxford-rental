<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/1/17
 * Time: 6:07 PM
 */
    require_once ('included_functions.php');
    $mysqli = db_connection();
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
                <li class="active"><a href="reserve.php">Reserve</a></li>
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
        <h1><div class="text-center">welcome to Oxford Car Rental!</div></h1>
    </div>
    <br/>
</div>
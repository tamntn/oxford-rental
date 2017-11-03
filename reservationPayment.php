<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/7/17
 * Time: 12:28 AM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    verify_login();
    $mysqli = db_connection();

    $start = $_POST['start'];
    $end = $_POST['end'];
    $length = $_POST['length'];
    $feeAmount = $_POST['feeCost'];
    $discountPercentage = $_POST['discount'];
    $total = $_POST['totalCost'];
    $VIN = $_POST['vin'];
    $custID = $_SESSION['userID'];
    $insuranceAmount = $_POST['insuranceCost'];

    // Get feeID from feeAmount
    $query = "SELECT * FROM Fee WHERE amount = ".$feeAmount;
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $feeID = $row['feeID'];

    // Get discount code from discountPercentage
    $query = "SELECT * FROM Discount WHERE percentage = ".$discountPercentage;
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $code = $row['code'];

    // Get insuranceID from insuranceAmount
    $query = "SELECT * FROM Insurance WHERE daily_cost = ".$insuranceAmount;
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $insuranceID = $row['insuranceID'];

    do {
        $resID = "RES".rand(1000,9999);
        $checkIDquery = "SELECT * FROM Reservation WHERE resID = '".$resID."'";
        $result = $mysqli->query($checkIDquery);
    } while ($result->num_rows > 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="signin.css" rel="stylesheet">

    <!--Inclduing Bootstrap Form Validation File-->
    <link href="dist/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="dist/js/bootstrapValidator.min.js"></script>

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
                <li class="active"><a href="reserve.php">Reserve</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <?php
            if(logged_in()){
                echo "<ul class='nav navbar-nav navbar-right'>";
                echo "<li><a href='account.php'><span class='glyphicon glyphicon-user'></span> My Account</a></li>";
                echo "<li><a href='signout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                echo "</ul>";
            }
            else{
                echo "<ul class='nav navbar-nav navbar-right'>";
                echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                echo "<li><a href='signin.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                echo "</ul>";
            }
            ?>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <br/><br/>
    <div class="page-header">
        <h1><div class="text-center">Payment Information</div></h1>
    </div>
    <br/>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="text-align: center">
            <form action="reservationConfirmation.php" method="post" id="payment-form" class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Card Number</label>
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input  name="cardnumber" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Card Type</label>
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select  name="cardtype" class="form-control" type="text">
                                    <option></option>
                                    <?php
                                        $query = "SELECT DISTINCT(type) AS 'CardType' FROM CreditCard";
                                        $result = $mysqli->query($query);
                                        while($row = $result->fetch_assoc()){
                                            echo "<option>".$row['CardType']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name on Card</label>
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="cardname" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Expiration Date</label>
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input  name="expiration" placeholder="MM/DD" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Security Code</label>
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input  name="securitycode" placeholder="3-digit number on the back" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <br>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" name="submitButton" id="submitButton" class="btn btn-lg btn-primary btn-block">Reserve</button>
                        </div>
                    </div>
                    <p style="text-align: center; font-size: 13px; color: #8c8c8c">You will not be charged until you pick up the vehicle.</p>
                    <p style="text-align: center; font-size: 13px; color: #8c8c8c">Reservations can be cancelled free of charge 48 hours before pickup day.</p>

                    <?php
                        echo "<input type='text' name='resID' id='resID' class='sr-only' value='".$resID."'>";
                        echo "<input type='text' name='start' id='start' class='sr-only' value='".$start."'>";
                        echo "<input type='text' name='end' id='end' class='sr-only' value='".$end."'>";
                        echo "<input type='text' name='length' id='length' class='sr-only' value='".$length."'>";
                        echo "<input type='text' name='feeID' id='feeID' class='sr-only' value='".$feeID."'>";
                        echo "<input type='text' name='code' id='code' class='sr-only' value='".$code."'>";
                        echo "<input type='text' name='totalCost' id='totalCost' class='sr-only' value='".$total."'>";
                        echo "<input type='text' name='vin' id='vin' class='sr-only' value='".$VIN."'>";
                        echo "<input type='text' name='insuranceID' id='insuranceID' class='sr-only' value='".$insuranceID."'>";
                    ?>

                </fieldset>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#payment-form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                cardnumber: {
                    validators: {
                        creditCard: {
                            message: 'Please enter a valid credit card number'
                        },
                        notEmpty: {
                            message: 'Please enter a credit card number'
                        }
                    }
                },
                cardtype: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose your card type'
                        }
                    }
                },
                cardname: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter the name on your card'
                        }
                    }
                },
                expiration: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your card expiration date'
                        }
                    }
                },
                securitycode: {
                    validators: {
                        cvv: {
                        },
                        notEmpty: {
                            message: 'Please enter your CVV code'
                        }
                    }
                }
            }
        })
    });
</script>

</body>
</html>
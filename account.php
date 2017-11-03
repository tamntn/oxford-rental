<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/2/17
 * Time: 2:49 PM
 * THIS FILE USES A DIFFERENT VERSION OF JQUERY DUE TO SMOOTH SCROLLING EMPLEMENT
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    verify_login();
    $mysqli = db_connection();

    // Set USER ID
    $ID = $_SESSION['userID'];

    // Check if update button has been submitted (edit-form)
    if(isset($_POST['update'])){
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $license = $_POST['license'];
        $issue_date = $_POST['license_date'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = "UPDATE Customer ";
        $query .= "SET street = '".$street."'";
        $query .= ", city = '".$city."'";
        $query .= ", state = '".$state."'";
        $query .= ", zip = ".$zip."";
        $query .= ", phone = '".$phone."'";
        $query .= ", email = '".$email."'";
        $query .= ", license_number = '".$license."'";
        $query .= ", license_issue_date = '".$issue_date."'";
        $query .= " WHERE custID = '".$ID."'";

        $result = $mysqli->query($query);

        if($result){
            $_SESSION["message"] = "YOUR ACCOUNT INFORMATION HAS BEEN UPDATED!";
        }
        else{
            $_SESSION["message"] = "UPDATE UNSUCCESSFULLY";
        }
    }
    elseif (isset($_POST['changepw'])){
        $checkPasswordQuery = "SELECT * FROM Customer ";
        $checkPasswordQuery .= "WHERE custID = '".$ID."'";
        $result = $mysqli->query($checkPasswordQuery);
        $row = $result->fetch_assoc();
        if (password_check($_POST['oldpw'], $row['hashed_pw'])) {
            $newPassword = password_encrypt($_POST['newpw']);
            $updatePasswordQuery = "UPDATE Customer ";
            $updatePasswordQuery .= "SET hashed_pw = '".$newPassword."'";
            $result = $mysqli->query($updatePasswordQuery);
            if($result){
                $_SESSION["message"] = "YOUR PASSWORD HAS BEEN CHANGED!";
            }
            else{
                $_SESSION["message"] = "PASSWORD CAN'T BE CHANGED";
            }
        }
        else{
            $_SESSION["message"] = "YOU ENTERED THE WRONG PASSWORD";
        }
    }

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
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--Inclduing Bootstrap Form Validation File-->
    <link href="dist/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="dist/js/bootstrapValidator.min.js"></script>

    <style>
        body {
            position: relative;
        }
        .affix {
            top: 100px;
        }
        div.col-lg-9 div {
            font-size: 18px;
        }
        #section1 {color: #0f0f0f; background-color: transparent; min-height: 500px;}
        #section2 {color: #0f0f0f; background-color: transparent; min-height: 400px;}
        #section3 {color: #0f0f0f; background-color: #d9edf7; min-height: 400px;}
        #section4 {color: #0f0f0f; background-color: transparent; min-height: 500px;}
        #section5 {color: #0f0f0f; background-color: transparent; min-height: 400px;}
        #section6 {color: #0f0f0f; background-color: transparent; min-height: 400px;}

        .navbar .navbar-collapse {
            text-align: center;
        }

        .no-float {
            float: none!important;
        }

        @media screen and (max-width: 800px) {
            #section1, #section2, #section3, #section4, #section5, #section6  {
                z-index: 10;
            }
            #accountNavbar {
                position: absolute;
                z-index: 20;
                text-align: center;
                min-width: 95%;
            }
            .collapsing, .in {background-color: #f7f7f7;}
            div.col-lg-9 div {
                font-size: 15px;
            }
        }

        table{
            font-size: medium;
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

<?php
    if (($output = message()) !== null) {
        echo "<br/>";
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
?>

<div class="container-fluid">
    <div class="page-header">
        <h1><div class="text-center">My Account</div></h1>
    </div>
    <br/>
</div>

<div class="container">
    <div class="row">
        <nav class="col-lg-3" id="myScrollspy">
            <div class="navbar-header">
                <button type="button" class="no-float navbar-toggle" data-toggle="collapse" data-target="#accountNavbar">
                    <span class="glyphicon glyphicon-collapse-down" style="color: #c9302c; font-size: 25px"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="accountNavbar">
            <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="160" id="sideBar">
                <li><a href="#section1">Account Overview</a></li>
                <li><a href="#section2">My Reservations</a></li>
                <li><a href="#section3">Transaction History</a></li>
                <li><a href="#section4">Edit Account</a></li>
                <li><a href="#section5">Change Password</a></li>
                <li><a href="#section6">Delete Account</a></li>
            </ul>
            </div>
        </nav>

        <div class="col-lg-9">
            <div id="section1">
                <h1 style="color: #245580">Account Overview</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name</strong></td><td>".$row['fname']." ".$row['lname']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Birthdate</strong></td><td>".$row['DOB']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Address</strong></td><td>".$row['street']."</td></tr>";
                    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>City</strong></td><td>".$row['city']."</td></tr>";
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
                <?php
                    $reservationQuery = "SELECT * FROM Customer ";
                    $reservationQuery .= "NATURAL JOIN Reservation ";
                    $reservationQuery .= "JOIN Vehicles ON Reservation.VIN = Vehicles.VIN ";
                    $reservationQuery .= "JOIN Status ON Reservation.statusID = Status.statusID ";
                    $reservationQuery .= "JOIN Insurance ON Reservation.insuranceID = Insurance.insuranceID ";
                    $reservationQuery .= "JOIN Fee ON Reservation.feeID = Fee.feeID ";
                    $reservationQuery .= "JOIN Discount ON Reservation.code = Discount.code ";
                    $reservationQuery .= "WHERE custID = '".$ID."' ORDER BY pickup_date DESC";
                    $result = $mysqli->query($reservationQuery);
                    if($result && $result->num_rows>0){
                        echo "<p>You have <strong>".$result->num_rows."</strong> reservation(s).</p>";
                        while($row = $result->fetch_assoc()){
                            echo "<br>";
                            echo "<h4 style='color: #c9302c'>Reservation Number: ".substr($row['resID'],3,4)."&nbsp;&nbsp;&nbsp;<a href='modifyReservation.php?id=".urldecode($row['resID'])."'>[Delete]</a>&nbsp;&nbsp;&nbsp;";
                            if($row['status_description']=='Reserved'){
                                echo "<a href='modifyReservation.php?cancelid=".urldecode($row['resID'])."'>[Cancel]</a></h4>";
                            }
                            else{
                                echo "</h4>";
                            }
                            echo "<table class='table table-hover'>";
                            echo "<tbody>";
                            echo "<tr><td><strong>Vehicle</strong></td><td>".$row['make']." ".$row['model']." ".$row['year']."</td></tr>";
                            echo "<tr><td><strong>Pick-up Date</strong></td><td>".$row['pickup_date']."</td></tr>";
                            echo "<tr><td><strong>Drop-off Date</strong></td><td>".$row['dropoff_date']."</td></tr>";
                            echo "<tr><td><strong>Rental Length</strong></td><td>".$row['rentalLength']." days</td></tr>";
                            echo "<tr><td><strong>Fee</strong></td><td>".$row['fee_description']."</td></tr>";
                            echo "<tr><td><strong>Insurance</strong></td><td>".$row['name']."</td></tr>";
                            echo "<tr><td><strong>Discount</strong></td><td>".$row['discount_description']."</td></tr>";
                            echo "<tr><td><strong>Estimated Total</strong></td><td>$".$row['estimate_total']."</td></tr>";
                            if($row['status_description'] == 'Reserved'){
                                echo "<tr><td><strong>Status</strong></td><td style='color: #5cb85c'>".$row['status_description']."</td></tr>";
                            }
                            elseif($row['status_description'] == 'Cancelled'){
                                echo "<tr><td><strong>Status</strong></td><td style='color: red'>".$row['status_description']."</td></tr>";
                            }
                            else{
                                echo "<tr><td><strong>Status</strong></td><td style='color: blue'>".$row['status_description']."</td></tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }
                    }
                    else{
                        echo "<p>You have <strong>".$result->num_rows."</strong> reservation(s).</p>";
                    }
                ?>
            </div>
            <div id="section3">
                <hr>
                <h1 style="color: #245580"> Transaction History</h1>
                <p>This method is being implemented!</p>
                <?php
                    //TO-DO
                ?>
            </div>
            <div id="section4">
                <hr>
                <h1 style="color: #245580"> Edit Account</h1>
                <p>Your name and birth date cannot be changed!</p>
                <p>Please make sure to enter information in correct format <span class="glyphicon glyphicon-arrow-down"></span></p>
                <br>

                <?php
                    $result = $mysqli->query($query);
                    $row = $result->fetch_assoc();
                ?>

                <form action="account.php" method="post" id="edit-form" class="form-horizontal">
                    <fieldset>
                        <!-- First Name -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First Name</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <?php
                                        echo "<input  name='fname' class='form-control'  type='text' value = '".$row['fname']."' readonly>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Name</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <?php
                                        echo "<input  name='lname' class='form-control'  type='text' value = '".$row['lname']."' readonly>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- DOB -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Birthdate</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                                    <?php
                                        echo "<input  name='dob' class='form-control'  type='date' value = '".$row['DOB']."' readonly>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Street Address -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Street Address</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <?php
                                        echo "<input  name='street' class='form-control'  type='text' value = '".$row['street']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">City</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <?php
                                        echo "<input  name='city' class='form-control'  type='text' value = '".$row['city']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- State -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">State</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="state" class="form-control selectpicker">
                                        <?php
                                            $states = array(
                                            'AL'=>'Alabama',
                                            'AK'=>'Alaska',
                                            'AZ'=>'Arizona',
                                            'AR'=>'Arkansas',
                                            'CA'=>'California',
                                            'CO'=>'Colorado',
                                            'CT'=>'Connecticut',
                                            'DE'=>'Delaware',
                                            'DC'=>'District of Columbia',
                                            'FL'=>'Florida',
                                            'GA'=>'Georgia',
                                            'HI'=>'Hawaii',
                                            'ID'=>'Idaho',
                                            'IL'=>'Illinois',
                                            'IN'=>'Indiana',
                                            'IA'=>'Iowa',
                                            'KS'=>'Kansas',
                                            'KY'=>'Kentucky',
                                            'LA'=>'Louisiana',
                                            'ME'=>'Maine',
                                            'MD'=>'Maryland',
                                            'MA'=>'Massachusetts',
                                            'MI'=>'Michigan',
                                            'MN'=>'Minnesota',
                                            'MS'=>'Mississippi',
                                            'MO'=>'Missouri',
                                            'MT'=>'Montana',
                                            'NE'=>'Nebraska',
                                            'NV'=>'Nevada',
                                            'NH'=>'New Hampshire',
                                            'NJ'=>'New Jersey',
                                            'NM'=>'New Mexico',
                                            'NY'=>'New York',
                                            'NC'=>'North Carolina',
                                            'ND'=>'North Dakota',
                                            'OH'=>'Ohio',
                                            'OK'=>'Oklahoma',
                                            'OR'=>'Oregon',
                                            'PA'=>'Pennsylvania',
                                            'RI'=>'Rhode Island',
                                            'SC'=>'South Carolina',
                                            'SD'=>'South Dakota',
                                            'TN'=>'Tennessee',
                                            'TX'=>'Texas',
                                            'UT'=>'Utah',
                                            'VT'=>'Vermont',
                                            'VA'=>'Virginia',
                                            'WA'=>'Washington',
                                            'WV'=>'West Virginia',
                                            'WI'=>'Wisconsin',
                                            'WY'=>'Wyoming',
                                            );
                                            foreach ($states as $item){
                                                if($item == $row['state']){
                                                    echo "<option selected>".$item."</option>";
                                                }
                                                else{
                                                    echo "<option>".$item."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ZIP -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ZIP Code</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <?php
                                        echo "<input  name='zip' class='form-control'  type='text' value = '".$row['zip']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone Number</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <?php
                                        echo "<input  name='phone' class='form-control'  type='text' value = '".$row['phone']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email Address</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <?php
                                        echo "<input  name='email' class='form-control'  type='email' value = '".$row['email']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- License Number -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">License #</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <?php
                                        echo "<input  name='license' class='form-control'  type='text' value = '".$row['license_number']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Date Issued -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date Issued</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <?php
                                        echo "<input  name='license_date' class='form-control'  type='date' value = '".$row['license_issue_date']."'>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-lg-5 control-label"></label>
                            <div class="col-lg-2">
                                <button type="submit" name="update" id="submitButton" class="btn btn-lg btn-primary btn-block">Update</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
                <br>
            </div>
            <div id="section5">
                <hr>
                <h1 style="color: #245580"> Change Password</h1>
                <br><br>
                <form action="account.php" method="post" id="pw-change-form" class="form-horizontal">
                    <fieldset>
                        <!-- Old Password -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Old Password</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input  name="oldpw" class="form-control"  type="password">
                                </div>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">New Password</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input  name="newpw" class="form-control"  type="password">
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-lg-5 control-label"></label>
                            <div class="col-lg-2">
                                <button type="submit" name="changepw" id="submitButton" class="btn btn-lg btn-primary btn-block">Change</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="section6">
                <hr>
                <h1 style="color: #245580"> Delete Account</h1>
                <p>Please contact us if you have any problems with our service!</p>
                <p>We would love to see you stay.</p>
                <p>If you still want to delete your account, please leave us your feedback <span class="glyphicon glyphicon-thumbs-up"></span></p>
                <p><a href="contact.php">CONTACT US</a></p>
                <br>
                <form action="signout.php" method="post" id="pw-change-form" class="form-horizontal">
                    <fieldset>
                        <!-- Retype Password -->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Retype Password</label>
                            <div class="col-lg-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input  name="confirm_pw" class="form-control"  type="password">
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-lg-5 control-label"></label>
                            <div class="col-lg-2">
                                <button type="submit" name="delete" id="submitButton" class="btn btn-lg btn-danger btn-block">Delete</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- CODE FOR FORM VALIDATOR -->
<script type="text/javascript">
    // First 2 lines which start with $ is different
    // from those in file signup.php
    // This is to validate MULTIPLE FORMS
    $('form').each(function() {
        $(this).bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        phone: {
                            country: 'US',
                            message: 'Please supply a vaild phone number with area code'
                        }
                    }
                },
                street: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please supply your street address'
                        }
                    }
                },
                city: {
                    validators: {
                        stringLength: {
                            min: 4,
                        },
                        notEmpty: {
                            message: 'Please supply your city'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select your state'
                        }
                    }
                },
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your zip code'
                        },
                        zipCode: {
                            country: 'US',
                            message: 'Please supply a valid zip code'
                        }
                    }
                },
                license: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your license number'
                        }
                    }
                },
                license_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your license issue date'
                        },
                        date: {
                            message: 'Please enter in correct format'
                        }
                    }
                },
                oldpw: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your old password'
                        }
                    }
                },
                newpw: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your old password'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Your new password needs to be at least 8 characters'
                        }
                    }
                },
                confirm_pw: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your password for security reason'
                        }
                    }
                }
            }
        })
    });

    // Smooth Scrolling
    $(document).ready(function(){
        /* smooth scrolling sections */
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });

    // Shadowed nav-bar
    $(function(){
        var navbar = $('.navbar');
        $(window).scroll(function(){
            if($(window).scrollTop() <= 80){
                navbar.css('box-shadow', 'none');
            } else {
                navbar.css('box-shadow', '0px 5px 10px rgba(0, 0, 0, 0.4)');
            }
        });
    })

</script>


</body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>
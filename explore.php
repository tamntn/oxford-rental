<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 4/29/17
 * Time: 8:06 AM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    $mysqli = db_connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Explore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="explore.css" rel="stylesheet">

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }
        /*.img-rounded:hover{
            -moz-box-shadow: 0 0 10px #ccc;
            -webkit-box-shadow: 0 0 10px #ccc;
            box-shadow: 0 0 10px #ccc;
        }*/
        .col-lg-3 {
            overflow: hidden;
        }
        .col-lg-3 img {
            max-width: 100%;

            -moz-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }
        .col-lg-3:hover img {
            -moz-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
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
                    <li class="active"><a href="explore.php">Explore</a></li>
                    <li><a href="reserve.php">Reserve</a></li>
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
            <h1><div class="text-center">Pick a car that best fits your needs!</div></h1>
        </div>
        <br/>

        <div class="container explore">
            <div class="row">
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/economy.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                        $query = "SELECT * FROM Type WHERE type_name = 'Economy'";
                        $result = $mysqli->query($query);
                        while($row = $result->fetch_assoc()){
                            echo "<h2>".$row['type_name']."</h2>";
                            echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                        }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/standard.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Standard'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/fullsize.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Full Size'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/premium.jpg" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Premium'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/compactSUV.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Compact SUV'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/standardSUV.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Standard SUV'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/pickup.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Pickup'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/minivan.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Mini Van'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/15van.png" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = '15-Passenger Van'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                    <img class="img-rounded" src="image/luxury.jpg" alt="Generic placeholder image" width="200" height="200">
                    <?php
                    $query = "SELECT * FROM Type WHERE type_name = 'Exotic'";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<h2>".$row['type_name']."</h2>";
                        echo "<p><a class='btn btn-default' href='viewType.php?id=".urldecode($row['typeID'])."' role='button'>Check Availability &raquo;</a></p>";
                    }
                    ?>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                </div>
                <div class="col-lg-2" style="text-align: center;">
                    <br/><br/>
                    <a href="viewType.php" class="btn btn-primary btn-lg" role="button">View All &raquo;</a>
                </div>
                <div class="col-lg-5">
                </div>
            </div>
        </div>
    </div>


</body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>

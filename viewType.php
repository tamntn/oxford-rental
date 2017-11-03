<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 4/30/17
 * Time: 7:49 PM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    $mysqli = db_connection();

    if(isset($_GET["id"])){
        $ID = $_GET["id"];
        $query = "SELECT * FROM Vehicles ";
        $query .= "NATURAL JOIN Type ";
        $query .= "NATURAL JOIN Status ";
        $query .= "WHERE typeID = '".$ID."' ORDER BY make, model";
        $result = $mysqli->query($query);
        $query2 = "SELECT COUNT(typeID), type_name FROM Vehicles NATURAL JOIN Type WHERE typeID = '".$ID."'";
        $result_count = $mysqli->query($query2);
    }
    else{
        $query = "SELECT * FROM Vehicles ";
        $query .= "NATURAL JOIN Type ";
        $query .= "NATURAL JOIN Status ";
        $query .= "ORDER BY type_name, make, model";
        $result = $mysqli->query($query);
        $query2 = "SELECT COUNT(typeID), type_name FROM Vehicles NATURAL JOIN Type";
        $result_count = $mysqli->query($query2);
    }
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

        <link href="signin.css" rel="stylesheet">

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
            <?php
                if(isset($_GET['id'])){
                    $count = $result_count ->fetch_assoc();
                    echo "<h1><div class='text-center'>".$count['type_name']."</div></h1>";
                }
                else{
                    $count = $result_count ->fetch_assoc();
                    echo "<h1><div class='text-center'>Displaying All Options</div></h1>";
                }
            ?>
        </div>
        <br/>

        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Make & Model</th>
                    <th>Year</th>
                    <th>Capacity</th>
                    <th>Daily Rate</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                echo "<h3>There are currently ".$count['COUNT(typeID)']." cars in stock:</h3>";
                echo "<br/>";
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['make']." ".$row['model']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['capacity']."</td>";
                    echo "<td>$".$row['daily_rate']."</td>";
                    if($row['status_description']=='Available'){
                        echo "<td style='color: #5cb85c'>".$row['status_description']."</td>";
                        echo "<td>&nbsp<a href='reserve.php?id=".urldecode($row['VIN'])."'>Reserve This Car</a></td>";
                    }
                    elseif ($row['status_description']=='Rented'){
                        echo "<td style='color: #c9302c'>".$row['status_description']."</td>";
                        echo "<td>&nbsp<a href='contact.php?id=".urldecode($row['VIN'])."'>Request This Car</a></td>";
                    }
                    else{
                        echo "<td style='color: darkorange'>".$row['status_description']."</td>";
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2"></div>

    </div>

    </body>
    </html>


<?php
    new_footer('TAM NGUYEN', $mysqli);
?>
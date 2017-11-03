<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/6/17
 * Time: 7:28 PM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    $mysqli = db_connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Query</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="signin.css" rel="stylesheet">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwxNYwro2Hho1z_qt7OrhtZJIh_5z2-jA&callback=initMap"></script>

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }

        /* Make map responsive */
        #map{
            overflow: hidden;
            padding-bottom: 65%;
            padding-top: 30px;
            position: relative;
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
                <li class="active"><a href="query.php">Query</a></li>
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
        <h1><div class="text-center">Advanced SQL Query</div></h1>
    </div>
    <br/>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style="text-align: left">
            <h2 style="color: #245580">Query 1 (Aggregate)</h2>
            <p><strong>Total transaction amount by each type of credit card (order by total amount)</strong></p>
            <p>SELECT SUM(total_amount) AS 'Total', type</p>
            <p>FROM CreditCard NATURAL JOIN Transaction</p>
            <p>GROUP BY type ORDER BY Total;</p>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Total</th>
                    <th>Type</th>
                </tr>
                <tbody>
                <?php
                    $query = "SELECT SUM(total_amount) AS 'Total', type ";
                    $query .= "FROM CreditCard NATURAL JOIN Transaction ";
                    $query .= "GROUP BY type ORDER BY Total";
                    $result = $mysqli->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['Total']."</td>";
                        echo "<td>".$row['type']."</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
            <hr/>

            <h2 style="color: #245580">Query 2 (Nested Query)</h2>
            <p><strong>View each transaction information (car, customer name, date) that has transaction amount larger than the average amount of all transactions:</strong></p>
            <p>SELECT</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONCAT(make, " ", model, " ", year) AS "Vehicle",</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONCAT(fname, " ", lname) AS 'Customer Name',</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tran_date AS "Transaction Date",</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;total_amount AS 'Amount'</p>
            <p>FROM Customer</p>
            <p>NATURAL JOIN Reservation</p>
            <p>JOIN Transaction ON Reservation.resID = Transaction.resID</p>
            <p>JOIN Vehicles ON Vehicles.VIN = Reservation.VIN</p>
            <p>WHERE total_amount ></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SELECT AVG(total_amount) FROM Transaction)</p>
            <p>ORDER BY total_amount;</p>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Customer Name</th>
                    <th>Transaction Date</th>
                    <th>Amount</th>
                </tr>
                <tbody>
                <?php
                $query = "SELECT ";
                $query .= "CONCAT(make, \" \", model, \" \", year) AS \"Vehicle\", ";
                $query .= "CONCAT(fname, \" \", lname) AS 'Customer Name', ";
                $query .= "tran_date AS \"Transaction Date\", ";
                $query .= "total_amount AS 'Amount' ";
                $query .= "FROM Customer ";
                $query .= "NATURAL JOIN Reservation ";
                $query .= "JOIN Transaction ON Reservation.resID = Transaction.resID ";
                $query .= "JOIN Vehicles ON Vehicles.VIN = Reservation.VIN ";
                $query .= "WHERE total_amount > ";
                $query .= "(SELECT AVG(total_amount) FROM Transaction) ";
                $query .= "ORDER BY total_amount";
                $result = $mysqli->query($query);
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['Vehicle']."</td>";
                    echo "<td>".$row['Customer Name']."</td>";
                    echo "<td>".$row['Transaction Date']."</td>";
                    echo "<td>".$row['Amount']."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <hr/>

            <h2 style="color: #245580">Query 3 (Professor Question)</h2>
            <p><strong>For each type_name of vehicle, list all the first and last names of customers reserving the type of vehicle (use group_concat):</strong></p>
            <p>SELECT type_name, GROUP_CONCAT(fname, ' ', lname) AS renters</p>
            <p>FROM Customer</p>
            <p>NATURAL JOIN Reservation</p>
            <p>JOIN Vehicles ON Reservation.VIN = Vehicles.VIN</p>
            <p>NATURAL JOIN Type</p>
            <p>GROUP BY type_name ORDER BY type_name;</p>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Vehicle Type</th>
                    <th>Renter List</th>
                </tr>
                <tbody>
                <?php
                $query = "SELECT type_name, GROUP_CONCAT(' ', fname, ' ', lname) AS renters ";
                $query .= "FROM Customer NATURAL JOIN Reservation ";
                $query .= "JOIN Vehicles ON Reservation.VIN = Vehicles.VIN ";
                $query .= "NATURAL JOIN Type ";
                $query .= "GROUP BY type_name ORDER BY type_name ";
                $result = $mysqli->query($query);
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['type_name']."</td>";
                    echo "<td>".$row['renters']."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

</body>
</html>

<?php
new_footer('TAM NGUYEN', $mysqli);
?>
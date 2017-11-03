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

    echo $resID;
?>
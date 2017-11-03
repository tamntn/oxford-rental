<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/7/17
 * Time: 4:48 AM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    verify_login();
    $mysqli = db_connection();

    $resID = $_GET['id'];
    echo $resID;

    $query = "DELETE FROM Reseravtion WHERE resID = '".$resID."'";
    $result = $mysqli->query($query);
    if($result){
        $_SESSION["message"] = "RESERVATION NUMBER ".substr($resID,3,4)." HAS BEEN DELETED.";
        redirect_to("account.php");
    }
    else{
        $_SESSION["message"] = "ERROR! CAN'T DELETE RESERVATION NUMBER ".substr($resID,3,4);
        redirect_to("account.php");
    }
?>
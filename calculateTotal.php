<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/5/17
 * Time: 9:05 PM
 */
require_once ('session.php');
require_once ('included_functions.php');
verify_login();
$mysqli = db_connection();
?>
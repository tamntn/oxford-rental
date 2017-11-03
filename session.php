<?php

	session_start();
	
	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class='alert alert-danger text-center' role='alert'><strong>".$_SESSION["message"]."</strong></div>";
			
			// clear message after use
			$_SESSION["message"] = null;
			
			return $output;
		}
		else {
			return null;
		}
	}

	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			
			// clear message after use
			$_SESSION["errors"] = null;
			
			return $errors;
		}
	}

    function verify_login(){
        if(!isset($_SESSION["userID"]) && $_SESSION["userID"] === NULL){
            $_SESSION["message"] = "You must sign in first before accessing myAccount or making Reservations!";
            header("Location: signin.php");
            exit;
        }
    }

    function logged_in(){
        if(!isset($_SESSION["userID"]) && $_SESSION["userID"] === NULL){
            return false;
        }
        else{
            return true;
        }
    }
	
?>
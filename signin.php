<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 4/29/17
 * Time: 6:09 AM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    if(logged_in()){
        redirect_to("account.php");
        exit;
    }
    $mysqli = db_connection();

    if (isset($_POST["signinButton"])){
        if (isset($_POST["inputEmail"]) && $_POST["inputEmail"] !== "" &&
            isset($_POST["inputPassword"]) && $_POST["inputPassword"] !== ""){
            //Grab posted values for username and password.
            //IMPORTANT CHANGE:  Unlike in addLogin.php, you will NOT encrypt password
            //Once we check if the username exists, we will do the encryption in
            //the function password_check, which returns true if the passwords match
            $email = $_POST["inputEmail"];
            $password = $_POST["inputPassword"];

            $query = "SELECT * FROM Customer ";
            $query .= "WHERE email = '".$email."' ";
            $query .= "LIMIT 1";
            $result = $mysqli->query($query);

            //Username found so now check password
            //If the attempted password matches the database password then set two $_SESSION variables
            if ($result && $result->num_rows > 0){
                $row = $result->fetch_assoc();
                if (password_check($password, $row['hashed_pw'])) {
                    $_SESSION["userID"] = $row["custID"];
                    $_SESSION["email"] = $row["email"];
                    redirect_to("account.php");
                }
                else{
                    $_SESSION["message"] = "Email/Password Not Found";
                    redirect_to("signin.php");
                }
            }
            else{
                $_SESSION["message"] = "Email/Password Not Found";
                redirect_to("signin.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log In</title>
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
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="active"><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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

<div class="container">
    <form action="signin.php" method="post" class="form-signin">
        <fieldset>
            <h2 class="form-signin-heading">Please sign in</h2>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="signinButton">Sign In</button>
        </fieldset>
    </form>
</div> <!-- /container -->


</body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>

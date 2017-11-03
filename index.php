<?php
    require_once ('session.php');
    require_once ('included_functions.php');
    $mysqli = db_connection();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Oxford Car Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="carousel.css" rel="stylesheet">

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }
        .col-lg-4 img {
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .col-lg-4:hover img {
            border-radius: 50%;
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="explore.php">Explore</a></li>
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


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="image/home_variety.jpg" alt="Variety" class="img-responsive">
                <div class="carousel-caption">
                    <h1>Wide Variety</h1>
                    <p>Any car you want, we have it!</p>
                </div>
            </div>

            <div class="item">
                <img src="image/home_service.jpg" alt="Service" class="img-responsive">
                <div class="carousel-caption">
                    <h1>Guaranteed Satisfaction</h1>
                    <p>Drive happy or get a refund!</p>
                </div>
            </div>

            <div class="item">
                <img src="image/home_price.jpg" alt="Price" class="img-responsive">
                <div class="carousel-caption">
                    <h1>Competitive Price</h1>
                    <p>Pay less and travel more!</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="image/explore.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Explore</h2>
                <p></p>
                <p><a class="btn btn-default" href="explore.php" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="image/reservation.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Reserve</h2>
                <p></p>
                <p><a class="btn btn-default" href="reserve.php" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="image/customer_service.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Contact</h2>
                <p></p>
                <p><a class="btn btn-default" href="contact.php" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>

</body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>
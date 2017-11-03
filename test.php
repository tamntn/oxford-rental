<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/4/17
 * Time: 5:25 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>UPD Crime Predictor</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
        body {
            padding-top:50px;
        }

        #masthead {
            min-height:250px;
        }

        #masthead h1 {
            font-size: 30px;
            line-height: 1;
            padding-top:20px;
        }

        #masthead .well {
            margin-top:8%;
        }

        @media screen and (min-width: 768px) {
        #masthead h1 {
                font-size: 50px;
            }
        }

        .navbar-bright {
            background-color:#111155;
            color:#fff;
        }

        .affix-top,.affix{
            position: static;
        }

        @media (min-width: 979px) {
        #sidebar.affix-top {
                position: static;
                margin-top:30px;
                width:228px;
            }

        #sidebar.affix {
                position: fixed;
                top:70px;
                width:228px;
            }
        }

        #sidebar li.active {
            border:0 #eee solid;
            border-right-width:5px;
        }

    </style>
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand">Crime Predictor</a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#sec0">About</a>
                </li>
                <li>
                    <a href="predict.php">Predict</a>
                </li>
                <li>
                    <a href="fact.php">Facts & Trends</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</nav>

<div id="masthead">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>UPD Crime Predictor
                    <p class="lead">With Machine Learning</p>
                </h1>
            </div>
            <div class="col-md-2">
                <div class="well well-sm">
                    <img src="image/olemiss.png" class="img-responsive">
                </div>
            </div>
        </div>
    </div><!--/container-->
</div><!--/masthead-->

<!--main-->
<div class="container">
    <div class="row">
        <!--left-->
        <div class="col-md-3" id="leftCol">
            <ul class="nav nav-stacked" id="sidebar" style="text-align: right">
                <li><a href="#sec0">About The Project</a></li>
                <li><a href="#sec1">Project Goals</a></li>
                <li><a href="#sec2">Database</a></li>
                <li><a href="#sec3">Implementation</a></li>
                <li><a href="#sec4">Benefits</a></li>
            </ul>
        </div><!--/left-->

        <!--right-->
        <div class="col-md-9">
            <h2 id="sec0">About The Project</h2>
            <p>
                This project was designed as a safety device for visitors to the University of Mississippi and as a way to optimize the patrol of UPD officers.</p>

            <hr>
            <p>
                Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut.
                Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut!</p>
            <hr>

            <h2 id="sec1">Project Goals</h2>
            <p>
                Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Hello.</h3></div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Hello.</h3></div>
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h2 id="sec2">Database</h2>
            <p>
                Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut!
            </p>
            <div class="row">
                <div class="col-md-4"><img src="//placehold.it/300x300" class="img-responsive"></div>
                <div class="col-md-4"><img src="//placehold.it/300x300" class="img-responsive"></div>
                <div class="col-md-4"><img src="//placehold.it/300x300" class="img-responsive"></div>
            </div>

            <hr>

            <h2 id="sec3">Implementation</h2>
            <p>
                Images are responsive sed @mdo but sum are more fun peratis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut..</p>
            <p>
                Fos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut..</p>
            <img src="image/map_guides.jpg" class="img-responsive">
            <hr>

            <h2 id="sec4">Benefits</h2>
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut.</p>

            <hr>
            <h4><a href="predict.php">Get a Prediction</a></h4>
            <hr>

        </div><!--/right-->
    </div><!--/row-->
</div><!--/container-->



<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scroll.js"></script>
</body>
</html>

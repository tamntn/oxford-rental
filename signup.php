<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 4/29/17
 * Time: 5:52 AM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    if(logged_in()){
        redirect_to("account.php");
        exit;
    }
    $mysqli = db_connection();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link href="signin.css" rel="stylesheet">

        <!--Inclduing Bootstrap Form Validation File-->
        <link href="dist/css/bootstrapValidator.min.css" rel="stylesheet">
        <script src="dist/js/bootstrapValidator.min.js"></script>

        <!-- DatePicker -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

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
                        <li><a href="explore.php">Explore</a></li>
                        <li><a href="reserve.php">Reserve</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Print Alert if there's a message -->
        <?php
            if (($output = message()) !== null) {
                echo "<br/><br/><br/><br/>";
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
            else{
                echo "<br><br>";
            }
        ?>

        <div class="container-fluid">
            <div class="page-header">
                <h1><div class="text-center">NEW CUSTOMER SIGNUP</div></h1>
            </div>
            <form action="welcome.php" method="post" id="signup-form" class="form-horizontal">
                <fieldset>
                    <!-- First Name -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">First Name</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="fname" placeholder="First Name" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Last Name</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="lname" placeholder="Last Name" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Birthdate -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Birthdate</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                                <input  name="dob" placeholder="YYYY-MM-DD" class="form-control"  type="date">
                            </div>
                        </div>
                        <!--<div class="col-lg-4 date">
                            <div class="input-group input-append date" id="datePicker">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="date" class="form-control" name="date" />
                            </div>
                        </div>-->
                    </div>

                    <!-- Street Address -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Street Address</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input  name="street" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">City</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input  name="city" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- State -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">State</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="state" class="form-control selectpicker" >
                                    <option value=" "  selected disabled>Please select your state</option>
<?php
$states = array(
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
);
foreach ($states as $item){
    echo "<option>".$item."</option>";
}
?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ZIP -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">ZIP Code</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input  name="zip" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- License Number -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">License Number</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input  name="license" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Date Issued -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Date Issued</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input  name="license_date" placeholder="YYYY-MM-DD" class="form-control"  type="date">
                            </div>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Phone Number</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input  name="phone" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Email Address</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input  name="email" placeholder="You will use this email to log in" class="form-control"  type="email">
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Password</label>
                        <div class="col-lg-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input  name="pw" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-lg-5 control-label"></label>
                        <div class="col-lg-2">
                            <button type="submit" name="submitButton" id="submitButton" class="btn btn-lg btn-primary btn-block">Sign up</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#signup-form').bootstrapValidator({
                    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        fname: {
                            validators: {
                                stringLength: {
                                    min: 2,
                                },
                                notEmpty: {
                                    message: 'Please supply your first name'
                                }
                            }
                        },
                        lname: {
                            validators: {
                                stringLength: {
                                    min: 2,
                                },
                                notEmpty: {
                                    message: 'Please supply your last name'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your email address'
                                },
                                emailAddress: {
                                    message: 'Please supply a valid email address'
                                }
                            }
                        },
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your phone number'
                                },
                                phone: {
                                    country: 'US',
                                    message: 'Please supply a vaild phone number with area code'
                                }
                            }
                        },
                        street: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Please supply your street address'
                                }
                            }
                        },
                        city: {
                            validators: {
                                stringLength: {
                                    min: 4,
                                },
                                notEmpty: {
                                    message: 'Please supply your city'
                                }
                            }
                        },
                        state: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select your state'
                                }
                            }
                        },
                        zip: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your zip code'
                                },
                                zipCode: {
                                    country: 'US',
                                    message: 'Please supply a valid zip code'
                                }
                            }
                        },
                        dob: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your birthdate'
                                },
                                date: {
                                    message: 'Please enter in correct format'
                                }
                            }
                        },
                        license: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your license number'
                                }
                            }
                        },
                        license_date: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your license issue date'
                                },
                                date: {
                                    message: 'Please enter in correct format'
                                }
                            }
                        },
                        pw: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                    message: 'Your password needs to be at least 8 characters'
                                },
                                notEmpty: {
                                    message: 'Please supply a password for your account'
                                }
                            }
                        }
                    }
                })
            });
        </script>

    </body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>
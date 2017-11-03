<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 4/30/17
 * Time: 9:11 PM
 *
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    verify_login();
    $mysqli = db_connection();

    if(!isset($_GET['id'])){
        redirect_to("explore.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reserve</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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

    <!-- Moment -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }

        .row{
            margin-top:20px;
            padding: 0 10px;
        }

        .clickable{
            cursor: pointer;
        }

        .panel-heading span {
            margin-top: -30px;
            font-size: 25px;
        }

        .panel-heading{
            height: 50px;
        }
        .panel-title{
            font-size: 30px;
        }
        .panel-body{
            font-size: 17px;
        }
        .form-group{
            padding-left: 20px;
            padding-right: 20px;
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
                <li class="active"><a href="reserve.php">Reserve</a></li>
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
        <h1><div class="text-center">Make Your Reservation!</div></h1>
    </div>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="reservationPayment.php" method="post" id="reservation-form" class="form-horizontal">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Vehicle</h3>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <?php
                            $VIN = $_GET['id'];
                            $type = getCategory($VIN, $mysqli);
                            $cost = getDailyRate($VIN, $mysqli);
                            $capacity = getCapacity($VIN, $mysqli);
                            $name = getVehicleName($VIN, $mysqli);
                            echo "<p><strong>Type: </strong>".$type."</p>";
                            echo "<p><strong>Make & Model: </strong>".$name."</p>";
                            echo "<p><strong>Daily Cost: </strong>$".$cost."</p>";
                            echo "<p><strong>Capacity: </strong>".$capacity."</p>";
                            ?>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Date</h3>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body" style="text-align: center">
                            <p><strong>Pickup - Dropoff</strong></p>
                            <p>You can get and return the car at anytime within the date range!</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" name="daterange" id="daterange" class="form-control"/>
                                </div>
                            </div>
                            <p><strong>Total number of days: </strong></p>
                            <p id="total"></p>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Others</h3>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body" style="text-align: center">
                            <p><strong>Insurance (Daily Cost)</strong></p>
                                <div class="form-group">
                                    <select class="form-control" name="insurance" id="insurance" onchange="getInsurance(this.value)">
                                        <option selected disabled>Select an insurance</option>
                                        <?php
                                        $query = "SELECT * FROM Insurance";
                                        $result = $mysqli->query($query);
                                        while($row = $result->fetch_assoc()){
                                            echo "<option value='".$row['daily_cost']."'>".$row['name']." ($".$row['daily_cost'].")"."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            <p><strong>Fee</strong></p>
                            <?php
                                $query = "SELECT (2017-YEAR(DOB)) AS age FROM Customer WHERE custID = '".$_SESSION['userID']."'";
                                $result = $mysqli->query($query);
                                $row = $result->fetch_assoc();
                                $age = $row['age'];
                                $fee = 0.00;
                                if($age < 25){
                                    echo "<p>Since you are under 25, you are required to pay a young-renter fee of $20/day. Other fees might apply.</p>";
                                    $fee = 20.00;
                                }
                            ?>
                            <br>
                            <p><strong>Discount Code</strong></p>
                            <p>Since we just open business, you get to pick a discount of your own!</p>
                                <div class="form-group">
                                    <select class="form-control" name="discount" id="discount" onchange="getDiscount(this.value)">
                                        <option selected disabled>Select a discount code</option>
                                        <?php
                                        $query = "SELECT * FROM Discount";
                                        $result = $mysqli->query($query);
                                        while($row = $result->fetch_assoc()){
                                            echo "<option value='".$row['percentage']."'>".$row['code']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Estimated Total Cost</h3>
                        </div>
                        <div class="panel-body" style="text-align: center; font-size: 30px; color: #3c763d">
                            <h1 id="estimatedCost">$0.00</h1>
                            <!-- Trigger the modal with a button -->
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" style="font-size: 15px">Details</a>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content" style="color: ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Estimated Cost Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>This method is being implemented.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button type="submit" name="submitButton" id="submitButton" class="btn btn-lg btn-primary btn-block">Next</button>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>

                    <input type="text" name="vin" id="vin" class="sr-only">
                    <input type="text" name="start" id="start" class="sr-only">
                    <input type="text" name="end" id="end" class="sr-only">
                    <input type="text" name="length" id="length" class="sr-only">
                    <input type="text" name="totalCost" id="totalCost" class="sr-only">
                    <input type="text" name="insuranceCost" id="insuranceCost" class="sr-only">
                    <input type="text" name="feeCost" id="feeCost" class="sr-only">
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>

    <!-- HIDDEN VALUE FOR PAGE RELOAD-->
    <input type="hidden" id="refresh" value="no">
</div>

<script>
    $(document).ready(function() {
        $('#reservation-form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                insurance: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose an insurance option'
                        }
                    }
                },
                discount: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose a discount option'
                        }
                    }
                },
                total: {
                    validators: {
                        blank: {
                            message: 'Please pick your date range'
                        }
                    }
                }
            }
        })
    });

    // PAGE RELOAD - CHECK VALUE
    $(document).ready(function(e) {
        var $input = $('#refresh');

        $input.val() == 'yes' ? location.reload(true) : $input.val('yes');
    });

    $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    })

</script>

<!--Date Function-->
<script type="text/javascript">
    var start;
    var end;
    var numberOfDays = 0;
    var insurance = 0.0;
    var discount = 0.0;
    var vin = "<?php echo $VIN;?>";
    var vehicle_daily_cost = parseFloat("<?php echo $cost;?>");
    var fee = parseFloat("<?php echo $fee;?>");
    var total = 0;

    $(function() {
        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
            dd = '0'+ dd
        }
        if(mm<10) {
            mm = '0'+ mm
        }
        today = mm+'/'+dd+'/'+yyyy;
        $('input[name="daterange"]').daterangepicker({
            autoUpdateInput:false,
            "minDate": today,
            "opens": "center",
            locale: {
                cancelLabel: 'Clear'
            }
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });

        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            start = picker.startDate.format('YYYY-MM-DD');
            end = picker.endDate.format('YYYY-MM-DD');
            numberOfDays =  Math.floor(( Date.parse(end) - Date.parse(start) ) / 86400000);
            document.getElementById("total").innerHTML = numberOfDays;
            estimateTotal()
        });

        $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            document.getElementById("total").innerHTML = '';
        });
    });

    function getInsurance(str){
        insurance = parseFloat(str);
        estimateTotal();
    }

    function getDiscount(str){
        discount = parseFloat(str);
        estimateTotal();
    }

    function estimateTotal(){
        total = (vehicle_daily_cost + insurance + fee) * numberOfDays * (1-discount);
        total = total.toFixed(2);
        string = "(" + vehicle_daily_cost.toString() + " + " + insurance.toString() + ") * " + numberOfDays.toString() + " * " + (1-discount).toString();
        document.getElementById("estimatedCost").innerHTML = '$' + total;

        document.getElementById("vin").value = vin;
        document.getElementById("start").value = start;
        document.getElementById("end").value = end;
        document.getElementById("length").value = numberOfDays;
        document.getElementById("totalCost").value = total;
        document.getElementById("feeCost").value = fee;
        document.getElementById("insuranceCost").value = insurance;
    }

</script>

</body>
</html>

<?php
    new_footer('TAM NGUYEN', $mysqli);
?>
<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Account - Tech2Check</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/logo.png" type="image/png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/72x72.png">
  <link rel="apple-touch-icon-precomposed" href="img/icons/default.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
  <style>
        .tab-content .tab-pane > div {
          float: right;
        }
  </style>
</head>

<!-- ======== @Region: body ======== -->
<body>
  <div id="background-wrapper" class="buildings" data-stellar-background-ratio="0.8">
    <!-- ======== @Region: header ======== -->
    <?php
      include("navbar.php");
    ?>
  </div>

  <!-- ======== @Region: #content ======== -->
  
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <center>
                        Account Information
                    </center>
                </h2>
            </div>
        </div>
        
        <p id="re_error" style=<?php echo isset($_SESSION['re_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['re_error']; unset($_SESSION['re_error']); ?></p>
        <p id="re_success" style=<?php echo isset($_SESSION['re_success']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['re_success']; unset($_SESSION['re_success']); ?></p>

        <ul class="nav nav-pills nav-stacked col-md-3 sticky-top">
            <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">User Info</a></li>
            <li><a href="#tab2" data-toggle="tab">Password Reset</a></li>
            <li><a href="#tab3" data-toggle="tab">Rental History</a></li>
            <li><a href="#tab4" data-toggle="tab">Reservations</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tab1">
                <div class="col-xs-9">
                    <form name="userForm" id="userForm" action="push/configure_userpush.php" method="POST">
                        <?php
                            if (isset($_SESSION['employee_type'])) {
                                $sql_user = "SELECT * FROM employee WHERE username_id = '{$_SESSION['username_id']}'";
                            } else {
                                $sql_user = "SELECT * FROM student WHERE username_id = '{$_SESSION['username_id']}'";
                            }
                        ?>
                        <div class="form-group">
                            <label for="username">Username</label> 
                            <input class="form-control" type="text" id="username" name="username" maxlength="25" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query("SELECT * FROM usernames WHERE username_id = '{$_SESSION['username_id']}'"))['username'] . "\""; ?>></input>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" id="email" name="email" maxlength="50" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['email'] . "\""; ?>></input>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="fname">First name</label>
                                <input class="form-control capitalize" type="text" id="fname" name="fname" maxlength="50" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['first_name'] . "\""; ?>></input>
                            </div>
                            <div class="col-md-2">
                                <label for="mi">MI</label>
                                <input class="form-control all-caps" type="text" id="mi" name="mi" maxlength="1" value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['middle_initial'] . "\""; ?>></input>
                            </div>
                            <div class="col-md-6">
                                <label for="lname">Last name</label>
                                <input class="form-control capitalize" type="text" id="lname" name="lname" maxlength="50" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['last_name'] . "\""; ?>></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="address1">Address 1</label>
                                <input class="form-control capitalize" type="text" id="address1" name="address1" maxlength="50" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['street_line_1'] . "\""; ?>></input>
                            </div>
                            <div class="col-md-6">
                                <label for="address2">Address 2</label>
                                <input class="form-control capitalize" type="text" id="address2" name="address2" maxlength="50" value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['street_line_2'] . "\""; ?>></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input class="form-control capitalize" type="text" id="city" name="city" maxlength="50" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['city'] . "\""; ?>></input>
                            </div>
                            <div class="col-md-3">
                                <label for="state">State</label>
                                <input class="form-control all-caps" type="text" id="state" name="state" maxlength="2" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['state'] . "\""; ?>></input>
                            </div>
                            <div class="col-md-3">
                                <label for="zip">Zip</label>
                                <input class="form-control" type="text" id="zip" name="zip" maxlength="5" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['zip_code'] . "\""; ?>></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input class="form-control" type="text" id="phone" name="phone" maxlength="10" required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['phone_number'] . "\""; ?>></input>
                        </div>
                        
                        <!--Save changes-->
                        <button class="btn btn-primary" id="btn-user-save" name="btn-user-save">Save</button>
                    </form>
                    <br>
                </div>
            </div>
            <div class="tab-pane fade" id="tab2">
                <div class="col-xs-9">
                    <form name="userForm" id="userForm" action="push/password_resetpush.php" method="POST">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="old_password">Old Password</label>
                                <input class="form-control" type="password" id="old_password" name="old_password" required></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="new_password">New Password</label>
                                <input class="form-control" type="password" id="new_password" name="new_password" maxlength="15" required></input>
                            </div>
                            <div class="col-md-6">
                                <label for="new_password_verify">Verify</label>
                                <input class="form-control" type="password" id="new_password_verify" name="new_password_verify" maxlength="15"></input>
                            </div>
                        </div>
                        
                        <!--Save changes-->
                        <button class="btn btn-primary" id="btn-update" name="btn-update">Save</button>
                    </form>
                    <br>
                </div>
            </div>
            <div class="tab-pane fade" id="tab3">
                  <?php
                    include("user_history.php");
                  ?>            
            </div>
            <div class="tab-pane fade" id="tab4">
                  <?php
                    include("view_reservations.php");
                  ?>            
            </div>
        </div>
    </div>

  <!-- ======== @Region: #footer ======== -->
  <?php
    include("footer.php");
  ?>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="contactform/contactform.js"></script>

  <!-- Template Specific Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
  
  <script src="js/useraccount.js"></script>
</body>

</html>
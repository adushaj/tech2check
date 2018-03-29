<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register - Tech2Check</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
  <link href="#" id="colour-scheme" rel="stylesheet">
  
  <style>
    .page{
      display: none;
    }
  </style>
  
</head>
<body class="fullscreen-centered page-register">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="benches" data-stellar-background-ratio="0.8">

    <!-- ======== @Region: #content ======== -->
    <div id="content">
      <div class="header">
        <div class="header-inner">
          <a class="navbar-brand center-block" href="index.php" title="Home">
            <h1 class="hidden">
              <img src="img/logo.png" alt="T2C Logo">
              Tech2Check
            </h1>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  Sign Up
                </h3>
            </div>
            <div class="panel-body">
              <p id="regerror" style="color:red"><?php echo $_SESSION['regerror']; unset($_SESSION['regerror']); ?></p>
              <form action="push/registerpush.php" id="register" method="post">
                  <div class="page" id="page1" style="display:block;">
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" maxlength="25" <?php if (isset($_SESSION['reg_username'])) { echo "value=\"{$_SESSION['reg_username']}\""; unset($_SESSION['reg_username']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" <?php if (isset($_SESSION['reg_email'])) { echo "value=\"{$_SESSION['reg_email']}\""; unset($_SESSION['reg_email']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" maxlength="15" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-check"></i></span>
                        <input type="password" class="form-control" placeholder="Verify Password" id="passwordverify" name="passwordverify" maxlength="15" required>
                      </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="button" id="next1" onClick="showLayer('page2')">Next</button>
                  </div>
                  
                  <div class="page" id="page2">
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control capitalize" placeholder="First Name" id="firstname" name="firstname" maxlength="50" <?php if (isset($_SESSION['reg_firstname'])) { echo "value=\"{$_SESSION['reg_firstname']}\""; unset($_SESSION['reg_firstname']); } ?> required>
                      </div>
                    </div>
                      <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control all-caps" placeholder="Middle Initial (Optional)" id="middleinitial" name="middleinitial" maxlength="1" <?php if (isset($_SESSION['reg_middleinitial'])) { echo "value=\"{$_SESSION['reg_middleinitial']}\""; unset($_SESSION['reg_middleinitial']); } ?>>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control capitalize" placeholder="Last Name" id="lastname" name="lastname" maxlength="50" <?php if (isset($_SESSION['reg_lastname'])) { echo "value=\"{$_SESSION['reg_lastname']}\""; unset($_SESSION['reg_lastname']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-address-book-o"></i></span>
                        <input type="text" class="form-control capitalize" placeholder="Street Address Line 1" id="streetaddress1" name="streetaddress1" maxlength="50" <?php if (isset($_SESSION['reg_streetaddress1'])) { echo "value=\"{$_SESSION['reg_streetaddress1']}\""; unset($_SESSION['reg_streetaddress1']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-address-book-o"></i></span>
                        <input type="text" class="form-control capitalize" placeholder="Street Address Line 2 (Optional)" id="streetaddress2" name="streetaddress2" maxlength="50" <?php if (isset($_SESSION['reg_streetaddress2'])) { echo "value=\"{$_SESSION['reg_streetaddress2']}\""; unset($_SESSION['reg_streetaddress2']); } ?>>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-address-book-o"></i></span>
                        <input type="text" class="form-control capitalize" placeholder="City" id="city" name="city" maxlength="50" <?php if (isset($_SESSION['reg_city'])) { echo "value=\"{$_SESSION['reg_city']}\""; unset($_SESSION['reg_city']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-address-book-o"></i></span>
                        <input type="text" class="form-control all-caps" placeholder="State (MI, CA, NY, ...)" id="state" name="state" maxlength="2" <?php if (isset($_SESSION['reg_state'])) { echo "value=\"{$_SESSION['reg_state']}\""; unset($_SESSION['reg_state']); } ?> required>
                      </div>
                    </div>  
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-address-book-o"></i></span>
                        <input type="text" class="form-control" placeholder="ZIP" id="zip" name="zip" maxlength="5" <?php if (isset($_SESSION['reg_zip'])) { echo "value=\"{$_SESSION['reg_zip']}\""; unset($_SESSION['reg_zip']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Phone Number (Include Area Code, EX. 3135557777)" id="phonenumber" name="phonenumber" maxlength="10" <?php if (isset($_SESSION['reg_phonenumber'])) { echo "value=\"{$_SESSION['reg_phonenumber']}\""; unset($_SESSION['reg_phonenumber']); } ?> required>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-left" type="button" id="prev1" onClick="showLayer('page1')">Previous</button>
                      <button class="btn btn-lg btn-primary btn-right" type="button" id="next2" onClick="showLayer('page3')">Next</button>
                    </div>
                  </div>
                  
                  <div class="page" id="page3">
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-question"></i></span>
                        <select class="form-control" id="question" name="question" required>
                          <option value="" selected disabled>Please select a security question</option>
                          <?php
                            $sql = "SELECT * FROM security_questions ORDER BY question";
                            $result = mysql_query($sql);
                            while ($row = mysql_fetch_array($result)) {
                              echo "<option value=\"{$row['question_id']}\">{$row['question']}</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-pencil"></i></span>
                        <input type="text" class="form-control" placeholder="Answer" id="answer" name="answer" maxlength="15" required>
                      </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-left" type="button" id="prev2" onClick="showLayer('page2')">Previous</button>
                    <button class="btn btn-lg btn-primary btn-right" type="submit" id="btn_submit" form="register">Submit</button>
                  </div>
              </form>
              
              <p class="m-b-0 m-t">Already signed up? <a href="login.php">Login here</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
  </div>
  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="contactform/contactform.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
  
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="js/register.js"></script>
  
  
  <script language="JavaScript">
  var currentLayer = 'page1';
  
  function showLayer(lyr) {
    if (document.getElementById("username").value && document.getElementById("email").value && document.getElementById("password").value && currentLayer == "page1") {
      hideLayer(currentLayer);
      document.getElementById(lyr).style.display = 'block';
      currentLayer = lyr;
    } else if (document.getElementById("firstname").value && document.getElementById("lastname").value && document.getElementById("streetaddress1").value && document.getElementById("city").value && document.getElementById("state").value && document.getElementById("zip").value && document.getElementById("phonenumber").value && currentLayer == "page2") {
      hideLayer(currentLayer);
      document.getElementById(lyr).style.display = 'block';
      currentLayer = lyr;
    } else if ((currentLayer == "page3" && lyr == "page2") || (currentLayer == "page2" && lyr == "page1")) {
      hideLayer(currentLayer);
      document.getElementById(lyr).style.display = 'block';
      currentLayer = lyr;
    }
  }
  
  function hideLayer(lyr) {
    document.getElementById(lyr).style.display = 'none';
  }
  </script>

</body>

</html>

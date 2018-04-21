<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login - Tech2Check</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/icons/favicon.png">
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

</head>

<!-- ======== @Region: body ======== -->

<body class="fullscreen-centered page-login">
  <div id="background-wrapper" class="city" data-stellar-background-ratio="0.8">

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
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  Login
                </h3>
            </div>
            <div class="panel-body">
              <p id="logerror" style=<?php echo isset($_SESSION['logerror']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['logerror']; unset($_SESSION['logerror']); ?></p>
              <p id="logsuccess" style=<?php echo isset($_SESSION['logsuccess']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['logsuccess']; unset($_SESSION['logsuccess']); ?></p>
              
              <form action="push/loginpush.php" id="login" method="post">
                <fieldset>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                      <input type="text" class="form-control" id="login-key" name="login-key" placeholder="Email or Username" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_submit" form="login">Login</button>
                </fieldset>
              </form>
              <p class="m-b-0 m-t">Not signed up? <a href="register.php">Sign up here</a>.</p>
              <p class="m-b-0 m-t">Forgot your password? <a href="password_reset.php">Reset it here</a>.</p>
            </di  v>
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

  <!-- Template Specific Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>

</body>

</html>

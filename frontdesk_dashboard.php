<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Front Desk - Tech2Check</title>
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
  <div id="content" class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <center>
            Front Desk Dashboard
          </center>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <ul class="nav nav-tabs">
          <li class="<?php echo isset($_GET['type_id']) || isset($_GET['serial']) ? "" : "active"; ?>">
            <a href="#checkin" data-toggle="tab">Check In</a>
          </li>
          <li class="<?php echo isset($_GET['type_id']) || isset($_GET['serial']) ? "active" : ""; ?>">
            <a href="#checkout" data-toggle="tab">Check Out</a>
          </li>
          <li>
            <a href="#lookup" data-toggle="tab">User Lookup</a>
          </li>
        </ul>
        
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane <?php echo isset($_GET['type_id']) || isset($_GET['serial']) ? "fade" : "active in"; ?>" id="checkin">
            <?php include('Check_in.php'); ?>
          </div>
          <div class="tab-pane <?php echo isset($_GET['type_id']) || isset($_GET['serial']) ? "active in" : "fade"; ?>" id="checkout">
            <?php include('Check_out.php'); ?>
          </div>
          <div class="tab-pane fade" id="lookup">
            <?php include('userlookup.php'); ?>
          </div>
        </div>
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
  
  <script src="js/checkout.js"></script>
  <script src="js/checkin.js"></script>
  <script src="js/userlookup.js"></script>
</body>

</html>
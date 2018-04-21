<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>About - Tech2Check</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">


  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

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

<body class="page-about">

  <div id="background-wrapper" class="buildings" data-stellar-background-ratio="0.8">

    <?php
      include("navbar.php");
    ?>
  </div>

  <!-- ======== @Region: #content ======== -->
  <div id="content">
    <div class="container" id="about">
      <div class="row">
        <!--main content-->
        <div class="col-md-9 col-md-push-3">
          <div class="page-header">
            <h1>
                About Us
              </h1>
          </div>
          <div class="block block-border-bottom-grey block-pd-sm">
            <h3 class="block-title">
                What Makes Us Tick!
              </h3>
            <img src="img/misc/about-us.png" alt="About us" class="img-responsive img-thumbnail pull-right m-l m-b">
            <p></p>
            <p>Tech2Check is the headquarters for the promotion, instruction and support of technology literacy. From beginners looking to learn the basics to experts seeking to hone their skills, our company's training, education and hands-on learning experiences offers services to meet your ever-increasing technology needs. Would you like to see other services or equipment offered by us? <br> Please contact us. <br><div> <a href="#contact" class="btn btn-more js-scroll-trigger"><i class="fa fa-plus"></i>Contact</a></p></div>
          </div>
          <div class = "block">
            <h3 class = "block-title" id = "team">
            Our Team  
            </h3>
        <div class="row">
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="img-circle img-thumbnail" src="/Project/img/misc/aleks2.png" alt="">
          <h3>Aleks Dushaj
          <br>
            <small>Technician</small>
          </h3>

        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="img-circle img-thumbnail" src="/Project/img/misc/chris.png" alt="">
          <h3>Chris Depalma
          <br>
            <small>Technician</small>
          </h3>

        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="img-circle img-thumbnail" src="/Project/img/misc/nick.png" alt="">
          <h3>Nick Woodle
          <br>
            <small>Technician</small>
          </h3>
        
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="img-circle img-thumbnail" src="/Project/img/misc/tay.png" alt="">
          <h3>Taylor Winowiecki
          <br>
            <small>Technician</small>
          </h3>

        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="img-circle img-thumbnail" src="/Project/img/misc/josh.png" alt="">
          <h3>Josh Salar
          <br>
            <small>Technician</small>
          </h3>
        </div>
      </div>
          </div>
          
          
          
          <div class="block">
            <h3 class="block-title">
                Vital Stats
              </h3>
            <div class="row">
              <div class="col-md-4">
                <div class="stat">
                <span data-counter-up><?php
                  $customers = "SELECT * FROM usernames";
                  $result = mysql_query($customers);
                  echo mysql_num_rows($result);
                ?></span>
                  <small>Happy Customers</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="stat">
                  <span data-counter-up>
                  <?php
                  $rentalcount = "SELECT rental_id
                                  FROM rental_record
                                  WHERE date_returned != '0000-00-00 00:00:00'";
                  $result = mysql_query($rentalcount);
                  echo mysql_num_rows($result);
                  ?>
                  </span>
                  <small>Devices Loaned</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="stat">
                  <span data-counter-up><?php
                    $employees = "SELECT * FROM employee";
                    $result = mysql_query($employees);
                    echo mysql_num_rows($result);
                  ?></span>
                  <small>Employees</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sidebar -->
        <div class="col-md-3 col-md-pull-9 sidebar visible-md-block visible-lg-block">
          <ul class="nav nav-pills nav-stacked">
            <li class="active">
              <a href="about.php" class="first">
                  About Us
                  <small>How It All Began</small>
                </a>
            </li>
            <li>
              <a class="js-scroll-trigger" href="#team">
                  The Team
                  <small>Our team of stars</small>
                </a>
            </li>
          </ul>
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

  <script src="js/custom.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>

</body>

</html>
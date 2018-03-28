<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Tech2Check</title>
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
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="page-index has-hero">
  <div id="background-wrapper" class="buildings" data-stellar-background-ratio="0.1">
    <!--Header & navbar-branding region-->
    <?php 
      include("navbar.php"); 
    ?>
    <div class="hero" id="highlighted">
      <div class="inner">
        <div id="indexCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#indexCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#indexCarousel" data-slide-to="1"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
              <div class="item active">
              <div class="row">
                <div class="col-md-6 col-md-push-6 item-caption">
                  <h2 class="h1 text-weight-light">
                      Welcome to <span class="text-primary">Tech2Check</span>
                    </h2>
                  <p>Easily find what you are looking for and if it’s available.  Checking out equipment is easy <br> and free for students. We also offer services for computer repair, installs, and builds. <br> View our testimonials from our customers below! </p>
                  <a href="/Project/Equipment_available.php" class="btn btn-more btn-lg i-right">Available Equipment <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-md-6 col-md-pull-6 hidden-sm hidden-xs">
                  <img src="img/slides/laptop.png" alt="Slide 1" class="center-block img-responsive">
                </div>
              </div>
              </div>
              <div class="item">
                <div class="row">
                <div class="col-md-6 text-right-md item-caption">
                  <h2 class="h1 text-weight-light">
                      <span class="text-primary">Tech2Check</span> Not yet registered?
                    </h2>
                  <h4>
                      Easily join today!
                  </h4>
                  <p>Joining Tech2Check is free! <br> The information we will need: Your name, home address, phone number, and email. </p>
                  <a href="register.php" class="btn btn-more btn-lg"><i class="fa fa-plus"></i> Register</a>
                </div>
                <div class="col-md-6 hidden-sm hidden-xs">
                  <img src="img/slides/xbox.png" alt="Slide 2" class="center-block img-responsive">
                </div>
              </div>
            </div>
            </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#indexCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#indexCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
            </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- ======== @Region: #content ======== -->
  <div id="content">
    <!-- Mission Statement -->
    <div class="mission text-center block block-pd-sm block-bg-noise">
      <div class="container">
        <h2 class="text-shadow-white">
            We are experienced professionals in information technology, based in Rochester, Michigan. Feel free to contact us for any need or concern.
            <a href="#contact" class="btn btn-more"><i class="fa fa-plus"></i>Contact</a>
          </h2>
      </div>
    </div>
    <!-- Services -->
    <div class="services block block-bg-gradient block-border-bottom">
      <div class="container">
        <h2 class="block-title">
            Our Services
          </h2>
        <div class="row">
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-group fa-stack-1x fa-inverse"></i> </span>
            <h4 class="text-weight-strong">
               Fast and Easy Equipment Check Outs
              </h4>
            <p>Free for students, easily check out equipment such as laptops, workstations, projectors, cameras. </p>
          </div>
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-pencil fa-stack-1x fa-inverse"></i> </span>
            <h4 class="text-weight-strong">
                Computer Repair 
              </h4>
            <p>We offer computer repair to fix any issues you may be experiencing. This includes virus removal, hardware faults, software errors. </p>
          </div>
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-cogs fa-stack-1x fa-inverse"></i> </span>
            <h4 class="text-weight-strong">
                I.T. Consulting
              </h4>
            <p>We work with our clients, advising them on how to use information technology in order to meet their business objectives or overcome problems. We work to improve the structure and efficiency of IT systems.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Pricing -->
    <div class="block-contained">
      <h2 class="block-title">
          Our Pricing
        </h2>
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default panel-pricing text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Installations
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">39.95</span></div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>Software</li>
                <li>Hardware</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Setup
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">99.95</span></div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>Printers</li>
                <li>Computers</li>
                <li>Networking</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Protect
                  <span class="panel-pricing-popular"></span>
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">199.95</span></div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>Insurance</li>
                <li>Data Backup</li>
                <li>Data Transfer</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="panel panel-default panel-pricing text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  I.T. Consulting
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">49.95</span> /hr.</div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>Planning</li>
                <li>Implementation</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-pd-sm block-bg-grey-dark block-bg-overlay block-bg-overlay-6 text-center" data-block-bg-img="https://wallpaper.wiki/wp-content/uploads/2017/05/High-Tech-HD-Background.jpg" data-stellar-background-ratio="0.3">
      <h2 class="h-xlg h1 m-a-0">
        <span data-counter-up>
        <?php
          $customers = "SELECT * FROM usernames";
          $result = mysql_query($customers);
          echo mysql_num_rows($result);
          ?>
        </span>
        </h2>
      <h3 class="h-lg m-t-0 m-b-lg">
          Happy Customers!
        </h3>
      <p>
        <a href="register.php" class="btn btn-more btn-lg i-right">Join them today! <i class="fa fa-angle-right"></i></a>
      </p>
    </div>
    <!--Customer testimonial & Latest Blog posts-->
    <div class="testimonials block-contained">
      <div class="row">
        <!--Customer testimonial-->
        <div class="col-md-6 m-b-lg">
          <h3 class="block-title">
              Testimonials
            </h3>
          <blockquote>
            <p>Check out ... ANOTHA ONE!</p>
            <img style="margin:0px -10px"  src="img/misc/khaled.png" alt="DJ Khaled">
            <small>
                <strong>DJ Khaled</strong>
                <br>
                American record producer, radio personality, DJ, record label executive and author
              </small>
          </blockquote>
        </div>
        <!--Latest Blog posts-->
        
        <div class="col-md-6 blog-roll">
          <h3 class="block-title">
              Latest From Our Blog
            </h3>
          <!-- Blog post 1-->
          <div class="media">
            <?php
            $psql = "SELECT * FROM Blog_post
            ORDER BY Date DESC LIMIT 1";
            $result = mysql_query($psql);
            $data = mysql_fetch_array($result);
            echo "<i>" . $data['Date'] . "</i>" . "<h4><b><font color=#A239CA>" 
            . $data['Title'] . "</font></b></h4>" . $data['Content'];
            ?>
          </div>
          <!-- Blog post 2 -->
          <div class="media">
            <?php
            $p2sql = "SELECT * FROM Blog_post
            WHERE Date < (SELECT MAX(Date) FROM Blog_post)
            ORDER BY Date DESC LIMIT 1";
            $p2result = mysql_query($p2sql);
            $p2data = mysql_fetch_array($p2result);
            echo "<i>" . $p2data['Date'] . "</i>" . "<h4><b><font color=#A239CA>" 
            . $p2data['Title'] . "</font></b></h4>" . $p2data['Content'];
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->


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

  <!-- Specific Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>

</body>

</html>

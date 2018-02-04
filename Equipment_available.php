<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Equipment Available</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
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

  <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
  <link href="#" id="colour-scheme" rel="stylesheet">
</head>
<body class="page-elements">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="benches" data-stellar-background-ratio="0.8">

    <!-- ======== @Region: #navigation ======== -->
    <div id="navigation" class="wrapper">
      <!--Hidden Header Region-->
      <div class="header-hidden collapse">
        <div class="header-hidden-inner container">
          <div class="row">
            <div class="col-md-3">
              <h3>
                  About Us
                </h3>
              <p>Flexor is a super flexible responsive theme with a modest design touch.</p>
              <a href="about.html" class="btn btn-more"><i class="fa fa-plus"></i> Learn more</a>
            </div>
            <div class="col-md-3">
              <!--@todo: replace with company contact details-->
              <h3>
                  Contact Us
                </h3>
              <address>
                  <strong>Tech2Check</strong>
                  <abbr title="Address"><i class="fa fa-pushpin"></i></abbr>
                  Sunshine House, Sunville. SUN12 8LU.
                  <br>
                  <abbr title="Phone"><i class="fa fa-phone"></i></abbr>
                  019223 8092344
                  <br>
                  <abbr title="Email"><i class="fa fa-envelope-alt"></i></abbr>
                  info@tech2check.com
                </address>
            </div>
            <div class="col-md-6">
              <!--Colour & Background Switch for demo - @todo: remove in production-->
              <h3>
                  Theme Variations
                </h3>
              <div class="switcher">
                <div class="cols">
                  Backgrounds:
                  <br>
                  <a href="#benches" class="background benches active" title="Benches">Benches</a> <a href="#boots" class="background boots " title="Boots">Boots</a> <a href="#buildings" class="background buildings " title="Buildings">Buildings</a>
                  <a
                    href="#city" class="background city " title="City">City</a> <a href="#metro" class="background metro " title="Metro">Metro</a>
                </div>
                <div class="cols">
                  Colours:
                  <br>
                  <a href="#orange" class="colour orange active" title="Orange">Orange</a> <a href="#green" class="colour green " title="Green">Green</a> <a href="#blue" class="colour blue " title="Blue">Blue</a> <a href="#lavender" class="colour lavender "
                    title="Lavender">Lavender</a>
                </div>
              </div>
              <p>
                <small>Selection is not persistent.</small>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--Header & navbar-branding region-->
<?php
include ("navbar.php");
?>

    </div>
  </div>

  <!-- ======== @Region: #content ======== -->
  
  <!-- START OF TEST AREA -->
  <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Available Equipment</h1>
          <div class="list-group">
            <a href="#tab1" class="list-group-item" data-toggle="tab">Laptops</a>
            <a href="#tab2" class="list-group-item" data-toggle="tab">Tablets</a>
            <a href="#tab3" class="list-group-item" data-toggle="tab">Cameras</a>
            <a href="#tab4" class="list-group-item" data-toggle="tab">Other</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="tab-content">
        <div class="col-lg-9 tab-pane fade in active" id="tab1">
          <br>
          <br>
        <div class="row">
        <?PHP
                $EquipmentList = "SELECT make.make, model.model, rental_length.rental_length, model.file_path
            	  FROM model
            	  JOIN make ON model.make_id = make.make_id
            	  JOIN type ON model.type_id = type.type_id
            	  JOIN rental_length ON type.rental_length_id = rental_length.rental_length_id
            	  WHERE type.type_id = 1
            	  ORDER BY make.make, model.model";
            	  
            	$Equipment = mysql_query($EquipmentList);
            	
            while($row = mysql_fetch_array($Equipment)){
                echo"<div class='col-lg-4 col-md-6 mb-4'>";
                echo"<div class='card h-100'>";
                echo"<a href='#'><img class='card-img-top' src='" . $row['file_path']."' alt=''></a>";
                echo"<div class='card-body'>";
                echo"<h4 class='card-title'>";
                echo"<a href='#'>" . $row['make'] . " " . $row['model']."</a>";
                echo"</h4>";
                echo"<h5>" . $row['rental_length'] . " Day Rental" . "</h5>";
                echo"<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>";
                echo"</div>";
                echo"<div class='card-footer'>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
            }
        ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
        <div class="col-lg-9 tab-pane fade" id="tab2">
          <br>
          <br>
        <div class="row">
        <?PHP
                $EquipmentList = "SELECT make.make, model.model, rental_length.rental_length, model.file_path
            	  FROM model
            	  JOIN make ON model.make_id = make.make_id
            	  JOIN type ON model.type_id = type.type_id
            	  JOIN rental_length ON type.rental_length_id = rental_length.rental_length_id
            	  WHERE type.type_id = 2
            	  ORDER BY make.make, model.model";
            	  
            	$Equipment = mysql_query($EquipmentList);
            	
            while($row = mysql_fetch_array($Equipment)){
                echo"<div class='col-lg-4 col-md-6 mb-4'>";
                echo"<div class='card h-100'>";
                echo"<a href='#'><img class='card-img-top' src='" . $row['file_path']."' alt=''></a>";
                echo"<div class='card-body'>";
                echo"<h4 class='card-title'>";
                echo"<a href='#'>" . $row['make'] . " " . $row['model']."</a>";
                echo"</h4>";
                echo"<h5>" . $row['rental_length'] . " Day Rental" . "</h5>";
                echo"<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>";
                echo"</div>";
                echo"<div class='card-footer'>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
            }
        ?>
          </div>
          <!-- /.row -->
        </div>
                <div class="col-lg-9 tab-pane fade" id="tab3">
                  <br>
                  <br>
                <div class="row">
        <?PHP
                $EquipmentList = "SELECT make.make, model.model, rental_length.rental_length, model.file_path
            	  FROM model
            	  JOIN make ON model.make_id = make.make_id
            	  JOIN type ON model.type_id = type.type_id
            	  JOIN rental_length ON type.rental_length_id = rental_length.rental_length_id
            	  WHERE type.type_id = 3
            	  ORDER BY make.make, model.model";
            	  
            	$Equipment = mysql_query($EquipmentList);
            	
            while($row = mysql_fetch_array($Equipment)){
                echo"<div class='col-lg-4 col-md-6 mb-4'>";
                echo"<div class='card h-100'>";
                echo"<a href='#'><img class='card-img-top' src='" . $row['file_path']."' alt=''></a>";
                echo"<div class='card-body'>";
                echo"<h4 class='card-title'>";
                echo"<a href='#'>" . $row['make'] . " " . $row['model']."</a>";
                echo"</h4>";
                echo"<h5>" . $row['rental_length'] . " Day Rental" . "</h5>";
                echo"<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>";
                echo"</div>";
                echo"<div class='card-footer'>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
            }
        ?>
          </div>
          <!-- /.row -->
        </div>
                <div class="col-lg-9 tab-pane fade" id="tab4">
                  <br>
                  <br>
                <div class="row">
        <?PHP
                $EquipmentList = "SELECT make.make, model.model, rental_length.rental_length, model.file_path
            	  FROM model
            	  JOIN make ON model.make_id = make.make_id
            	  JOIN type ON model.type_id = type.type_id
            	  JOIN rental_length ON type.rental_length_id = rental_length.rental_length_id
            	  WHERE type.type_id > 3
            	  ORDER BY make.make, model.model";
            	  
            	$Equipment = mysql_query($EquipmentList);
            	
            while($row = mysql_fetch_array($Equipment)){
                echo"<div class='col-lg-4 col-md-6 mb-4'>";
                echo"<div class='card h-100'>";
                echo"<a href='#'><img class='card-img-top' src='" . $row['file_path']."' alt=''></a>";
                echo"<div class='card-body'>";
                echo"<h4 class='card-title'>";
                echo"<a href='#'>" . $row['make'] . " " . $row['model']."</a>";
                echo"</h4>";
                echo"<h5>" . $row['rental_length'] . " Day Rental" . "</h5>";
                echo"<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>";
                echo"</div>";
                echo"<div class='card-footer'>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
            }
        ?>
          </div>
          <!-- /.row -->
        </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
  <!-- END OF TEST AREA -->
  

    <div class="container">
            <div class="block">
        <hr>
        <hr>
        <h4 class="block-title">
           Other Equipment
          </h4>
        <div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":false, "navigation":true, "itemsScaleUp":true}'>
          <?PHP
          
          $ModelList = "SELECT make, model, file_path FROM model JOIN make on model.make_id = make.make_id ORDER BY Rand() LIMIT 10";
          $Models = mysql_query($ModelList);
          
          while($row = mysql_fetch_array($Models)){
            echo "<div class='item'>";
            echo "<a href='' class='overlay-wrapper'>";
            echo "<img src='" . $row['file_path'] ."' alt='Project 1 image' class='img-responsive underlay'>";
            echo "<span class='overlay'>";
            echo "<span class='overlay-content'> <span class='h4'>" . $row['make'] . " " . $row['model'] . "</span>" . "</span>";
            echo "</span>";
            echo "</a>";
            echo "<div class='item-details bg-noise'>";
            echo "<h4 class='item-title'>";
            echo "<a href=''>" . $row['make'] . " " . $row['model'] . "</a>";
            echo "</h4>";
            echo "<a href='' class='btn btn-more'><i class='fa fa-plus'></i>Read more</a>";
            echo "</div>";
            echo "</div>";
          }
          
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

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>

</body>

</html>

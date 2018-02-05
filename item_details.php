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
  <!-- Override CSS sheet -->
  <link href="lib/bootstrap/css/Item_details.css" rel="stylesheet">
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-lg-4">
        <?php
        $themodel = $_GET["model"];
        $sql = "Select file_path from model where model_id = $themodel";
        $result = mysql_query($sql);
        $pic = mysql_fetch_array($result);
        echo "<img src=".$pic['file_path']." width='400' height='400'/>";
        ?>
      </div>
      <div class="col-xs-12 col-md-5 col-lg-5">
        <?php
        $description = "Select description from model where model_id = $themodel";
        $result = mysql_query($description);
        $data = mysql_fetch_array($result);
        echo $data['description'];
        ?>
      </div>
      <div class="col-xs-12 col-md-3 col-lg-3">
        <div id="equipment-checkout">
          <?php
            $count = "Select * from equipment where model_id = $themodel";
            $result = mysql_query($count);
            echo "<h4> Count: " .mysql_num_rows($result). "</h4>";
          
            $avail = "select condition from equipment_status
            join equipment on equipment_status.status_id = equipment.status_id
            where model_id = $themodel";
            $result = mysql_query($avail);
            $data = mysql_fetch_array($result);
            echo $data['condition'];
          ?>
          <a class="btn" href="#">
          <i class="fa fa-shopping-cart fa-lg"></i> Put item on hold</a>
          
        </div>
      </div>
    </div>
  </div>
  
  

  <!-- ======== @Region: #footer ======== -->


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

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
</body>

</html>
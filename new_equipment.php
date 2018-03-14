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
  <div class="content">
  <div class="container">
          <div class="row">
          <div class="col-xs-12">
              <h2 class="page-header">
                  <center>
                      Add New Equipment
                  </center>
              </h2>
          </div>
      </div>
        <form action="push/newequipmentpush.php" method="post">
            <div class="form-group row">
      				<label class="col-xs-2 col-form-label">Model</label>
      					<div class="col-xs-10 selectContainer">
      						<select class="form-control" type="text" id="model" name="model" required>
      						  <option value="" selected disabled>Please select Model</option>
      							<?php
                      // 	$ModelList =  "SELECT model
                      // 	                FROM model
                      // 	                ORDER BY model";
                      	  
                      // 	    //"SELECT *
                      // 	    //FROM model JOIN make
                      // 	    //ON make_id";
                      // 	    //ORDER BY make, model";
                      	  
                      $sql = "SELECT * FROM model a LEFT JOIN make b ON a.make_id = b.make_id ORDER BY make, model";
                      $Model = mysql_query($sql);
                      
                      while($row = mysql_fetch_array($Model)){
                          echo "<option>" . $row['make'] . " " . $row['model'] . "</option>";
                      }
                      ?>
      						</select>
      					</div>
      			</div>
            <div class="form-group row">
              <label for="model" class="col-xs-2 col-form-label">Serial Number</label>
                <div class="col-xs-10">
                <input class="form-control" type="text" value="" id="serialnumber" name="serialnumber" placeholder="Please enter the serial number" required>
              </div>
            </div>
            <input type = "submit" value="SUBMIT" class ="btn btn-default"/><br />
          </form>
    </div>
</div>
<br>
<br>
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

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
</body>

</html>
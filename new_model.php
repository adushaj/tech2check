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
                      Add New Model
                  </center>
              </h2>
          </div>
      </div>
    	<form id="tab3" action="push/newmodelpush.php" method="post">
        	   <div class="form-group row">
      				<label class="col-xs-1 col-form-label">Make</label>
      					<div class="col-xs-5 selectContainer">
      						<select class="form-control" type="text" id="make" name="make" required>
      							<option value="" selected disabled>Please select Make</option>
                		<?php
                      	$MakeList = "SELECT make
                      	  FROM make
                      	  ORDER BY make";
                      	  
                      	$Make = mysql_query($MakeList);
                      	
                      while($row = mysql_fetch_array($Make)){
                          echo "<option>" . $row['make'] . "</option>";
                      }
                      ?>
      						</select>
      					</div>
      				<label class="col-xs-1 col-form-label">Type</label>
      					<div class="col-xs-5 selectContainer">
      						<select class="form-control" type="text" id="type" name="type" required>
      						  <option value="" selected disabled>Please select Type</option>
      							<?php
                      	$TypeList = "SELECT type
                      	  FROM type
                      	  ORDER BY type";
                      	  
                      	$Type = mysql_query($TypeList);
                      	
                      while($row = mysql_fetch_array($Type)){
                          echo "<option>" . $row['type'] . "</option>";
                      }
                      ?>
      						</select>
      					</div>
      			</div>
            <div class="form-group row">
              <label for="model" class="col-xs-1 col-form-label">Model</label>
                <div class="col-xs-5">
                <input class="form-control" type="text" value="" id="model" name="model" placeholder="Please enter the Model" required>
              </div>
              <label for="model" class="col-xs-1 col-form-label">Model Year</label>
                <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="modelyear" name="modelyear" placeholder="Please enter the model year for this model" required>
                </div>
              </div>

              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Processor</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="processor" name="processor" placeholder="Please enter the processor specifications for this model">
                </div>
                <label for="model" class="col-xs-1 col-form-label">RAM</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="ram" name="ram" placeholder="Please enter the RAM specifications for this model">
                </div>
              </div>
              
              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Storage</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="storage" name="storage" placeholder="Please enter the storage specifications for this model">
                </div>
                <label for="model" class="col-xs-1 col-form-label">Graphics</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="graphics" name="graphics" placeholder="Please enter the graphic specifications for this model">
                </div>
              </div>
              
              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Operating System</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="os" name="os" placeholder="Please enter the operating system for this model">
                </div>
                <label for="model" class="col-xs-1 col-form-label">Screen Size</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="screensize" name="screensize" placeholder="Please enter the screen size for this model">
                </div>
              </div>
              
              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Weight (lbs)</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="weight" name="weight" placeholder="Please enter the weight in pounds for this model" required>
                </div>
                <label for="model" class="col-xs-1 col-form-label">Color</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="color" name="color" placeholder="Please enter the color for this model" required>
                </div>
              </div>
              
              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Port Type 1</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="pt1" name="pt1" placeholder="Please enter the description of the first port type for this model">
                </div>
                <label for="model" class="col-xs-2 col-form-label">Port Type 1 Quantity</label>
                  <div class="col-xs-4">
                  <input class="form-control" type="text" value="" id="pt1q" name="pt1q" placeholder="Please enter the quantity for the first port type">
                </div>
              </div>
              
              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Port Type 2</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="pt2" name="pt2" placeholder="Please enter the description of the second port type for this model">
                </div>
                <label for="model" class="col-xs-2 col-form-label">Port Type 2 Quantity</label>
                  <div class="col-xs-4">
                  <input class="form-control" type="text" value="" id="pt2q" name="pt2q" placeholder="Please enter the quantity for the second port type">
                </div>
              </div>
              
              
              <div class="form-group row">
                <label for="model" class="col-xs-1 col-form-label">Port Type 3</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="pt3" name="pt3" placeholder="Please enter the description of the third port type for this model">
                </div>
                <label for="model" class="col-xs-2 col-form-label">Port Type 3 Quantity</label>
                  <div class="col-xs-4">
                  <input class="form-control" type="text" value="" id="pt3q" name="pt3q" placeholder="Please enter the quantity for the third port type">
                </div>
              </div>
              
              
              <div class="form-group row">
      				<label class="col-xs-1 col-form-label">Wireless?</label>
      					<div class="col-xs-5 selectContainer">
      						<select class="form-control" type="text" id="wireless" name="wireless">
      							<option value="" selected disabled>Please select</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
      						</select>
      					</div>
                <label for="model" class="col-xs-1 col-form-label">Megapixels</label>
                  <div class="col-xs-5">
                  <input class="form-control" type="text" value="" id="megapixels" name="megapixels" placeholder="Please enter the camera megapixels for this model">
                </div>
              </div>
                            
              
            <div class="form-group row">
              <label for="model" class="col-xs-1 col-form-label">Description</label>
                <div class="col-xs-11">
                <input class="form-control" type="text" value="" id="description" name="description" placeholder="Please enter the description for this model" required>
                </div>
              </div>
              
              <!-- START OF Testing file upload -->
                <!--<div class="form-group">-->
                <!--  <label for="fileToUpload">Upload Picture</label>-->
                <!--  <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" aria-describedby="fileHelp">-->
                <!--  <small id="fileHelp" class="form-text text-muted">Please format pictures to 300x170. Thank you!</small>-->
                <!--</div>-->
              <!-- END OF Testing file upload -->

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
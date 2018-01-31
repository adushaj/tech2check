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
 

<div id="content">
<div class="container">
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#newequipmenttab" data-toggle="tab">Add New Equipment</a></li>
      <li><a href="#newmaketab" data-toggle="tab">Add New Make</a></li>
      <li><a href="#newmodeltab" data-toggle="tab">Add New Model</a></li>
    </ul>
   
    <div id="myTabContent" class="tab-content">
      <!-- START OF Add New Equipment -->
      <div class="tab-pane active in" id="newequipmenttab">
        <form action="newequipmentpush.php" method="post">
            <div class="form-group row">
      				<label class="col-xs-2 col-form-label">Make</label>
      					<div class="col-xs-10 selectContainer">
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
      			</div>
            <div class="form-group row">
      				<label class="col-xs-2 col-form-label">Model</label>
      					<div class="col-xs-10 selectContainer">
      						<select class="form-control" type="text" id="model" name="model" required>
      						  <option value="" selected disabled>Please select Model</option>
      							<?php
                      	$ModelList = "SELECT model
                      	  FROM model
                      	  ORDER BY model";
                      	  
                      	$Model = mysql_query($ModelList);
                      	
                      while($row = mysql_fetch_array($Model)){
                          echo "<option>" . $row['model'] . "</option>";
                      }
                      ?>
      						</select>
      					</div>
      			</div>
            <div class="form-group row">
              <label for="model" class="col-xs-2 col-form-label">Service Tag</label>
                <div class="col-xs-10">
                <input class="form-control" type="text" value="" id="servicetag" name="servicetag" placeholder="Please enter the service tag" required>
              </div>
            </div>
            <input type = "submit" value="SUBMIT" class ="btn btn-default"/><br />
          </form>
      </div>
      <!-- END OF Add New Equipment -->
      <!-- START OF Add New Make -->
      <div class="tab-pane fade" id="newmaketab">
    	<form id="tab2" action="newmakepush.php" method="post">
        	<div class="form-group row">
              <label for="model" class="col-xs-2 col-form-label">Make</label>
                <div class="col-xs-10">
                <input class="form-control" type="text" value="" id="make" name="make" placeholder="Please enter the make" required>
              </div>
            </div>
            <input type = "submit" value="SUBMIT" class ="btn btn-default"/><br />
    	</form>
      </div>
      <!-- END OF Add New Make -->
      <!-- START OF Add New Model -->
      <div class="tab-pane fade" id="newmodeltab">
    	<form id="tab3" action="newmodelpush.php" method="post">
        	            <div class="form-group row">
      				<label class="col-xs-2 col-form-label">Make</label>
      					<div class="col-xs-10 selectContainer">
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
      			</div>
            <div class="form-group row">
      				<label class="col-xs-2 col-form-label">Type</label>
      					<div class="col-xs-10 selectContainer">
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
              <label for="model" class="col-xs-2 col-form-label">Model</label>
                <div class="col-xs-10">
                <input class="form-control" type="text" value="" id="model" name="model" placeholder="Please enter the Model" required>
              </div>
            </div>
            <input type = "submit" value="SUBMIT" class ="btn btn-default"/><br />
    	</form>
      </div>
      <!-- END OF Add New Model -->
  </div>
  </div>
  </div>

<!-- END OF CONTENT -->
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

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
</body>

</html>
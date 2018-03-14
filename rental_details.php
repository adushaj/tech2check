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
                      Rental Details Lookup
                  </center>
              </h2>
          </div>
      </div>
<form name="lookupForm" id="lookupForm" autocomplete="off">
    <div class="form-group col-xs-8">
        <input class="form-control capitalize" list="user_list" id="lname" name="lname" maxlength="50" placeholder="Enter rental record ID">
        
        <datalist id="user_list">
            <?php 
                $sql = "SELECT rental_id 
                    FROM rental_record
                    ORDER BY rental_id DESC";
                $result = mysql_query($sql);
                
                while ($row = mysql_fetch_array($result)) {
                    echo "<option>{$row['rental_id']}</option>";
                }
            ?>
        </datalist>
    </div>
    <div class="form-group col-xs-4">
        <button class="form-control btn btn-primary" type="button" id="btn-search" name="btn-search" onclick="lookup(this)">Search</button>
    </div>
</form>
    <?php
    if (isset($_GET['lname'])) {
      $employeeorstudent = "SELECT employee_id
                    FROM employee
                    WHERE username_id = (SELECT username_id
                                        FROM rental_record
                                        WHERE rental_id = '{$_GET['lname']}')";

          $check = mysql_query($employeeorstudent);
          if (mysql_num_rows($check) > 0){
                                                  
                $getrentaldetails = "SELECT rr.rental_id, em.first_name, em.last_name, em.street_line_1, em.city, em.state, em.zip_code, checked_out_date, due_date, rr.serial_number, m.model, make.make, type, rr.checked_out_by, rr.checked_in_by, rr.date_returned, rr.notes, em.email, em.phone_number
                          FROM rental_record rr
                          JOIN employee em
                          ON rr.username_id = em.username_id
                          JOIN equipment e
                          ON rr.serial_number = e.serial_number
                          JOIN model m
                          ON e.model_id = m.model_id
                          JOIN make
                          ON m.make_id = make.make_id
                          JOIN type
                          ON m.type_id = type.type_id
                          WHERE rental_id = '{$_GET['lname']}'";
                $getthatstuff = mysql_query($getrentaldetails);
          }
          else {
                $getrentaldetails = "SELECT rr.rental_id, em.first_name, em.last_name, em.street_line_1, em.city, em.state, em.zip_code, checked_out_date, due_date, rr.serial_number, m.model, make.make, type, rr.checked_out_by, rr.checked_in_by, rr.date_returned, rr.notes, em.email, em.phone_number
                          FROM rental_record rr
                          JOIN student em
                          ON rr.username_id = em.username_id
                          JOIN equipment e
                          ON rr.serial_number = e.serial_number
                          JOIN model m
                          ON e.model_id = m.model_id
                          JOIN make
                          ON m.make_id = make.make_id
                          JOIN type
                          ON m.type_id = type.type_id
                          WHERE rental_id = '{$_GET['lname']}'";
                $getthatstuff = mysql_query($getrentaldetails);
          }
      while($row = mysql_fetch_array($getthatstuff)){
      
    ?>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<hr>
    		<div class="row">
    			<div class="col-xs-3">
    				<address>
    				<strong>Student Information:</strong><br>
    					<?php echo "{$row['first_name']}" . " " . "{$row['last_name']}"; ?><br>
    					<?php echo "{$row['street_line_1']}"; ?><br>
    					<?php echo "{$row['city']}" . ", " . "{$row['state']}" . " " . "{$row['zip_code']}"; ?><br>
    					<?php echo "{$row['phone_number']}"; ?><br>
    					<?php echo "{$row['email']}"; ?>
    				</address>
    			</div>
    			<div class="col-xs-3 text-right">
    				<address>
    					<strong>Checkout Date:</strong><br>
    					<?php echo date('F d, Y', strtotime($row['checked_out_date'])); ?><br><br>
    				</address>
    				<address>
    					<strong>Checked out by:</strong><br>
    					<?php 
    					  $getemployee = "SELECT first_name, last_name
    					                  FROM employee
    					                  WHERE username_id = '{$row['checked_out_by']}'";
    					  $getname = mysql_query($getemployee);
    					  while ($row3 = mysql_fetch_array($getname)){
                                  echo "<td>" . $row3['first_name'] . " " . $row3['last_name'] . "</td>";
                }
                ?>
            <br><br>
    				</address>
    		</div>
    		<div class="col-xs-3 text-right">
    				<address>
    					<strong>Due Date:</strong><br>
    					<?php echo date('F d, Y', strtotime($row['due_date'])); ?><br><br>
    				</address>
    		</div>
    		<div class="col-xs-3 text-right">
    				<address>
    					<strong>Checkin Date:</strong><br>
    					<?php 
    					  if ($row['date_returned'] == '0000-00-00 00:00:00'){
    					    echo "Not returned yet";
    					  }
    					  else{
    					    echo date('F d, Y', strtotime($row['date_returned'])); 
    					    }?>
    					    <br><br>
    					    
    				</address>
    				<address>
    					<strong>Checked in by:</strong><br>
    					 <?php 
    					  $getemployee = "SELECT first_name, last_name
    					                  FROM employee
    					                  WHERE username_id = '{$row['checked_in_by']}'";
    					  $getname = mysql_query($getemployee);
    					  while ($row3 = mysql_fetch_array($getname)){
                                  echo "<td>" . $row3['first_name'] . " " . $row3['last_name'] . "</td>";
                }
                ?>
    					<br><br>
    				</address>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Rental Summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Type</strong></td>
        							<td class="text-center"><strong>Serial Number</strong></td>
        							<td class="text-center"><strong>Make</strong></td>
        							<td class="text-center"><strong>Model</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td class="text-center"><?php echo "{$row['type']}"; ?></td>
    								<td class="text-center"><?php echo "{$row['serial_number']}"; ?></td>
    								<td class="text-center"><?php echo "{$row['make']}"; ?></td>
    								<td class="text-center"><?php echo "{$row['model']}"; ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class ="row">
        <div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Notes</strong></h3>
    			</div>
    			<div class="panel-body">
            <?php echo "{$row['notes']}"; ?>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<?php 
  } }
?>
    
    
    
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
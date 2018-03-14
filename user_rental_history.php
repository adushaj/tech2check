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
                      User Rental History Lookup
                  </center>
              </h2>
          </div>
      </div>
<form name="lookupForm" id="lookupForm" autocomplete="off">
    <div class="form-group col-xs-8">
        <input class="form-control capitalize" list="user_list" id="lname" name="lname" maxlength="50" placeholder="Enter user's last name">
        
        <datalist id="user_list">
            <?php 
                $sql = "SELECT last_name 
                    FROM student
                    UNION
                    SELECT last_name FROM employee
                    ORDER BY last_name";
                $result = mysql_query($sql);
                
                while ($row = mysql_fetch_array($result)) {
                    echo "<option>{$row['last_name']}</option>";
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
      $getusernameid = "SELECT username_id
                        FROM student 
                        WHERE last_name = '{$_GET['lname']}'
                        UNION 
                        SELECT username_id
                        FROM employee 
                        WHERE last_name = '{$_GET['lname']}'";
      $getid = mysql_query($getusernameid);
      $username_id = mysql_fetch_array($getid)['username_id'];
      
      $getuserinfo = "SELECT first_name, last_name, middle_initial, email, street_line_1, phone_number, city, state, zip_code
            FROM student 
            WHERE username_id = '$username_id'
            UNION
            SELECT first_name, last_name, middle_initial, email, street_line_1, phone_number, city, state, zip_code
            FROM employee 
            WHERE username_id = '$username_id'";
      $queryinfo = mysql_query($getuserinfo);
      while($row = mysql_fetch_array($queryinfo)){
        echo "<div class=\"container\"><div class=\"row\"><div class=\"col-xs-12\">";
        
        echo "<strong>Student Information:</strong><br>";
    		echo "{$row['first_name']}" . " " . "{$row['last_name']}" . "<br>";
    		echo "{$row['street_line_1']}" . "<br>";
    		echo "{$row['city']}" . ", " . "{$row['state']}" . " " . "{$row['zip_code']}" ."<br>";
    		echo "{$row['phone_number']}" . "<br>";
    		echo "{$row['email']}" . "<br>";
        echo "</div></div></div>";
        
      }
    ?>
    	<div class="col-md-12" style="float: right">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Currently Checked Out</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Make</strong></td>
        							<td class="text-center"><strong>Model</strong></td>
        							<td class="text-center"><strong>Serial Number</strong></td>
        							<td class="text-center"><strong>Due Date</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							              <?php 
    							                
                                    $checkedoutList = "SELECT rr.rental_id, rr.serial_number, rr.due_date, make.make, m.model
                                        FROM rental_record rr
                                        JOIN equipment e
                                        ON rr.serial_number = e.serial_number
                                        JOIN model m
                                        ON e.model_id = m.model_id
                                        JOIN make
                                        ON m.make_id = make.make_id
                                        JOIN type
                                        ON m.type_id = type.type_id
                                        WHERE rr.username_id = '$username_id' AND
                                        rr.date_returned = '0000-00-00 00:00:00'
                                        ORDER BY date(rr.due_date)";
                                        
                                      $checkedout = mysql_query($checkedoutList);
                                      
                                      while($row = mysql_fetch_array($checkedout)){ 
                                      echo "<tr>";    
                      								echo "<td class=\"text-center\">{$row['make']} </td>";
                      								echo "<td class=\"text-center\">{$row['model']} </td>";
                      								echo "<td class=\"text-center\">{$row['serial_number']} </td>";
                      								echo "<td class=\"text-center\">" . date('F d, Y', strtotime($row['due_date'])) . " </td>";
                      								echo "</tr>";
    								} ?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Rental History</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Make</strong></td>
        							<td class="text-center"><strong>Model</strong></td>
        							<td class="text-center"><strong>Serial Number</strong></td>
        							<td class="text-center"><strong>Returned Date</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							              <?php 
                                                $checkedoutList = "SELECT rr.rental_id, rr.serial_number, rr.date_returned, make.make, m.model
                                                    FROM rental_record rr
                                                    JOIN equipment e
                                                    ON rr.serial_number = e.serial_number
                                                    JOIN model m
                                                    ON e.model_id = m.model_id
                                                    JOIN make
                                                    ON m.make_id = make.make_id
                                                    JOIN type
                                                    ON m.type_id = type.type_id
                                                    WHERE rr.username_id = '$username_id' AND
                                                    rr.date_returned != '0000-00-00 00:00:00'
                                                    ORDER BY date(rr.date_returned) DESC";
                                                    
                                                $checkedout = mysql_query($checkedoutList);
                                                
                                                while($row = mysql_fetch_array($checkedout)){ 
                                                echo "<tr>";    
                								echo "<td class=\"text-center\">{$row['make']} </td>";
                								echo "<td class=\"text-center\">{$row['model']} </td>";
                								echo "<td class=\"text-center\">{$row['serial_number']} </td>";
                								echo "<td class=\"text-center\">" . date('F d, Y', strtotime($row['date_returned'])) . " </td>";
                								echo "</tr>";
    								 }?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    	
    	
    	
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>User Notes</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					    	<?php
                      	$notes ="SELECT r.rental_id, r.date_returned, r.notes,checked_in_by
                      	            FROM rental_record r
                      	            WHERE r.username_id = '$username_id'
                      	            and notes != ''
                      	            AND checked_in_by !='0'";
                      	$getnotes = mysql_query($notes);
                      	while($row4 = mysql_fetch_array($getnotes)){
                      	  echo "<strong>" . "{$row4['checked_in_by']}" . " " . "{$row4['date_returned']}" . ":</strong><br>";
                      	  echo "{$row4['notes']}" . "<br>";
                      	  
                      	}
    	
                      }?>
    					
    				</div>
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
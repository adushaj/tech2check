<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Check In - Tech2Check</title>
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
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <center>
            Check In Equipment
          </center>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p id="check_out_error" style=<?php echo isset($_SESSION['check_in_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['check_in_error']; unset($_SESSION['check_in_error']); ?></p>
        <p id="check_out_success" style=<?php echo isset($_SESSION['check_in_success']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['check_in_success']; unset($_SESSION['check_in_success']); ?></p>
        
        <div class="form-group row">
          <div class="col-xs-6">
            <input class="form-control" type="text" id="search" placeholder="Type to search">
          </div>
        </div>
        <div class="table-responsive" id="checkin-table">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Rental ID</th>
                <th>Serial Number</th>
                <th>Make</th>
                <th>Model</th>
                <th>Student</th>
                <th>Checked out by</th>
                <th>Due Date</th>
                <th>Check in?</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $checkedoutList = "SELECT r.rental_id, r.serial_number, make.make, m.model, u.username, e2.first_name, e2.last_name, r.due_date, r.username_id
                  FROM rental_record r
                  JOIN equipment e
                  ON r.serial_number = e.serial_number
                  JOIN model m
                  ON e.model_id = m.model_id
                  JOIN employee e2
                  ON r.checked_out_by = e2.username_id
                  JOIN usernames u 
                  ON r.username_id = u.username_id
                  JOIN make
                  ON m.make_id = make.make_id
                  WHERE date_returned = '0000-00-00 00:00:00'
                  ORDER BY date(due_date), r.username_id, e.model_id";
                  
                $checkedout = mysql_query($checkedoutList);
                
                while($row = mysql_fetch_array($checkedout)){
                  if (date("Y-m-d") == date("Y-m-d", strtotime($row['due_date']))) {
                    echo "<tr class = 'warning'>";
                  } elseif (date("Y-m-d") > date("Y-m-d", strtotime($row['due_date']))) {
                    echo "<tr class = 'danger'>";
                  } else{
                    echo "<tr class = 'success'>";
                  }
                  
                  echo "<td>" . $row['rental_id'] . "</td>";
                  echo "<td>" . $row['serial_number'] . "</td>";
                  echo "<td>" . $row['make'] . "</td>";
                  echo "<td>" . $row['model'] . "</td>";
                  $studentname = "SELECT first_name, last_name 
                                  FROM student 
                                  WHERE username_id = '{$row['username_id']}'
                                  UNION 
                                  SELECT first_name, last_name
                                  FROM employee 
                                  WHERE username_id = '{$row['username_id']}'";
                                    $getname = mysql_query($studentname);
                                    while ($row3 = mysql_fetch_array($getname)){
                                      echo "<td>" . $row3['first_name'] . " " . $row3['last_name'] . "</td>";
                                    }
    
                  echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                  echo "<td>" . date('Y-m-d', strtotime($row['due_date'])) . "</td>";
                  echo "<td>" . "<button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal_{$row['rental_id']}'><i class=\"fa fa-fw fa-angle-right\"></i></button>" . "</td>";
                  
                  echo "</tr>";
                
              ?>
                    <form action="push/checkinpush.php" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo "modal_{$row['rental_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Rental # <?php echo "{$row['rental_id']}"; ?></h4>
                          </div>
                          <div class="modal-body">
                            <div>
                              <label>Student Information: </label><?php
                                      
                                    $studentInfo = "SELECT first_name, last_name, middle_initial, email, phone_number 
                                                    FROM student 
                                                    WHERE username_id = '{$row['username_id']}'
                                                    UNION 
                                                    SELECT first_name, last_name, middle_initial, email, phone_number
                                                    FROM employee 
                                                    WHERE username_id = '{$row['username_id']}'";
                                    $getinfo = mysql_query($studentInfo);
                                    while ($row2 = mysql_fetch_array($getinfo)){
                                      echo "<br>";
                                      echo $row2['first_name'] . " " . $row2['last_name'];
                                      echo "<br>";
                                      echo $row2['email'];
                                      echo "<br>";
                                      echo $row2['phone_number'];
                                    }
                              ?>
                            </div>
                            <br>
                            <div>
                              <label>Equipment: </label><br><?php echo " {$row['make']} {$row['model']}"; ?>
                            </div>
                            <br>
                            <div>
                              <label>Due Date: </label><br><?php echo " " . date('Y-m-d', strtotime($row['due_date'])) ?>
                            </div>
                            <br>
                            <div>
                              <label>Equipment status at time of check in: </label>
                              <div class="form-group">
                                <label class="radio-inline"><input type="radio" id="status_id" name="status_id" value="1" checked>Good</label>
                                <label class="radio-inline"><input type="radio" id="status_id" name="status_id" value="2">Needs Repair</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="control-label">Notes: </label>
                              <textarea class="form-control modal-textarea" value="" type="text" id="notes" name="notes"></textarea>
                            </div>
                            <input class="hidden" name="serial" value="<?= $row['serial'] ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <!--<button type="button" class="btn btn-primary" value='<?php echo"{$row['rental_id']}";?>' onClick='checkin(this, <?php echo "#modal_{$row['rental_id']}"; ?>)'>Complete Check In</button>-->
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value='<?php echo"{$row['rental_id']}";?>'>Complete Check In</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    <?php } ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<!--</form>-->
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
  
  <script src="js/checkin.js"></script>
</body>

</html>
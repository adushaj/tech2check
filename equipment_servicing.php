<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Equipment Servicing - Tech2Check</title>
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
  
  <div id="content" class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <center>
            Equipment Servicing
          </center>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p id="service_error" style=<?php echo isset($_SESSION['service_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['service_error']; unset($_SESSION['service_error']); ?></p>
        <p id="service_success" style=<?php echo isset($_SESSION['service_success']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['service_success']; unset($_SESSION['service_success']); ?></p>
        <div class ="col-xs-12">
          <div class ="table-responsive" id="service-table">
            <table class ="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Serial #</th>
                  <th>Make</th>
                  <th>Model</th>
                  <th>Last Activity</th>
                  <th>Assigned</th>
                  <th>Update Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $statusList = "SELECT *
                         FROM equipment
                         JOIN equipment_status
                         ON equipment.status_id = equipment_status.status_id
                         JOIN model
                         ON equipment.model_id = model.model_id
                         JOIN make
                         ON model.make_id = make.make_id
                         WHERE equipment_status.status_id = '2'
                         ORDER BY equipment.last_activity_date DESC";
                  
                  $getStatus = mysql_query($statusList);
                  
                  while($row = mysql_fetch_array($getStatus)){
                  echo "<td>" . $row['serial_number'] . "</td>";
                  echo "<td>" . $row['make'] . "</td>";
                  echo "<td>" . $row['model'] . "</td>";
                  echo "<td>" . $row['last_activity_date'] . "</td>";
                  $userList = "SELECT * 
                               FROM usernames
                               WHERE username_id = '{$row['username_id']}'";
                  $username = mysql_fetch_array(mysql_query($userList))['username'];             
                  echo "<td>" . $username . "</td>";
                  echo "<td>" . "<button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal_{$row['serial_number']}'><i class=\"fa fa-fw fa-angle-right\"></i></button>" . "</td>";
                  echo "</tr>";
                ?>
                <form action="push/equipment_servicingpush.php" method="post">        
                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo "modal_{$row['serial_number']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel">Serial # <?php echo "{$row['serial_number']}"; ?></h3>
                        </div>
                        <div class="modal-body">
                          <div>
                            <label>Equipment: </label><?php echo " {$row['make']} {$row['model']}"; ?>
                          </div>
                          <div>
                            </br>
                            <label>Change Status</label>
                            <div class="form-group">
                              <label class="radio-inline"><input type="radio" id="status_id" name="status_id" value="2" checked="checked">Needs Repair</label>
                              <label class="radio-inline"><input type="radio" id="status_id" name="status_id" value="1">Good</label>
                              <label class="radio-inline"><input type="radio" id="status_id" name="status_id" value="3">Out of Service</label>
                            </div>
                          </div>
                          </br>
                          <div class="form-group">
                            <label for="message-text" class="control-label"> History</label>
                            </br>
                            <?php
                            echo nl2br("{$row['notes']}"); 
                            ?>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Comment </label>
                            
                            <textarea class="form-control modal-textarea" type="text" id="notes" name="notes"></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" id="btn_serial" name="btn_serial" value="<?php echo"{$row['serial_number']}"; ?>">Complete Service</button>
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
  <script src="/Project/js/service.js"></script>
  <!-- Template Specific Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/checkout.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
</body>

</html>
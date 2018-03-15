<?php
  include("connect.php");
  
  if ($_SESSION['user_search'] == 'employee') {
    $sql_user = "SELECT * FROM employee WHERE username_id = '{$_SESSION['search_id']}'";
  } elseif ($_SESSION['user_search'] == 'student') {
    $sql_user = "SELECT * FROM student WHERE username_id = '{$_SESSION['search_id']}'";
  } else {
    $sql_user = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Configuration - Tech2Check</title>
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
      <div class="row">
          <div class="col-xs-12">
              <h2 class="page-header">
                  <center>
                      User Configuration
                  </center>
              </h2>
          </div>
      </div>
      <div class="well">
        <div class="row">
          <div class="col-md-3">
            <p id="searcherror" style=<?php echo isset($_SESSION['searcherror']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['searcherror']; unset($_SESSION['searcherror']); ?></p>
            <p id="updatesuccess" style=<?php echo isset($_SESSION['updatesuccess']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['updatesuccess']; unset($_SESSION['updatesuccess']); ?></p>
            <form name="searchForm" action="push/configure_userpush.php" method="POST" autocomplete="off">
              <div class="form-group" id="rads">
                  <label class="radio-inline" for="radio_both">
                    <input id="radio_both" name="typeRads" type="radio" onClick="check('radio_both');">
                    Both
                  </label>
                  <label class="radio-inline" for="radio_employee">
                    <input id="radio_employee" name="typeRads" type="radio" onClick="check('radio_employee');">
                    Employees
                  </label>
                  <label class="radio-inline" for="radio_student">
                    <input id="radio_student" name="typeRads" type="radio" onClick="check('radio_student');">
                    Students
                  </label>
              </div>
              <div class="form-group">
                <input class="form-control" id="dlist" name="dlist" list="list_both" name="user" placeholder="Enter username">
                
                <!--Datalist both-->
                <datalist id="list_both">
                  <?php 
                    $sql = "SELECT * FROM usernames ORDER BY username";
                    $result = mysql_query($sql);
                    
                    while ($row = mysql_fetch_array($result)) {
                      $sql_type = "SELECT * FROM employee WHERE username_id = '{$row['username_id']}'";
                      
                      if (mysql_num_rows(mysql_query($sql_type)) > 0) {
                        echo "<option>{$row['username']}</option>";
                      } else {
                        echo "<option>{$row['username']}</option>";
                      }
                    }
                  ?>
                </datalist>
                
                <!--Datalist employee-->
                <datalist id="list_employee">
                  <?php 
                    $sql = "SELECT * FROM usernames ORDER BY username";
                    $result = mysql_query($sql);
                    
                    while ($row = mysql_fetch_array($result)) {
                      $sql_type = "SELECT * FROM employee WHERE username_id = '{$row['username_id']}'";
                      
                      if (mysql_num_rows(mysql_query($sql_type)) > 0) {
                        echo "<option>{$row['username']}</option>";
                      }
                    }
                  ?>
                </datalist>
                
                <!--Datalist student-->
                <datalist id="list_student">
                  <?php 
                    $sql = "SELECT * FROM usernames ORDER BY username";
                    $result = mysql_query($sql);
                    
                    while ($row = mysql_fetch_array($result)) {
                      $sql_type = "SELECT * FROM student WHERE username_id = '{$row['username_id']}'";
                      
                      if (mysql_num_rows(mysql_query($sql_type)) > 0) {
                        echo "<option>{$row['username']}</option>";
                      }
                    }
                  ?>
                </datalist>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-right" id="btn-search" name="btn-search" type="submit">Search</button>
                <button class="btn btn-danger btn-left" id="btn-clear" name="btn-clear" type="submit">Clear</button>
              </div>
            </form>
          </div>
          <div class="col-md-9">
            <div id="user_data" style=<?php echo isset($_SESSION['search_id']) ? "\"display:block;\"" : "\"display:none;\"" ?>>
              <div class="row">
                <div class="col-xs-11">
                  <form name="userForm" id="userForm" action="push/configure_userpush.php" method="POST">
                    <div class="form-group">
                      <label for="username">Username</label> 
                      <input class="form-control" type="text" id="username" name="username" maxlength="25" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query("SELECT * FROM usernames WHERE username_id = '{$_SESSION['search_id']}'"))['username'] . "\""; ?>></input>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input class="form-control" type="text" id="email" name="email" maxlength="50" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['email'] . "\""; ?>></input>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="fname">First name</label>
                        <input class="form-control capitalize" type="text" id="fname" name="fname" maxlength="50" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['first_name'] . "\""; ?>></input>
                      </div>
                      <div class="col-md-2">
                        <label for="mi">MI</label>
                        <input class="form-control all-caps" type="text" id="mi" name="mi" maxlength="1" disabled value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['middle_initial'] . "\""; ?>></input>
                      </div>
                      <div class="col-md-6">
                        <label for="lname">Last name</label>
                        <input class="form-control capitalize" type="text" id="lname" name="lname" maxlength="50" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['last_name'] . "\""; ?>></input>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="address1">Address 1</label>
                        <input class="form-control capitalize" type="text" id="address1" name="address1" maxlength="50" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['street_line_1'] . "\""; ?>></input>
                      </div>
                      <div class="col-md-6">
                        <label for="address2">Address 2</label>
                        <input class="form-control capitalize" type="text" id="address2" name="address2" maxlength="50" disabled value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['street_line_2'] . "\""; ?>></input>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="city">City</label>
                        <input class="form-control capitalize" type="text" id="city" name="city" maxlength="50" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['city'] . "\""; ?>></input>
                      </div>
                      <div class="col-md-3">
                        <label for="state">State</label>
                        <input class="form-control all-caps" type="text" id="state" name="state" maxlength="2" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['state'] . "\""; ?>></input>
                      </div>
                      <div class="col-md-3">
                        <label for="zip">Zip</label>
                        <input class="form-control" type="text" id="zip" name="zip" maxlength="5" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['zip_code'] . "\""; ?>></input>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-xs-10">
                        <label for="phone">Phone number</label>
                        <input class="form-control" type="text" id="phone" name="phone" maxlength="10" disabled required value=<?php echo "\"" . mysql_fetch_array(mysql_query($sql_user))['phone_number'] . "\""; ?>></input>
                      </div>
                      <div class="col-xs-2">
                        <label for="">Locked</label>
                        <br>
                        <input type="checkbox" id="locked" name="locked" disabled <?php echo mysql_fetch_array(mysql_query($sql_user))['locked_indicator'] ? "checked" : ""; ?>></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="notes">Notes</label>
                      <textarea class="form-control" type="text" id="notes" name="notes" rows="2" maxlength="75" disabled><?php echo mysql_fetch_array(mysql_query($sql_user))['notes']; ?></textarea>
                    </div>
                    
                    <!--Employee dropdown-->
                    <div class="form-group" id="employee" style=<?php echo $_SESSION['user_search'] == 'employee' ? "\"display:block;\"" : "\"display:none;\""; ?>>
                      <label for="employee">Employee type</label>
                      <select class="form-control" id="employee_type" name="employee_type" disabled>
                        <?php
                          if ($_SESSION['user_search'] == 'student') {
                            echo "<option value=\"-1\" selected disabled>Please select</option>";
                          } else {
                            echo "<option class=\"alert alert-danger\" value=\"0\">Remove employee</option>";
                          }
                          
                          $sql = "SELECT * FROM employee_type";
                          $result = mysql_query($sql);
                          while ($row = mysql_fetch_array($result)) {
                            if (mysql_fetch_array(mysql_query($sql_user))['employee_type_id'] == $row['employee_type_id']) {
                              echo "<option value=\"{$row['employee_type_id']}\" selected>{$row['employee_type']}</option>";
                            } else {
                              echo "<option value=\"{$row['employee_type_id']}\">{$row['employee_type']}</option>";
                            }
                          }
                        ?>
                      </select>
                    </div>
                    
                    <!--Save changes-->
                    <button class="btn btn-primary" id="btn-save" name="btn-save" type="submit" style="display:none;">Save</button>
                    
                    <!--Save changes employee only-->
                    <button class="btn btn-primary" id="btn-save-emp" name="btn-save-emp" type="submit" style="display:none;">Save</button>
                  </form>
                </div>
                <div class="col-xs-1">
                  <div class="form-group">
                    <button class="btn btn-primary" id="btn-edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o fa-fw"></i></button>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-danger" id="btn-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o fa-fw"></i></button>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-info" id="btn-employee" data-toggle="tooltip" title="Edit Employee Type"><i class="fa fa-user-o fa-fw"></i></button>
                  </div>
                </div>
              </div>
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
  
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="js/user.js"></script>
  
  <script>
    var checked = 'radio_both';
    check(checked);
    
    function check(rad) {
      uncheck(checked);
      document.getElementById(rad).checked = true;
      document.getElementById(rad).classList.add('text-primary');
      checked = rad;
    }
    
    function uncheck(unchecked) {
      document.getElementById(unchecked).checked = false;
      document.getElementById(unchecked).classList.remove('text-primary');
    }
  </script>
</body>

</html>
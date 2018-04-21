<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Lookup - Tech2Check</title>
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
            User Lookup
          </center>
        </h2>
      </div>
    </div>
    <p id="re_error" style=<?php echo isset($_SESSION['re_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['re_error']; unset($_SESSION['re_error']); ?></p>
    <form class="row" name="lookupForm" id="lookupForm" autocomplete="off">
        <div class="form-group col-xs-8">
            <input class="form-control capitalize" list="user_list" id="lname_search" name="lname_search" maxlength="50" placeholder="Enter user's last name">
            
            <datalist id="user_list">
                <?php 
                    $sql = "SELECT last_name FROM student
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
            <button class="form-control btn btn-primary" type="submit" id="btn-search" name="btn-search" onclick="lookup(this)" value="-1">Search</button>
        </div>
    </form>
    <br>
    <?php
        if (isset($_GET['lname_search'])) {
            // echo "<div class='well'>";
            
            $sql = "SELECT username_id, first_name, last_name, middle_initial, email, street_line_1, phone_number
                FROM student WHERE last_name = '{$_GET['lname_search']}'
                UNION
                SELECT username_id, first_name, last_name, middle_initial, email, street_line_1, phone_number
                FROM employee WHERE last_name = '{$_GET['lname_search']}'";
            $result = mysql_query($sql);
            
            while ($row = mysql_fetch_array($result)) {
                echo "<div class='well user-info'>";
                echo "<div class='row'>";
                
                $sql_user = "SELECT username FROM usernames WHERE username_id = '{$row['username_id']}'";
                $username = mysql_fetch_array(mysql_query($sql_user))['username'];
                
                echo "<div class='col-xs-4 bold'>Username:</div>";
                echo "<div class='col-xs-8'>$username</div>";
                
                $name = $row['middle_initial'] != '' ? $row['first_name'].' '.$row['middle_initial'].'. '.$row['last_name'] : $row['first_name'].' '.$row['last_name'];
                echo "<div class='col-xs-4 bold'>Name:</div>";
                echo "<div class='col-xs-8'>$name</div>";
                
                echo "<div class='col-xs-4 bold'>Email:</div>";
                echo "<div class='col-xs-8'>{$row['email']}</div>";
                
                echo "<div class='col-xs-4 bold'>Address:</div>";
                echo "<div class='col-xs-8'>{$row['street_line_1']}</div>";
                
                echo "<div class='col-xs-4 bold'>Phone:</div>";
                echo "<div class='col-xs-8'>{$row['phone_number']}</div>";
                
                echo "</div>";
                echo "</div>";
            }
            
            // echo "</div>";
        }
    ?>
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
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
  
  <script src="js/userlookup.js"></script>
</body>

</html>
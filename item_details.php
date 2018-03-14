<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Item Details - Tech2Check</title>
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
  <link href="css/Item_details.css" rel="stylesheet">
  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #ededed;
}
</style>
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
    <div class="block">
    <p id="res_error" style=<?php echo isset($_SESSION['res_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['res_error']; unset($_SESSION['res_error']); ?></p>
    <p id="res_success" style=<?php echo isset($_SESSION['res_success']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['res_success']; unset($_SESSION['res_success']); ?></p>
    <div class="row">
      <div class="col-xs-12 col-md-4 col-lg-4">
        <?php
        $themodel = $_GET["model"];
        $_SESSION['modelS'] = $themodel;
        $sql = "Select file_path from model where model_id = $themodel";
        $result = mysql_query($sql);
        $pic = mysql_fetch_array($result);
        echo "<img src=".$pic['file_path']." width='400' height='400'/>";
        ?>
      </div>
      <div class="col-xs-12 col-md-5 col-lg-5">
        <?php
        $makeList = "SELECT * FROM model JOIN make on model.make_id = make.make_id where model.model_id = $themodel";
        $makeResult = mysql_query($makeList);
        $sql = mysql_fetch_array($makeResult);
        echo "<h2>" . $sql['make'] . " " . $sql['model'] . "<br>" . "</h2>";
        echo $sql['description'];
        ?>
      </div> 
      <div class="col-xs-12 col-md-3 col-lg-3">
        <form action="push/reservepush.php" method="get">
        <div id="equipment-checkout">
          <?php
            $ecount = "SELECT serial_number FROM equipment WHERE model_id = $themodel AND status_id = 1";
            $eresult = mysql_query($ecount);
            
            $rcount = "SELECT reservation_id FROM reservation_list WHERE model_id = $themodel AND fulfilled_indicator = 0";
            $rresult = mysql_query($rcount);
            
            $result = mysql_num_rows($eresult) - mysql_num_rows($rresult);
            
            echo "<h2>" . $result . " Available</h2>";
            
            $findlength = "SELECT r.rental_length 
              FROM rental_length r
              JOIN type t ON r.rental_length_id = t.rental_length_id
              JOIN model m ON t.type_id = m.type_id 
              WHERE m.model_id = $themodel";
            $fresult = mysql_fetch_array(mysql_query($findlength));
            
            echo "<h4>" . $fresult['rental_length'] . " day rental</h4>";
          

          ?>
          
          <input type="hidden" id="model" name="model" value="<?php echo $themodel; ?>">
          <button type = "submit" value="Reserve" class ="btn btn-more"><i class="fa fa-shopping-cart fa-lg"></i>Reserve</button>
        </div>
      </div>
      </form>
    </div>
    
<!--item specs-->
    <div class="row">
      <div class="col-xs-12 col-md-6 col-lg-6">
        <br>
        <table>
          <tr><th><b>Specifications</b></th></tr>
        <?php
        $specificationsList = "SELECT * FROM specifications 
        JOIN model ON specifications.spec_id = model.spec_id
        WHERE model.model_id = $themodel";
        
        $specs = mysql_query($specificationsList);
        $row = mysql_fetch_array($specs);
        
        
        if($row['processor'] != NULL){
            echo "<tr><td><b>Processor<b></td>" . "<td>" . $row['processor'] . "</td></tr>";
        }
        if($row['ram'] != NULL){
            echo "<tr><td><b>RAM</b></td>" . "<td>" . $row['ram'] . "</td></tr>";
        }
        if($row['storage'] != NULL){
            echo "<tr><td><b>Storage</b></td>" . "<td>" . $row['storage'] . "</td></tr>";
        }          
        if($row['graphics'] != NULL){
            echo "<tr><td><b>Graphics</b></td>" . "<td>" . $row['graphics'] . "</td></tr>";
        } 
        if($row['operating_system'] != NULL){
            echo "<tr><td><b>Operating System</b></td>" . "<td>" . $row['operating_system'] . "</td></tr>";
        }         
        if($row['weight'] != NULL){
            echo "<tr><td><b>Weight</b></td>" . "<td>" . $row['weight'] . " lb" . "</td></tr>";
        }         
        if($row['color'] != NULL){
            echo "<tr><td><b>Color</b></td>" . "<td>" . $row['color'] . "</td></tr>";;
        }         
        if($row['port_type_1'] != NULL){
            echo "<tr><td><b>Port 1</b></td>" . "<td>" . $row['port_type_1_qty'] . "x " . $row['port_type_1'] . "</td></tr>";
        }         
        if($row['port_type_2'] != NULL){
            echo "<tr><td><b>Port 2</b></td>" . "<td>" . $row['port_type_2_qty'] . "x " . $row['port_type_2'] . "</td></tr>";
        } 
        if($row['port_type_3'] != NULL){
            echo "<tr><td><b>Port 3</b></td>" . "<td>" . $row['port_type_3_qty'] . "x " . $row['port_type_3'] . "</td></tr>";
        }           
        if($row['screen_size'] != NULL){
            echo "<tr><td><b>Screen Size</b></td>" . "<td>" . $row['screen_size'] . "</td></tr>";
        } 
        if($row['wireless_indicator'] != NULL){
            echo "<tr><td><b>Wireless Indicator</b></td>" . "<td>" . $row['wireless_indicator'] . "</td></tr>";
        }        
        if($row['megapixels'] != NULL){
            echo "<tr><td><b>Megapixels</b></td>" . "<td>" . $row['megapixels'] . "</td></tr>";
        }
        if($row['model_year'] != NULL){
            echo "<tr><td><b>Model Year</b></td>" . "<td>" . $row['model_year'] . "</td></tr>";
        }        
    ?>
      </table>
      </div>
    </div>
    
  </div>
  </div>

        <div class="container">
            <div class="block">
        <hr>
        <h4 class="block-title">
           Related Items
          </h4>
        <div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":false, "navigation":true, "itemsScaleUp":true}'>
          <?PHP
          $ModelID = mysql_real_escape_string($_GET['model']);
          $ModelList = "SELECT * 
                        FROM model JOIN type 
                        ON model.type_id = type.type_id 
                        where model.model_id = '$ModelID' 
                        ORDER BY Rand() LIMIT 10";
          $Models = mysql_query($ModelList);
          $TypeID = mysql_fetch_array($Models)['type_id'];
          
          $TypeIDFind = "SELECT *
                         FROM model
                         WHERE type_id = '$TypeID'";
          $TypeIDList = mysql_query($TypeIDFind);
        
          
          while($row = mysql_fetch_array($TypeIDList)){
            echo "<div class='item'>";
            echo "<a href='item_details.php?model=" . $row['model_id']."' class='overlay-wrapper'>";
            echo "<img src='" . $row['file_path'] ."' alt='Project 1 image' class='img-responsive underlay'>";
            echo "<span class='overlay'>";
            echo "<span class='overlay-content'> <span class='h4'>" . $row['make'] . " " . $row['model'] . "</span>" . "</span>";
            echo "</span>";
            echo "</a>";
            echo "<div class='item-details bg-noise'>";
            echo "<h4 class='item-title'>";
            echo "<a href='item_details.php?model=" . $row['model_id']."'>" . $row['make'] . " " . $row['model'] . "</a>";
            echo "</h4>";
            echo "<a href='item_details.php?model=" . $row['model_id']."' class='btn btn-more'><i class='fa fa-plus'></i>Read more</a>";
            echo "</div>";
            echo "</div>";
          }
          
          ?>
          
          
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

  <script src="js/custom.js"></script>
  <script src="/Project/js/freelancer.min.js"></script>
  <script src="/Project/lib/jquery-easing/jquery.easing.min.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>
</body>

</html>
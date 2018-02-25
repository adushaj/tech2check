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
    <div class="row">
      <div class="col-xs-12 col-md-4 col-lg-4">
        <?php
        $_SESSION['model'] = $_GET["model"];
        $themodel = $_SESSION['model'];

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
            $count = "Select * from equipment where model_id = $themodel";
            $result = mysql_query($count);
            echo "<h4> Count: " . mysql_num_rows($result) . "</h4>";
          
            $avail = "select * from equipment_status
            join equipment on equipment_status.status_id = equipment.status_id
            where model_id = $themodel";
            $result = mysql_query($avail);
            $data = mysql_fetch_array($result);
            echo "<h4> Status: " .$data['condition'] . "</h4>";
          ?>
          
          <button type = "submit" value="Reserve" class ="btn btn-more"><i class="fa fa-shopping-cart fa-lg"></i>Reserve</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  </div>
        <div class="container">
            <div class="block">
        <hr>
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
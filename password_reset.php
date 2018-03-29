<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Password Reset - Tech2Check</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/icons/favicon.png">
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
  
  <style type="text/css">
    html, body {
        height: 100%;
    }
    .main {
        height: 75%;
        width: 100%;
        display: table;
    }
    .wrapper {
        display: table-cell;
        height: 100%;
        vertical-align: middle;
    }
  </style>
</head>

<!-- ======== @Region: body ======== -->

<body class="fullscreen-centered page-login">
  <div id="background-wrapper" class="city" data-stellar-background-ratio="0.8">

    <!-- ======== @Region: #content ======== -->
    <div class="main" id="content">
      <div class="wrapper">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                Password Reset
              </h2>
            </div>
            <div class="panel-body">
              <p id="reset-error" style=<?php echo isset($_SESSION['reset-error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['reset-error']; unset($_SESSION['reset-error']); ?></p>
              
              <?php if (!isset($_GET['id'])) { ?>
              <form action="push/password_resetpush.php" id="reset" method="POST">
                <div class="form-group">
                  <label class="lb-lg" for="">Please enter your username or email</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                    <input class="form-control" type="text" name="username" required/>
                  </div>
                </div>
                <button class="btn btn-lg btn-primary" name="btn-reset" type="submit">Submit</button>
              </form>
              <?php } elseif (!isset($_GET['q'])) { ?>
              <form action="push/password_resetpush.php?id=<?= $_GET['id'] ?>" id="reset2" method="POST">
                <div class="form-group">
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="fa fa-fw fa-question"></i></span>
                    <select class="form-control" id="question" name="question" required disabled>
                      <?php
                        $username_id = $_GET['id'];
                        
                        $sql = "SELECT * FROM security_answers WHERE username_id = '$username_id'";
                        $result = mysql_query($sql);
                        
                        $arr = mysql_fetch_array($result);
                        $question_id = $arr['question_id'];
                        
                        $sql = "SELECT * FROM security_questions WHERE question_id = '$question_id'";
                        $result = mysql_query($sql);
                        $question = mysql_fetch_array($result)['question'];
                        
                        echo "<option value='$question_id' selected>$question</option>";
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="fa fa-fw fa-pencil"></i></span>
                    <input type="text" class="form-control" placeholder="Answer" id="answer" name="answer" maxlength="15" required>
                  </div>
                </div>
                <button class="btn btn-lg btn-primary" name="btn-reset2" type="submit">Submit</button>
              </form>
              <?php } else { ?>
              <form action="push/password_resetpush.php?id=<?= $_GET['id'] ?>&q=<?= $_GET['q'] ?>" id="reset3" method="POST">
                <div class="form-group">
                  <label class="lb-lg" for="new_password">New Password</label>
                  <input class="form-control input-lg" type="password" id="new_password" name="new_password" maxlength="15" autocomplete="off" required></input>
                </div>
                <div class="form-group">
                  <label class="lb-lg" for="new_password_verify">Verify</label>
                  <input class="form-control input-lg" type="password" id="new_password_verify" name="new_password_verify" maxlength="15" autocomplete="off"></input>
                </div>
                <button class="btn btn-lg btn-primary" name="btn-reset3" type="submit">Submit</button>
              </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
    </div>
  </div>
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

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Collapse Toggle -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">
      <img class="img-responsive" alt="Brand" src="img/logo.png">
    </a>
    
    <?php 
      if (isset($_SESSION['username_id'])) { 
        $nav_sql = "SELECT first_name, last_name, email FROM student WHERE username_id = '{$_SESSION['username_id']}'
                    UNION
                    SELECT first_name, last_name, email FROM employee WHERE username_id = '{$_SESSION['username_id']}'";
        $nav_re = mysql_query($nav_sql);
        $nav_info = mysql_fetch_array($nav_re);
    ?>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown" style="border:none;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> 
          <strong><?php echo $nav_info['first_name'] . ' ' . $nav_info['last_name']; ?></strong>
          <span class="glyphicon glyphicon-chevron-down"></span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <div class="navbar-login">
              <div class="row">
                <div class="col-lg-4">
                  <p class="text-center">
                    <span class="glyphicon glyphicon-user icon-size"></span>
                  </p>
                </div>
                <div class="col-lg-8">
                  <p class="text-left"><strong><?php echo $nav_info['first_name'] . ' ' . $nav_info['last_name']; ?></strong></p>
                  <p class="text-left small"><?php echo $nav_info['email']; ?></p>
                  <p class="text-left">
                    <a href="user_account.php" class="btn btn-primary btn-block btn-sm">Account</a>
                  </p>
                </div>
              </div>
            </div>
          </li>
          <li class="divider"></li>
          <br>
          <li>
            <div class="navbar-login navbar-login-session">
              <div class="row">
                <div class="col-lg-12">
                  <a href="push/logoutpush.php" class="btn btn-danger btn-block">Logout?</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <?php } else { ?>
    <div class="navbar-text social-media social-media-inline pull-right">
      <div class="col-md-4 col-md-offset-8">
        <br>
        <ul class="list-inline user-menu pull-right">
          <?php if (isset($_SESSION['username_id'])) { ?>
            <li class="user-logout"><i class="fa fa-sign-out text-primary "></i> <a href="push/logoutpush.php" class="text-uppercase">Logged in as <?php echo mysql_fetch_array(mysql_query("SELECT * FROM usernames WHERE username_id = '{$_SESSION['username_id']}'"))['username']; ?>, Logout?</a></li>
          <?php } else { ?>
            <li class="user-register"><i class="fa fa-edit text-primary "></i> <a href="register.php" class="text-uppercase">Register</a></li>
            <li class="user-login"><i class="fa fa-sign-in text-primary"></i> <a href="login.php" class="text-uppercase">Login</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>
    
    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="nav_collapse">
      <ul class="nav navbar-nav">
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="Equipment_available.php">EQUIPMENT</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a class="js-scroll-trigger" href="#contact">CONTACT</a></li>
        
        <!-- Not for students -->
        <?php if (isset($_SESSION['employee_type'])) { ?>
          <li><a href="front_desk.php">Front Desk</a></li>
          <!--<li><a href="Check_out.php">CHECK OUT</a></li>-->
          <!--<li><a href="Check_in.php">CHECK IN</a></li>-->
        <?php } ?>
        
        <!-- Tech and Admin Only -->
        <?php if ($_SESSION['employee_type'] == 3 || $_SESSION['employee_type'] == 2) { ?>
        <li><a href="tech_tools.php">Tech</a></li>
          <!--<li class="dropdown">-->
          <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">TECH<b class="caret"></b></a>-->
          <!-- Dropdown Menu for Tech -->
          <!--<ul class="dropdown-menu">-->
          <!--  <li class="dropdown-header">Tech Control Panel</li>-->
          <!--  <li><a href="equipment_servicing.php" tabindex="-1" class="menu-item">Equipment Servicing</a></li>-->
          <!--</ul>-->
        <?php } ?>
        
        <!-- Admin Only -->
        <?php if ($_SESSION['employee_type'] == 3) { ?>
          <li><a href="admin_tools.php">Admin</a></li>
          <!--<li class="dropdown">-->
          <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMIN<b class="caret"></b></a>-->
          <!-- Dropdown Menu for Admin -->
          <!--<ul class="dropdown-menu">-->
          <!--  <li class="dropdown-header">Admin Control Panel</li>-->
          <!--  <li><a href="configure_user.php" tabindex="-1" class="menu-item">Configure User</a></li>-->
          <!--  <li><a href="add_equipment.php" tabindex="-1" class="menu-item">Add Equipment</a></li>-->
          <!--  <li><a href="user_rental_history.php" tabindex="-1" class="menu-item">Rental History by User</a></li>-->
          <!--  <li><a href="rental_details.php" tabindex="-1" class="menu-item">Lookup Rental Details</a></li>-->
          <!--  <li><a href="admin_tools.php" tabindex="-1" class="menu-item">Admin Page Concept</a></li>-->
          <!--</ul>-->
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<div class="header">
  <div class="header-inner container">
    <div class="row">
      <!--header rightside-->
      <!--<div class="col-md-4 col-md-offset-8">-->
      <!--  <br>-->
      <!--  <ul class="list-inline user-menu pull-right">-->
      <!--    <?php if (isset($_SESSION['username_id'])) { ?>-->
      <!--      <li class="user-logout"><i class="fa fa-sign-out text-primary "></i> <a href="push/logoutpush.php" class="text-uppercase">Logged in as <?php echo mysql_fetch_array(mysql_query("SELECT * FROM usernames WHERE username_id = '{$_SESSION['username_id']}'"))['username']; ?>, Logout?</a></li>-->
      <!--    <?php } else { ?>-->
      <!--      <li class="user-register"><i class="fa fa-edit text-primary "></i> <a href="register.php" class="text-uppercase">Register</a></li>-->
      <!--      <li class="user-login"><i class="fa fa-sign-in text-primary"></i> <a href="login.php" class="text-uppercase">Login</a></li>-->
      <!--    <?php } ?>-->
      <!--  </ul>-->
      <!--</div>-->
    </div>
  </div>
</div>
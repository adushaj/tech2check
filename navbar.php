<div class="header">
  <div class="header-inner container">
    <div class="row">
      <div class="col-md-8">
        <!--navbar-branding - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
        <a class="navbar-brand" href="index.php" title="Home">
          <h1 class="hidden">
            <img src="img/logo.png" alt="T2C Logo">
            Tech2Check
          </h1>
        </a>
      </div>
      <!--header rightside-->
      <div class="col-md-4">
        <ul class="list-inline user-menu pull-right">
          <li class="user-register"><i class="fa fa-edit text-primary "></i> <a href="register.php" class="text-uppercase">Register</a></li>
          <li class="user-login"><i class="fa fa-sign-in text-primary"></i> <a href="login.php" class="text-uppercase">Login</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="navbar navbar-default">
    
    <!--mobile collapse menu button-->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="navbar-text social-media social-media-inline pull-right">
      <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
      <a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
      <a href="https://linkedin.com"><i class="fa fa-linkedin"></i></a>
      <a href="https://plus.google.com/discover"><i class="fa fa-google-plus"></i></a> 
    </div> 
 
    <!--everything within this div is collapsed on mobile-->
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav" id="main-menu">
        <li class="icon-link">
          <a href="index.php"><i class="fa fa-home"></i></a>
        </li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="Equipment_available.php">EQUIPMENT</a></li>
        <li><a href="Check_out.php">CHECK OUT</a></li>
        <li><a href="Check_in.php">CHECK IN</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMIN CP<b class="caret"></b></a>
        <!-- Dropdown Menu -->
        <ul class="dropdown-menu">
          <li class="dropdown-header">Admin Control Panel</li>
          <li><a href="elements.html" tabindex="-1" class="menu-item">Configure User</a></li>
          <li><a href="about.html" tabindex="-1" class="menu-item">Add Equipment</a></li>
          <li><a href="login.html" tabindex="-1" class="menu-item">Insert Additional Function Here</a></li>
        </ul>
      </li>
        
    </div>
    <!--/.navbar-collapse -->
  </div>
</div>
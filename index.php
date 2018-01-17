<?php
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Tech2Check</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

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

  <link href="#" id="colour-scheme" rel="stylesheet">


</head>

<body class="page-index has-hero">
  <div id="background-wrapper" class="buildings" data-stellar-background-ratio="0.1">
    <div id="navigation" class="wrapper">
      <div class="header-hidden collapse">
        <div class="header-hidden-inner container">
          <div class="row">
            <div class="col-md-3">
              <h3>
                  About Us
                </h3>
              <p>Tech2Check</p>
              <a href="about.php" class="btn btn-more"><i class="fa fa-plus"></i> Learn more</a>
            </div>
            <div class="col-md-3">

              <h3>
                  Contact Us
                </h3>
              <address>
                  <strong>Tech2Check</strong>
                  <abbr title="Address"><i class="fa fa-pushpin"></i></abbr>
                  312 Meadow Brook Rd. Rochester, MI 48309
                  <br>
                  <abbr title="Phone"><i cllass="fa fa-phone"></i></abbr>
                  555-555-5555
                  <br>
                  <abbr title="Email"><i class="fa fa-envelope-alt"></i></abbr>
                  info@tech2check.com
                </address>
            </div>
            <div class="col-md-6">
              <!--Colour & Background Switch for demo - @todo: remove in production-->
              <h3>
                  Theme Variations
                </h3>
              <div class="switcher">
                <div class="cols">
                  Backgrounds:
                  <br>
                  <a href="#benches" class="background benches active" title="Benches">Benches</a> <a href="#boots" class="background boots " title="Boots">Boots</a> <a href="#buildings" class="background buildings " title="Buildings">Buildings</a>
                  <a
                    href="#city" class="background city " title="City">City</a> <a href="#metro" class="background metro " title="Metro">Metro</a>
                </div>
                <div class="cols">
                  Colours:
                  <br>
                  <a href="#orange" class="colour orange active" title="Orange">Orange</a> <a href="#green" class="colour green " title="Green">Green</a> <a href="#blue" class="colour blue " title="Blue">Blue</a> <a href="#lavender" class="colour lavender "
                    title="Lavender">Lavender</a>
                </div>
              </div>
              <p>
                <small>Selection is not persistent.</small>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--Header & navbar-branding region-->
      <div class="header">
        <div class="header-inner container">
          <div class="row">
            <div class="col-md-8">
              <!--navbar-branding - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
              <a class="navbar-brand" href="index.php" title="Home">
                <h1 class="hidden">
                    <img src="img/logo.png" alt="Flexor Logo">
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
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a> 
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
              <li><a href="contact.php">CONTACT</a></li>

          </div>
          <!--/.navbar-collapse -->
        </div>
      </div>
    </div>
    <div class="hero" id="highlighted">
      <div class="inner">
        <!--Slideshow-->
        <div id="highlighted-slider" class="container">
          <div class="item-slider" data-toggle="owlcarousel" data-owlcarousel-settings='{"singleItem":true, "navigation":true, "transitionStyle":"fadeUp"}'>
            <!--Slideshow content-->
            <!--Slide 1-->
            <div class="item">
              <div class="row">
                <div class="col-md-6 col-md-push-6 item-caption">
                  <h2 class="h1 text-weight-light">
                      Welcome to <span class="text-primary">Tech2Check</span>
                    </h2>
                  <p>Easily find what you are looking for and if it’s available.  Checking out equipment is easy and free for students. We also offer services for computer repair, installs, and builds. View our testimonials from our customers below! </p>
                  <a href="/Project/Equipment_available.php" class="btn btn-more btn-lg i-right">Available Equipment <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-md-6 col-md-pull-6 hidden-xs">
                  <img src="img/slides/slide1.png" alt="Slide 1" class="center-block img-responsive">
                </div>
              </div>
            </div>
            <!--Slide 2-->
            <div class="item">
              <div class="row">
                <div class="col-md-6 text-right-md item-caption">
                  <h2 class="h1 text-weight-light">
                      <span class="text-primary">Tech2Check</span> Not yet registered?
                    </h2>
                  <h4>
                      Easily join today!
                    </h4>
                  <p>Joining Tech2Check is free! <br> The information we will need: Your name, home address, phone number, and email. </p>
                  <a href="register.php" class="btn btn-more btn-lg"><i class="fa fa-plus"></i> Register</a>
                </div>
                <div class="col-md-6 hidden-xs">
                  <img src="img/slides/slide2.png" alt="Slide 2" class="center-block img-responsive">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======== @Region: #content ======== -->
  <div id="content">
    <!-- Mission Statement -->
    <div class="mission text-center block block-pd-sm block-bg-noise">
      <div class="container">
        <h2 class="text-shadow-white">
            We are experienced professionals in information technology, based in Rochester, Michigan. Feel free to contact us for any need or concern.
            <a href="contact.php" class="btn btn-more"><i class="fa fa-plus"></i>Contact</a>
          </h2>
      </div>
    </div>
    <!-- Services -->
    <div class="services block block-bg-gradient block-border-bottom">
      <div class="container">
        <h2 class="block-title">
            Our Services
          </h2>
        <div class="row">
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-group fa-stack-1x fa-inverse"></i> </span>
            <h4 class="text-weight-strong">
               Fast and Easy Equipment Check Outs
              </h4>
            <p>Free for students, easily check out equipment such as laptops, workstations, projectors, cameras. </p>
            <p>
              <a href="Available equipment" class="btn btn-more i-right">Learn More <i class="fa fa-angle-right"></i></a>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-pencil fa-stack-1x fa-inverse"></i> </span>
            <h4 class="text-weight-strong">
                Computer Repair 
              </h4>
            <p>We offer computer repair to fix any issues you may be experiencing. This includes virus removal, hardware faults, software errors,  </p>
            <p>
              <a href="#" class="btn btn-more i-right">Learn More <i class="fa fa-angle-right"></i></a>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-cogs fa-stack-1x fa-inverse"></i> </span>
            <h4 class="text-weight-strong">
                I.T. Consulting
              </h4>
            <p>We work with our clients, advising them how to use information technology in order to meet their business objectives or overcome problems. We work to improve the structure and efficiency of IT systems.</p>
            <p>
              <a href="#" class="btn btn-more i-right">Learn More <i class="fa fa-angle-right"></i></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Pricing -->
    <div class="block-contained">
      <h2 class="block-title">
          Our Plans
        </h2>
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default panel-pricing text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Flex<em>Starter</em>
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">19.95</span> /mo.</div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>3 User Accounts</li>
                <li>3 Private Projects</li>
                <li>Umlimited Projects</li>
                <li>5GB of space</li>
              </ul>
              <a href="#" class="btn btn-primary btn-sm">Choose Plan</a>

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Team<em>Starter</em>
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">49.95</span> /mo.</div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>50 User Accounts</li>
                <li>50 Private Projects</li>
                <li>Umlimited Projects</li>
                <li>Unlimited space</li>
              </ul>
              <a href="#" class="btn btn-primary btn-sm">Choose Plan</a>

            </div>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Enterprise
                  <span class="panel-pricing-popular"><i class="fa fa-thumbs-up"></i> Popular</span>
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">199.95</span> /mo.</div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>100 User Accounts</li>
                <li>100 Private Projects</li>
                <li>Umlimited Projects</li>
                <li>Unlimited space</li>
              </ul>
              <a href="#" class="btn btn-primary btn-sm">Choose Plan</a>

            </div>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="panel panel-default panel-pricing text-center">
            <div class="panel-heading">
              <h4 class="panel-title">
                  Corporate
                </h4>
            </div>
            <div class="panel-pricing-price">$ <span class="digits">299.95</span> /mo.</div>
            <div class="panel-body">
              <ul class="list-dotted">
                <li>1000 User Accounts</li>
                <li>1000 Private Projects</li>
                <li>Umlimited Projects</li>
                <li>Unlimited space</li>
              </ul>
              <a href="#" class="btn btn-primary btn-sm">Choose Plan</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--
Background image callout with CSS overlay
Usage: data-block-bg-img="IMAGE-URL" to apply a background image clearly via jQuery .block-bg-overlay = overlays the background image, colour is inherited from block-bg-* classes .block-bg-overlay-NUMBER = determines opcacity value of overlay from 1-9 (default is 5) ie. .block-bg-overlay-2 or .block-bg-overlay-6
-->
    <div class="block block-pd-sm block-bg-grey-dark block-bg-overlay block-bg-overlay-6 text-center" data-block-bg-img="https://picjumbo.imgix.net/HNCK1088.jpg?q=40&amp;w=1650&amp;sharp=30" data-stellar-background-ratio="0.3">
      <h2 class="h-xlg h1 m-a-0">
          <span data-counter-up>100,000,0</span>s
        </h2>
      <h3 class="h-lg m-t-0 m-b-lg">
          Of Happy Customers!
        </h3>
      <p>
        <a href="#" class="btn btn-more btn-lg i-right">Join them today! <i class="fa fa-angle-right"></i></a>
      </p>
    </div>
    <!--Customer testimonial & Latest Blog posts-->
    <div class="testimonials block-contained">
      <div class="row">
        <!--Customer testimonial-->
        <div class="col-md-6 m-b-lg">
          <h3 class="block-title">
              Testimonials
            </h3>
          <blockquote>
            <p>Our productivity &amp; sales are up! Customers are happy &amp; we couldn't be happier with this product!</p>
            <img src="img/misc/charles-quote.png" alt="Charles Spencer Chaplin">
            <small>
                <strong>Charles Chaplin</strong>
                <br>
                British comic actor
              </small>
          </blockquote>
        </div>
        <!--Latest Blog posts-->
        <div class="col-md-6 blog-roll">
          <h3 class="block-title">
              Latest From Our Blog
            </h3>
          <!-- Blog post 1-->
          <div class="media">
            <div class="media-left hidden-xs">
              <!-- Date desktop -->
              <div class="date-wrapper"> <span class="date-m">Feb</span> <span class="date-d">01</span> </div>
            </div>
            <div class="media-body">
              <h4 class="media-heading">
                  <a href="#" class="text-weight-strong">amet urna integer urna enim, sit arcu pid in nec?</a>
                </h4>
              <!-- Meta details mobile -->
              <ul class="list-inline meta text-muted visible-xs">
                <li><i class="fa fa-calendar"></i> <span class="visible-md">Created:</span> Fri 1st Feb 2013</li>
                <li><i class="fa fa-user"></i> <a href="#">Joe</a></li>
              </ul>
              <p>
                Ut <strong>commodo ullamcorper risus nec</strong> mattis. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.
                <a href="#">Read more <i class="fa fa-angle-right"></i></a>
              </p>
            </div>
          </div>
          <!-- Blog post 2 -->
          <div class="media">
            <div class="media-left hidden-xs">
              <!-- Date desktop -->
              <div class="date-wrapper"> <span class="date-m">Jan</span> <span class="date-d">17</span> </div>
            </div>
            <div class="media-body">
              <h4 class="media-heading">
                  <a href="#" class="text-weight-strong">a nec in sed hac ultrices cursus</a>
                </h4>
              <!-- Meta details mobile -->
              <ul class="list-inline meta text-muted visible-xs">
                <li><i class="fa fa-calendar"></i> <span class="visible-md">Created:</span> Thu 17th Jan 2013</li>
                <li><i class="fa fa-user"></i> <a href="#">Joe</a></li>
              </ul>
              <p>
                Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Aenean at massa leo. Vestibulum in varius arcu.
                <a href="#">Read more <i class="fa fa-angle-right"></i></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->
  <!-- Call out block -->
  <div class="block block-pd-sm block-bg-primary">
    <div class="container">
      <div class="row">
        <h3 class="col-md-4">
            Some of our Clients
          </h3>
        <div class="col-md-8">
          <div class="row">
            <!--Client logos should be within a 120px wide by 60px height image canvas-->
            <div class="col-xs-6 col-md-2">
              <a href="https://bootstrapmade.com" title="Client 1">
                  <img src="img/clients/client1.png" alt="Client 1 logo" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
              <a href="https://bootstrapmade.com" title="Client 2">
                  <img src="img/clients/client2.png" alt="Client 2 logo" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
              <a href="https://bootstrapmade.com" title="Client 3">
                  <img src="img/clients/client3.png" alt="Client 3 logo" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
              <a href="https://bootstrapmade.com" title="Client 4">
                  <img src="img/clients/client4.png" alt="Client 4 logo" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
              <a href="https://bootstrapmade.com" title="Client 5">
                  <img src="img/clients/client5.png" alt="Client 5 logo" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
              <a href="https://bootstrapmade.com" title="Client 6">
                  <img src="img/clients/client6.png" alt="Client 6 logo" class="img-responsive">
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======== @Region: #footer ======== -->
  <footer id="footer" class="block block-bg-grey-dark" data-block-bg-img="img/bg_footer-map.png" data-stellar-background-ratio="0.4">
    <div class="container">

      <div class="row" id="contact">

        <div class="col-md-3">
          <address>
              <strong>Tech2Check Bootstrap Theme Inc</strong>
              <br>
              <i class="fa fa-map-pin fa-fw text-primary"></i> Sunshine House, Sunville. SUN12
              <br>
              <i class="fa fa-phone fa-fw text-primary"></i> 019223 8092344
              <br>
              <i class="fa fa-envelope-o fa-fw text-primary"></i> info@flexorinc.com
              <br>
            </address>
        </div>

        <div class="col-md-6">
          <h4 class="text-uppercase">
              Contact Us
            </h4>
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

        <div class="col-md-3">
          <h4 class="text-uppercase">
              Follow Us On:
            </h4>
          <!--social media icons-->
          <div class="social-media social-media-stacked">
            <!--@todo: replace with company social media details-->
            <a href="#"><i class="fa fa-twitter fa-fw"></i> Twitter</a>
            <a href="#"><i class="fa fa-facebook fa-fw"></i> Facebook</a>
            <a href="#"><i class="fa fa-linkedin fa-fw"></i> LinkedIn</a>
            <a href="#"><i class="fa fa-google-plus fa-fw"></i> Google+</a>
          </div>
        </div>

      </div>

      <div class="row subfooter">
        <!--@todo: replace with company copyright details-->
        <div class="col-md-7">
          <p>Copyright © Tech2Check Theme</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flexor
            -->
            <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by BootstrapMade.com
          </div>
        </div>
        <div class="col-md-5">
          <ul class="list-inline pull-right">
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div>

      <a href="#top" class="scrolltop">Top</a>

    </div>
  </footer>

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

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="contactform/contactform.js"></script>

</body>

</html>

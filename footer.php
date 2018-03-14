<!-- Call out block -->
<div class="block block-pd-sm block-bg-primary">
  <div class="container">
    <div class="row">
      <h3 class="col-md-4">
          Some Of Our Clients
        </h3>
      <div class="col-md-8">
        <div class="row">
          <!--Client logos should be within a 120px wide by 60px height image canvas-->
          <div class="col-xs-6 col-md-2">
            <a href="https://www.oakland.edu/" title="Client 1">
                <img src="img/clients/ou.png" alt="Oakland University logo" class="img-responsive">
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer id="footer" class="block block-bg-grey-dark" data-block-bg-img="img/bg_footer-map.png" data-stellar-background-ratio="0.4">
  <div class="container">

    <div class="row" id="contact">
      <div class="col-md-3">
        <address>
            <strong>Tech2Check</strong>
            <br>
            <i class="fa fa-map-pin fa-fw text-primary"></i> 312 Meadow Brook Rd. Rochester, MI 48309
            <br>
            <i class="fa fa-phone fa-fw text-primary"></i> 555-555-5555
            <br>
            <i class="fa fa-envelope-o fa-fw text-primary"></i> info@tech2check.com
            <br>
          </address>
      </div>

      <div class="col-md-6" id="contact">
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
          <a href="https://twitter.com"><i class="fa fa-twitter fa-fw"></i> Twitter</a>
          <a href="https://facebook.com"><i class="fa fa-facebook fa-fw"></i> Facebook</a>
          <a href="https://linkedin.com"><i class="fa fa-linkedin fa-fw"></i> LinkedIn</a>
          <a href="https://plus.google.com"><i class="fa fa-google-plus fa-fw"></i> Google+</a>
        </div>
      </div>
    </div>

    <div class="row subfooter">
      <!--@todo: replace with company copyright details-->
      <div class="col-md-7">
        <p>Copyright © Tech2Check</p>
      </div>
    </div>

    <a href="#top" class="scrolltop">Top</a>

  </div>
</footer>
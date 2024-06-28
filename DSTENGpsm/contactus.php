<?php
session_start();

if (isset($_SESSION['username'])) {
    include("header2.php");
} else {
    include("header.php");
}
?>

<section class="sub-bnr">
    <div class="position-center-center">
      <div class="container">
        <h4>Contact us</h4>
        <hr class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Contact us</li>
        </ol>
      </div>
    </div>
    <div class="scroll"> <a href="#content" class="go-down"></a></div>
  </section>


<section class="contact-section pb-100 pt-100" id="content">
<div class="container">
<div class="section-title text-center">
<span>Contact Us</span>
<p>Want our services or seeking for a job? Contact us directly or fill out the form and let us know how we can help you.</p>
</div>
<div class="row">
<div class="col-lg-3">
<div class="row">
<div class="col-lg-12 col-sm-6">
<div class="contact-card">
<i class="fas fa-mobile-alt"></i>
<ul>
<li>
<a href="tel:">
+65 9048 1912
</a>
</li>
<li>

</li>
</ul>
</div>
</div>
<div class="col-lg-12 col-sm-6">
<div class="contact-card">
<i class="far fa-envelope"></i>
<ul>
<li>
<a href="#">
dstengineering19@gmail.com
</a>
</li>
<li>
</li>
</ul>
</div>
</div>
<div class="col-lg-12 col-sm-6 offset-lg-0 offset-sm-3">
<div class="contact-card">
<i class="fas fa-map-marker-alt"></i>
<ul>
<li>
100 Jalan Sultan, Sultan Plaza #05-21, Singapore 199001
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-9">
    <div class="contact-area">
        <h3>Let's Talk</h3>
        <form id="contactForm" action="process-form.php" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="number" name="number" id="number" class="form-control" required data-error="Please enter your number" placeholder="Phone Number">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="subject" id="subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea name="message" class="message-field form-control" id="message" rows="5" required data-error="Please type your message" placeholder="Write Message"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="default-btn contact-btn disabled" style="pointer-events: all; cursor: pointer;">Send Message</button>
                    <div id="msgSubmit" class="h3 alert-text text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</section>

<?php include("footer.php");?>
	
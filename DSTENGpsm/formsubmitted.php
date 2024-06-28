


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

    <div class="contact-area">
    <br><br><br>
                <center><p class="info"> 
               <h3> Thank you for your message! We will contact you soon!<h3>
                </p></center><br><br><br>
     
    </div>

</div>
</div>
</section>

<?php include("footer.php");?>
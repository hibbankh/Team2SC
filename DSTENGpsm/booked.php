


<?php
session_start();

if (isset($_SESSION['username'])) {
    include("header2.php");
} else {
    include("header.php");
}
?>

<section class="contact-section pb-100 pt-100" id="content">
<div class="container">
<div class="section-title text-center">


    <div class="contact-area">
    <br><br><br>
                <center><p class="info"> 
               <h3> Thank you for your booking! We will contact you soon!<h3>
                </p></center><br><br><br>
     
    </div>

</div>
</div>
</section>

<?php include("footer.php");?>
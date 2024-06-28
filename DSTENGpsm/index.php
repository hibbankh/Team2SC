<?php
session_start();

if (isset($_SESSION['username'])) {
    include("header2.php");
} else {
    include("header.php");
}
?>

<div class="slider-section">
    <!-- new revolution slider -->
    <section class="no-top no-bottom" aria-label="section-slider">
        <!-- home -->
        <div class="fullwidthbanner-container">
            <div id="new-revolution-slider">
                <ul>
                    <li data-transition="random" data-slotamount="10" data-masterspeed="1200" data-delay="5000">
                        <!-- BACKGROUND IMAGE -->
                        <img src="img/slider_1.jpg" alt="" data-start="0" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center"/>
                        
                        <div class="tp-caption slide-big-heading" style="color: #fff; font-weight: bold; font-size: 2.5rem; position: absolute; z-index: 1; text-align: center; width: 100%; top: 50%; transform: translateY(-50%);">
                            An Expert Construction<br>Service you can Trust
                        </div>
                        
                        <div class="tp-caption slide-sub-heading sft"
                             data-x="30"
                             data-y="320"
                             data-speed="1000"
                             data-start="800"
                             data-easing="easeOutExpo"
                             data-endspeed="400">
                        </div>
                    </li>
                    
                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1200" data-delay="5000">
                        <!-- BACKGROUND IMAGE -->
                        <img src="img/slider/slider_2.jpg" alt="" data-start="0" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center"/>
                        
                        <div class="tp-caption slide-big-heading" style="color: #fff; font-weight: bold; font-size: 2.5rem; position: absolute; z-index: 1; text-align: center; width: 100%; top: 50%; transform: translateY(-50%);">
                            An Expert Construction<br>Service you can Trust
                        </div>
                        
                        <div class="tp-caption slide-sub-heading sft"
                             data-x="30"
                             data-y="320"
                             data-speed="1000"
                             data-start="800"
                             data-easing="easeOutExpo"
                             data-endspeed="400">
                        </div>
                    </li>
                </ul>
                <div class="tp-bannertimer hide"></div>
                <!-- Navigation arrows -->
                <button class="w3-button w3-black w3-display-left slider-prev" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right slider-next" onclick="plusDivs(1)">&#10095;</button>
            </div>
        </div>
        <!-- home end -->
    </section>
    <!-- new revolution slider end -->
    
    <div class="scroll">
        <a href="#content2" class="go-down"></a>
    </div>
</div>


	<section class="about-style-two py-5" id="content2">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4">
<div class="about-img">
<img src="img/about.png"  class="img-fluid" alt="about image">
</div>
</div>
<div class="col-lg-8">
<div class="about-text">
<div class="section-title">
<span>Our Company</span>
<h2>DST Engineering <img src="logo2.png" class="img-fluid" alt="logo" style="border-radius:50%; margin-left:2px;;"></h2>
<h4>(UEN No: 201605798K)</h4>

</div>
<p>DST Engineering PTE LTD is a Singapore-based construction services company for diverse market segments offering clients the accessibility and support of a local firm with the stability and resources of a multi-national organization. 
 
 The company has delivered high-quality projects to more than 30 companies in various sectors across Singapore.</p>

<div class="d-flex">
             

                    <div class="logo_school mr-5">
                        <img src="img/mission.svg" width="40">
                        <h5>Mission</h5>
						<p> "POLITE BEHAVIOUR WITH ALL HUMAN, WORK WITH SINCERITY BY FOCUSING ON SUBJECT, CLOSE MONITORING,</p>
                    </div>

                    <div class="logo_school">
                        <img src="img/vision.svg" width="40">
                        <h5 class="text-left">
                            Vision
                           
                        </h5>
						<p>OUR VISION IS TO CREATE A BETTER EVERY-DAYLIFE FOR CITIZEN.”</p>
                    </div>
                </div>
</div>
</div>
</div>
</div>
</section>
	
	
	
	
	<section class="service-style-three  pb-70">

</section>
	
	
	
	
<section class="facilities-section">
<div class="container-fluid">
<div class="row">
<div class="col-lg-5 offset-lg-1 p-lg-0">
<div class="facililties-text pt-100 pb-70">
<div class="section-title">
<span>Facilities</span>
<h2>DST Engineering Services You with professionals</h2>
<p>The Business's principal activity is INSTALLATION OF PLUMBING, HEATING (NON-ELECTRIC), AIR-CONDITIONING SYSTEMS CHILLER PIPE JACKTING, PIPEING, PAINTING, RENOVATIONS ECT.</p>
</div>
<ul>
<li>ELECTRICAL WORKS</li>
<li>FIRE ALARM PROCTION WORKS</li>
<li>PLUMBING WORKS</li>
<li>CHILLER PIPE JACKETING WORKS</li>
<li>PIPE & STEEL FITTING WORKS</li>
<li>RENOVATION WORKS</li>
<li>PAINTING</li>
<li>DUCTING</li>
</ul>
<div class="theme-btn">
<a href="contactus.php" class="default-btn">
Contact US
</a>
</div>
</div>
</div>
<div class="col-lg-6 p-lg-0">
<div class="facilities-img">
</div>
</div>
</div>
</div>
</section>
	
	<section class="project-section pt-100">
<div class="container">
<div class="section-title text-center">
<span>Our Plans</span>
<h2>Expanding our branch</h2>
<p>We are planning to expand the business and established a branch office in United States of America and start operation upon getting the local US government’s approval and licence as per requirements.</p>
</div>


<div class="project-btn text-center">
  <p>We will be hiring following expert locals (6~10 people) in USA from time to time:</p>
<br>
<ul>
<li>ADMIN TECHNICAL OFFICER- (DIPLOMA ENGINEER CIVIL/ ELECTRICAL/ MECHANICAL)</li>
<li>MARKETING MANAGER</li>
<li>TECHNICIAN OF AIR CONDITIONING AND ELECTRICAL</li>
<li>PLUMBER</li>
<li>WELDER AND PIPE FITTER</li>
<li>GENERAL WORKERS - FOR PAINTING, PLASTERING, FLOOR FITTINGS, ROOF FITTINGS ETC.</li>
</ul>

<BR>
</div>
</div>
</section>
	
	






<section class="project-section pt-100">
   <div class="container">
	      <div class="more-details m-0">
		      <div class="section-title text-center">
          <span>Our Clients</span>
<h2>Our recent clients in Singapore</h2>
</div>
		       <UL>
            <li><b>1. KILOWATTS ENGINEERING & CONSTRUCTION PTE LTD:</b></li>
            <li>UEN No. : 198303042K</li>
<li>Address : 35 BUROH STREET #03-00 JTC SPACE @ BUROH Singapore 627562</li>
<li>Tel:	 	67422617</li>
<li>Fax:	 	67422616</li>
<br>
<li><b>2. JES ONE (M&E) PTE LTD</b></li>
<li>UEN No. : 201811450H</li>
<li>Address : 39 WOODLANDS CLOSE #05-21 MEGA@WOODLANDS Singapore 737856</li>
<li>Tel:	 	69806862</li>
<li>Fax:	 	69806863</li>
<br>

<li><b>3. KWANG WAH ENGINEERING PTE LTD</b></li>
<li>UEN No. : 199400646C</li>
<li>Address : 3016 BEDOK NORTH AVENUE 4 #05-06 EASTECH Singapore 489947</li>
<li>Tel:	 	64488877</li>
<li>Fax:	 	N/A</li>
<br>

<li><b>4. SHIELD+ PTE LTD</b></li>
<li>UEN No. : 200905545K</li>
<li>Address : 32E TUAS AVENUE 11 #01-00 PLATINUM @ PIONEER Singapore 636854</li>
<li>Tel:	 	67462151</li>
<li>Fax:	 	67462156</li>
<br>

<li><b>5. HONG YANG ENGINEERING</b></li>
<li>UEN No. : 47254400D</li>
<li>Address : 446 HOUGANG AVENUE 8 #B1-1635 Singapore 530446</li>
<li>Tel:	 	90229243</li>
<li>Fax:	 	65534860</li>
<br>

<li><b>6. SAYCO ENGINEERING PTE LTD</b></li>
<li>UEN No. : 201719499E</li>
<li>Address : 22 SIN MING LANE #06-76 MIDVIEW CITY Singapore 573969</li>
<li>Tel:	 	67177075</li>
<li>Fax:	 	N/A</li>
<br>

<li><b>7. ALLBEST CONTRACT SERVICES PTE LTD</b></li>
<li>UEN No. : 201618214Z</li>
<li>Address : 10 ADMIRALTY STREET #04-16 NORTH LINK BUILDING Singapore 757695</li>
<li>Tel:	 	98507538</li>
<li>Fax:	 	N/A</li>
<br>

<li><b>8. YUAN LI ELECTRICAL ENGINEERING PTE LTD</b></li>
<li>UEN No. : 201215194D</li>
<li>Address : 2 YISHUN INDUSTRIAL STREET 1 #06-07 NORTHPOINT BIZHUB Singapore 768159</li>
<li>Tel:	 	65704571</li>
<li>Fax:	 	65703477</li>
</UL>
		  </div>
	   </div>
	 </div>
   </div>
</section>


	
	
	<section class="client-section bggray py-5">
<div class="container">
    <div class="row">
	  <div class="col-md-12">
	    <div class="client-outer">
	  <div class="slick-slider client-slider">
          <div class="wow-outer">
<div class="item wow slideInLeft"  data-wow-delay=".1s">
            <img src="img/1.png" class="img-fluid" alt="Imageteam">
        </div>
				</div>
				 <div class="wow-outer">
<div class="item wow slideInLeft"  data-wow-delay=".3s">
            <img src="img/2.png" class="img-fluid" alt="Imageteam">
        </div>
				</div>
				<div class="wow-outer">
<div class="item wow slideInLeft" data-wow-delay=".5s">
            <img src="img/3.png" class="img-fluid" alt="Imageteam">
        </div>
				</div>
					<div class="wow-outer">
<div class="item wow slideInLeft" data-wow-delay=".7s">
            <img src="img/4.png" class="img-fluid" alt="Imageteam">
        </div>
				</div>
					<div class="wow-outer">
             <div class="item wow slideInLeft" data-wow-delay=".9s">
            <img src="img/5.jpg" class="img-fluid" alt="Imageteam">
        </div>
				</div>
				
				<div class="wow-outer">
             <div class="item wow slideInLeft" data-wow-delay=".1s">
            <img src="img/7.webp" class="img-fluid" alt="Imageteam">
        </div>
				</div>
				
				<div class="wow-outer">
             <div class="item  wow slideInLeft" data-wow-delay=".3s">
            <img src="img/8.webp" class="img-fluid" alt="Imageteam">
        </div>
				</div>
				
            </div>
	 
	 </div>
	</div>
	
 
           
     
	</div>
</div>
</section>

<?php include("footer.php");?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var slideIndex = 0;
    var slides = document.querySelectorAll('#new-revolution-slider > ul > li');
    var timeout;

    showSlides();

    function showSlides() {
        var i;
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        timeout = setTimeout(showSlides, 5000); // Change image every 5 seconds
    }

   // Function to change slides by a specified number of slides (n)
function plusSlides(n) {
    clearTimeout(timeout); // Clear the timeout to reset the 5-second interval
    slideIndex += n;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    } else if (slideIndex < 1) {
        slideIndex = slides.length;
    }
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
    timeout = setTimeout(showSlides, 5000); // Change image every 5 seconds
}

    // Arrow navigation
document.querySelector('.slider-prev').addEventListener('click', function () {
    plusSlides(-1); // Move to the previous slide
});

document.querySelector('.slider-next').addEventListener('click', function () {
    plusSlides(1); // Move to the next slide
});
});




!(function(){const sc=document.createElement('script');sc.src="https://apps.voc.ai/api_v2/gpt/bots/livechat/embed.js?id=15488&token=6659F972E4B094B5849DC293";sc.async=true;sc.defer=true;document.body.appendChild(sc);})()
</script> 
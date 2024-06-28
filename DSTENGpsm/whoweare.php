<?php
session_start();

if (isset($_SESSION['username'])) {
    include("header2.php");
} else {
    include("header.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meet Our Team</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  background-color: #f5f5f5;
}
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 2em 1em;
  text-align: center;
}
.column {
  width: 100%;
  padding: 0.5em 0;
}
h1 {
  width: 100%;
  text-align: center;
  font-size: 3.5em;
  color: #000000;
}
.card {
  box-shadow: 0 0 2.4em rgba(25, 0, 58, 0.1);
  padding: 3.5em 1em;
  border-radius: 0.6em;
  color: #000000;
  cursor: pointer;
  transition: 0.3s;
  background-color: #ffffff;
}
.card .img-container {
  width: 8em;
  height: 8em;
  background-color: #a993ff;
  padding: 0.5em;
  border-radius: 50%;
  margin: 0 auto 2em auto;
}
.card img {
  width: 100%;
  border-radius: 50%;
}
.card h3 {
  font-weight: 500;
}
.card p {
  font-weight: 300;
  text-transform: uppercase;
  margin: 0.5em 0 2em 0;
  letter-spacing: 2px;
}
.icons {
  width: 50%;
  min-width: 180px;
  margin: auto;
  display: flex;
  justify-content: space-between;
}
.card a {
  text-decoration: none;
  color: inherit;
  font-size: 1.4em;
}
.card:hover {
  background: linear-gradient(#ea8f45, #8567f7);
  color: #ffffff;
}
.card:hover .img-container {
  transform: scale(1.15);
}
@media screen and (min-width: 768px) {
  section {
    padding: 1em 7em;
  }
}
@media screen and (min-width: 992px) {
  section {
    padding: 1em;
  }
  .card {
    padding: 5em 1em;
  }
  .column {
    flex: 0 0 33.33%;
    max-width: 33.33%;
    padding: 0 1em;
  }
}
</style>
  </head>
  <body>
    <section>
      <div class="row">
        <h1>Meet Our Team</h1>
      </div>
      <div class="row">
        <!-- Column 1-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/male.png" />
            </div>
            <h3>MD ABDUR RAHIM</h3>
            <p>CEO & Director</p>
          </div>
        </div>
        <!-- Column 2-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/1female.png" />
            </div>
            <h3>HALIMA RAHIM CHANDNI</h3>
            <p>Administrative Account Executive & Director</p>
           
          </div>
        </div>
        <!-- Column 3-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/2female.png" />
            </div>
            <h3>MARUFA AKTER</h3>
            <p>Manager Administration & Director</p>
            
          </div>
        </div><br>
         <!-- Column 4-->
         <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/male2.png" />
            </div>
            <h3>IMRAN HOSSAIN</h3>
            <p>Business Development Executive</p>
            
          </div>
        </div>
         <!-- Column 5-->
         <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/male2.png" />
            </div>
            <h3>MOHAMMED ALI</h3>
            <p>Business Coordinator</p>
            
          </div>
        </div>
         <!-- Column 6-->
         <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/supervisor.png" />
            </div>
            <h3>TUHIN</h3>
            <p>Senior Supervisor</p>
        
          </div>
        </div>
         <!-- Column 7-->
         <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/supervisor.png" />
            </div>
            <h3>MOHAMMAD MD NUR</h3>
            <p>Technical Supervisor</p>
            
          </div>
        </div><br>
         <!-- Column 8-->
         <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="img/aboutus/supervisor.png" />
            </div>
            <h3>MD REZAUL KARIM</h3>
            <p>Site Engineer</p>
            
          </div>
        </div>
        

      </div>
    </section>
  </body>
</html>
<?php include("footer.php");?>
<?php
session_start();

// Check if user is not logged in, then redirect to clientlogin.php
if (!isset($_SESSION['username'])) {
    header("Location: clientlogin.php");
    exit;
}

include("header2.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Services</title>
    <style>
    .service-container {
        display: table;
        width: 60%;
        border-spacing: 20px; /* Adjust spacing between cells */
        margin: auto; /* Center horizontally */
        margin-top: 20px; /* Add some space at the top */
        margin-bottom: 20px; /* Add some space at the bottom */
        text-align: center; /* Center the content inside the container */
    }

    .service-row {
        display: table-row;
        text-align: center; /* Center align the cells */
    }

    .service-box {
        display: table-cell;
        width: 200px; /* Set width */
        height: 200px; /* Set height */
        padding: 10px;
        background-color: #f9b92d;
        color: #000;
        border-radius: 20px;
        transition: transform 0.3s; /* Apply transition to transform property */
        cursor: pointer;
        perspective: 1000px; /* Add perspective */
    }

    .service-box:hover {
        background-color: #f6a900;
        color: white;
        transform: translateY(-5px) scale(1.05); /* Apply scale and translation */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Add box shadow */
    }

    .service-box::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        z-index: 2;
        transition: all 0.3s;
        transform: translate(-50%, -50%) scale(1.5);
        pointer-events: none; /* Disable pointer events */
    }

    .service-box:hover::before {
        transform: translate(-50%, -50%) scale(2);
    }

    .service-box i {
        font-size: 36px;
        margin-bottom: 10px;
        z-index: 3;
        position: relative;
    }

    /* Remove default link styles */
    .service-box a {
        color: inherit;
        text-decoration: none;
        display: flex; /* Use flexbox for alignment */
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
</style>

</head>
<body>
    <br><br><center><div>
    <h2>Book Services</h2><br>
    <p>Submit a Booking Form of your choice to receive Quotation...</p>
    </div></center>
    <div class="service-container">
        <div class="service-row">
            <div class="service-box">
                <a href="bookelectricalworks.php">
                    <i class="fa fa-bolt"></i>
                    <span>ELECTRICAL WORKS</span>
                </a>
            </div>
            <div class="service-box">
                <a href="bookfirealarmworks.php">
                    <i class="fa fa-fire"></i>
                    <span>FIRE ALARM PROTECTION WORKS</span>
                </a>
            </div>
            <div class="service-box">
                <a href="bookplumbingworks.php">
                    <i class="fa fa-tint"></i>
                    <span>PLUMBING WORKS</span>
                </a>
            </div>
        </div>
        <div class="service-row">
            <div class="service-box">
                <a href="bookchillarjacketingworks.php">
                    <i class="fa fa-industry"></i>
                    <span>CHILLER PIPE JACKETING WORKS</span>
                </a>
            </div>
            <div class="service-box">
                <a href="bookfittingworks.php">
                    <i class="fa fa-wrench"></i>
                    <span>PIPE &amp; STEEL FITTING WORKS</span>
                </a>
            </div>
            <div class="service-box">
                <a href="bookrenovationworks.php">
                    <i class="fa fa-building"></i>
                    <span>RENOVATION WORKS</span>
                </a>
            </div>
        </div>
        <div class="service-row">
            <div class="service-box">
                <a href="bookpainting.php">
                    <i class="fa fa-paint-brush"></i>
                    <span>PAINTING</span>
                </a>
            </div>
            <div class="service-box">
                <a href="bookducting.php">
                    <i class="fa fa-arrows-alt"></i>
                    <span>DUCTING</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("footer.php");?>



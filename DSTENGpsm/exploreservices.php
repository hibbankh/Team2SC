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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DST Engineering Services</title>
    <style>
        .service {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .service:nth-child(even) {
            flex-direction: row-reverse;
        }
        .service img {
            width: 50%;
            height: auto;
            object-fit: cover;
            max-width: 2560px;
            max-height: 1707px;
        }
        .service-description {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }
        .service-description h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <br><br><center><b><h1>Services We Provide</h1></b></center><br><br>
    
    <?php
    $services = [
        ["ELECTRICAL WORKS", "At DST Engineering, our electrical works encompass a full range of services tailored to meet the unique needs of residential, commercial, and industrial clients. We specialize in comprehensive electrical wiring, installations, and maintenance tasks. Our experienced electricians ensure that all systems are safe, efficient, and compliant with the latest standards. Whether it’s a simple home rewiring project or a complex industrial electrical system, our commitment to quality and safety guarantees reliable results.", "../img/electrical.jpeg"],
        ["FIRE ALARM PROTECTION WORKS", "Our fire sprinkler system services at DST Engineering are designed to protect your property and ensure the safety of its occupants. We provide comprehensive solutions including the design, installation, and maintenance of advanced fire sprinkler systems. Our expert team ensures that each system is tailored to meet the specific needs of your building, complying with all safety regulations and standards. Trust us to deliver reliable fire protection that minimizes risk and maximizes safety.", "../img/fire_alarm.jpg"],
        ["PLUMBING WORKS", "DST Engineering offers top-notch plumbing services, addressing all aspects of plumbing needs from minor repairs to major installations. Our skilled plumbers are experienced in handling everything from leaky faucets and clogged drains to the installation of complex plumbing systems in new constructions. We use the latest tools and techniques to ensure efficient and long-lasting solutions, providing you with peace of mind and reliable plumbing infrastructure.", "../img/plumbing.jpeg"],
        ["CHILLER PIPE JACKETING WORKS", "We specialize in chiller pipe jacketing to enhance the performance and longevity of your HVAC systems. Our chiller pipe jacketing services involve insulating pipes to prevent energy loss, protect against environmental damage, and improve overall efficiency. Using high-quality materials and expert installation techniques, DST Engineering ensures that your chiller systems operate at optimal performance, reducing energy costs and extending system lifespan.", "../img/chiller_pipe.jpg"],
        ["PIPE & STEEL FITTING WORKS", "At DST Engineering, we provide exceptional pipe and steel fitting services for a variety of applications. Our experienced technicians are adept at installing and repairing piping systems and steel structures in industrial, commercial, and residential settings. We ensure precision and durability in all our fittings, using high-grade materials and following strict safety standards. Whether it’s for plumbing, gas lines, or structural support, we deliver reliable and robust solutions.", "../img/pipe_steel.jpg"],
        ["RENOVATION WORKS", "Transform your space with DST Engineering's comprehensive renovation services. We handle everything from initial design concepts to the final finishing touches, ensuring your vision comes to life. Our renovation services include structural changes, interior redesign, and updates to plumbing and electrical systems. With a keen eye for detail and a commitment to quality, we create functional and aesthetically pleasing environments that meet your specific needs and preferences.", "../img/renovation.jpeg"],
        ["PAINTING", "Enhance the appearance of your property with DST Engineering's professional painting services. Our team of skilled painters uses high-quality paints and techniques to deliver flawless finishes on both interior and exterior surfaces. We take care of every aspect of the painting process, from surface preparation to the final coat, ensuring a durable and attractive result. Whether you need a fresh coat for a new look or detailed touch-ups, we provide exceptional painting solutions.", "../img/painting.jpg"],
        ["DUCTING", "Our ducting services at DST Engineering are designed to ensure efficient and effective air distribution within your HVAC systems. We provide custom ductwork design, fabrication, and installation to suit the specific requirements of your building. Our team uses high-quality materials and state-of-the-art equipment to create duct systems that maximize airflow and energy efficiency. With our professional ducting services, you can achieve optimal indoor air quality and comfort.", "../img/ducting.jpg"],
    ];

    foreach ($services as $index => $service) {
        echo "<div class='service'>";
        echo "<img src='images/{$service[2]}' alt='{$service[0]}'>";
        echo "<div class='service-description'>";
        echo "<h2>{$service[0]}</h2>";
        echo "<p>{$service[1]}</p>";
        echo "</div>";
        echo "</div>";
    }
    ?>
    
</body>
</html>
<?php include("footer.php");?>
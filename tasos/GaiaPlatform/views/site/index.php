<?php

/** @var yii\web\View $this */

$this->title = 'GAIA V2';
?>

<!-- Mashead header-->
<header class="masthead">
    <div class="container px-5">
        <div class=" gx-5 align-items-center">
            <div class="col-lg">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-2 lh-1 mb-3">Create powerful IoT networks,<br> We’ve designed everything beyond...
                    </h1>
                    <img class="main_logo" src="asset/sensors.jpg" style="height: 200px;width: 95%">
                    <div style="text-align: center">



                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-5">
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="asset/sensors.jpg" style="width:100%">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="asset/sensors.jpg" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="asset/sensors.jpg" style="width:100%">
        <div class="text">Caption Three</div>
    </div>
<!--    <div class="mySlides fade">-->
<!--        <div class="numbertext">3 / 3</div>-->
<!--        <img src="" style="width:100%">-->
<!--        <div class="text">Caption Three</div>-->
<!--    </div>-->

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
</div>

<div class="container px-5">
    <div id="wrap">
        <h1 class=" lh-1 mb-1">Now you can download Gaia Desktop Application!</h1>
        <a href="<?php echo Yii::$app->urlManager->createUrl(['site/download','path'=>'/upload/','file'=>'GAIAsetup.exe'])
        ?>" class="btn-slide2">
            <span class="circle2"><i class="fa fa-download"></i></span>
            <span class="title2">Download GAIA Desktop Application</span>
            <span class="title-hover2">Click here</span>
        </a>
    </div>
</div>

<section class="bg-light" style="display: block;text-align: left">
    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col">
                <h5><b>POWERFULL SENSOR NETWORKS</b></h5>
                <p>
                    Fast installation and minimum maintenance costs. Diverse services and applications. Robust equipment and network scalability.
                </p>
            </div>
            <div class="col">
                <h5><b>OVER 50 SENSOR TYPES</b></h5>
                <p>
                    Sensors for measuring air quality, water quality, ions concentration, container levels, structural health, noise, agriculture parameters, security parameters, radioactivity levels etc.
                </p>
            </div>
            <div class="col">
                <h5><b>SOLAR POWERED</b></h5>
                <p>
                    Each sensor node has a battery that can be recharged using an internal or external solar panel. Batteries have a 6600mAh load that ennsures non-stop working time, even in days with no sunlight at all.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Call to action section-->
<section class="cta" id="map-container">
        <div id="map"></div>

</section>
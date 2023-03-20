<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\helpers\Url;

$this->title = 'GAIA V2';
$this->registerJs("let locationMap='" . Url::to(['site/map']) . "'", \yii\web\View::POS_BEGIN);
?>

<!-- Mashead header-->
<header class="masthead">
    <div class="container px-5">

                    <div class="carousel1">
                        <div class="carousel1-item"></div>
                        <div class="carousel1-item"></div>
                        <div class="carousel1-item"></div>
                        
            </div>
    </div>
</header>
<!--    <div class="container px-5">-->
<!--        <div class=" gx-5 align-items-center">-->
<!--            <div class="col-lg">-->
<!--                 Mashead text and app badges-->
<!--                <div class="mb-5 mb-lg-0 text-center text-lg-start">-->
<!--                    <h1 class="display-2 lh-1 mb-3">Create powerful IoT networks,<br> We’ve designed everything-->
<!--                        beyond...-->
<!--                    </h1>-->
<!--<header>-->
<!--    <div class="container">-->
<!---->
<!--        <div class="carousel1">-->
<!--            <div class="carousel1-item"></div>-->
<!--            <div class="carousel1-item"></div>-->
<!--            <div class="carousel1-item"></div>-->
<!---->
<!--        </div>-->
<!--                    <div class="slideshow-container" style="">-->
<!--                        <div class="mySlides fade">-->
<!--                            <img src="https://www.w3docs.com/uploads/media/default/0001/03/66cf5094908491e69d8187bcf934050a4800b37f.jpeg" style="width:100%">-->
<!--                        </div>-->
<!--                        <div class="mySlides fade">-->
<!---->
<!--                            <img src="https://www.w3docs.com/uploads/media/default/0001/03/b7d624354d5fa22e38b0ab1f9b905fb08ccc6a05.jpeg" style="width:100%">-->
<!---->
<!--                        </div>-->
<!--                        <div class="mySlides fade">-->
<!---->
<!--                            <img src="https://www.w3docs.com/uploads/media/default/0001/03/5bfad15a7fd24d448a48605baf52655a5bbe5a71.jpeg" style="width:100%">-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <br>-->
<!--</header>-->
                    <script>
                        let slideIndex = 0;
                        let timeoutId = null;
                        const slides = document.getElementsByClassName("mySlides");
                        const dots = document.getElementsByClassName("dot");

                        showSlides();
                        function currentSlide(index) {
                            slideIndex = index;
                            showSlides();
                        }
                        function plusSlides(step) {

                            if(step < 0) {
                                slideIndex -= 1;

                                if(slideIndex < 0) {
                                    slideIndex = slides.length - 1;
                                }
                            }

                            showSlides();
                        }
                        function showSlides() {
                            for(let i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                                dots[i].classList.remove('active');
                            }
                            slideIndex++;
                            if(slideIndex > slides.length) {
                                slideIndex = 1
                            }
                            slides[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].classList.add('active');
                            if(timeoutId) {
                                clearTimeout(timeoutId);
                            }
                            timeoutId = setTimeout(showSlides, 3000); // Change image every 5 seconds
                        }
                    </script>
<!--                    <img class="main_logo" src="asset/sensors.jpg" style="height: 200px;width: 95%">-->


<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</header>-->
<div class="container px-5">
    <div style="text-align: center">
        <div id="wrap">
            <h3 style="color: #5caa32 "><b>You can now download Gaia Platform stable version.</b></h3>
<!--            <h1 class="display-6 lh-1 mb-3"></h1>-->
            <a href="<?php echo Yii::$app->urlManager->createUrl(['site/download', 'path' => '/upload/', 'file' => 'GAIAsetup.exe'])
            ?>" class="btn-slide2">
                <span class="circle2"><i class="fa fa-download"></i></span>
                <span class="title2">Download GAIA Desktop Application</span>
                <span class="title-hover2">Click here</span>
            </a>
            <!--        <p>Gaia Platform - Version 1.0</p>-->
        </div>

    </div>
</div>
<section class="bg-light" style="display: block;text-align: left">
    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col">
                <h5><b>POWERFUL SENSOR NETWORKS</b></h5>
                <p>
                    Fast installation and minimum maintenance costs. Diverse services and applications. Robust equipment
                    and network scalability.
                </p>
            </div>
            <div class="col">
                <h5><b>OVER 50 SENSOR TYPES</b></h5>
                <p>
                    Sensors for measuring air quality, water quality, ions concentration, container levels, structural
                    health, noise, agriculture parameters, security parameters, radioactivity levels etc.
                </p>
            </div>
            <div class="col">
                <h5><b>SOLAR POWERED</b></h5>
                <p>
                    Each sensor node has a battery that can be recharged using an internal or external solar panel.
                    Batteries have a 6600mAh load that ensures non-stop working time, even in days with no sunlight at
                    all.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div id="map_element"></div>

</section>
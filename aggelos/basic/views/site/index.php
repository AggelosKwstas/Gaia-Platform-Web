<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\helpers\Url;

$this->title = 'GAIA V2';
$this->registerJs("let locationMap='" . Url::to(['site/map']) . "'", \yii\web\View::POS_BEGIN);
$this->registerJs("let downloadUrl='" . Url::to(['site/download', 'path' => '/upload/', 'file' => 'GAIAsetup.exe']) . "'", \yii\web\View::POS_BEGIN);

?>

<header>
    <div class="container-zoom" style="height: 90dvh!important;">
        <div class="item-zoom">
            <img src="asset/libe.png" style="width:100%;height:100%;pointer-events: none;" alt="">

        </div>
        <div class="centered" style="color: white; padding-right: 28%">
            <div class="item" data-aos="fade-down" data-aos-duration="1300">
                <h1 class="display-2 lh-2 mb-3">Gaia Platform</h1>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="1300">
                <p><b>
                        Create powerful IoT networks,<br>
                        We’ve designed everything beyond...
                    </b>
                </p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="container">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-5">
                <div class="item" data-aos="fade-down" data-aos-duration="1000">
                    <h2 class="display-4 lh-1 mb-4">What we offer?</h2>
                </div>
                <div class="item" data-aos="fade-up" data-aos-duration="1000">
                    <p style="font-size: 19px;">
                        Our platform helps to enable real-time monitoring and measurement of the air quality index in
                        the environment. These sensors are designed to detect and measure the concentration of various
                        pollutants such as PM2.5, PM10, CO2 and other harmful gases. The platform is designed to be easy
                        to use, making it convenient for you to access the air quality data whenever you need it.
                        In addition to personal use, GAIA platform is also used for public health purposes, such as
                        tracking air pollution levels in cities and industrial areas.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="item" data-aos="fade-left" data-aos-duration="1000">
                    <img src="asset/whatMeasure1.jpg" class="img-fluid" style="width: 1500px;  pointer-events: none" alt="">
                </div>
            </div>


</section>

<section class="bg-light" style="display: block;text-align: left">
    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col">
                <div class="item" data-aos="fade-down" data-aos-duration="1000">
                    <h5><b>POWERFUL SENSOR NETWORKS</b></h5>
                </div>
                <div class="item" data-aos="fade-right" data-aos-duration="1000">
                    <p>
                        Fast installation and minimum maintenance costs. Diverse services and applications. Robust
                        equipment
                        and network scalability.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="item" data-aos="fade-down" data-aos-duration="1000">
                    <h5><b>OVER 50 SENSOR TYPES</b></h5>
                </div>
                <div class="item" data-aos="fade-up" data-aos-duration="1000">
                    <p>
                        Sensors for measuring air quality, water quality, ions concentration, container levels,
                        structural
                        health, noise, agriculture parameters, security parameters, radioactivity levels etc.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="item" data-aos="fade-down" data-aos-duration="1000">
                    <h5><b>SOLAR POWERED</b></h5>
                </div>
                <div class="item" data-aos="fade-left" data-aos-duration="1000">
                    <p>
                        Each sensor node has a battery that can be recharged using an internal or external solar panel.
                        Batteries have a 6600mAh load that ensures non-stop working time, even in days with no sunlight
                        at
                        all.
                    </p>
                </div>
            </div>
        </div>
</section>


<section>
    <div class="container" style="display:block;text-align:center">
        <div class="item" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="display-4 lh-1 mb-4" style="position:center">Gaia Platform Stable Version</h2>
        </div>
        <div class="item" data-aos="fade-up" data-aos-duration="1000">
            <p class="lead fw-normal text-muted mb-5 mb-lg-0">You can now download Gaia Platform version 1.0 for
                Windows.</p>
        </div>
        <div class="btn-circle-download mt-4">
            <svg id="arrow" width="14px" height="20px" viewBox="17 14 14 20">
                <path d="M24,15 L24,32"></path>
                <polyline points="30 27 24 33 18 27"></polyline>
            </svg>
            <svg id="check" width="21px" height="15px" viewBox="13 17 21 15">
                <polyline points="32.5 18.5 20 31 14.5 25.5"></polyline>
            </svg>
            <svg  id="border" width="48px" height="48px" viewBox="0 0 48 48">
                <path d="M24,1 L24,1 L24,1 C36.7025492,1 47,11.2974508 47,24 L47,24 L47,24 C47,36.7025492 36.7025492,47 24,47 L24,47 L24,47 C11.2974508,47 1,36.7025492 1,24 L1,24 L1,24 C1,11.2974508 11.2974508,1 24,1 L24,1 Z"></path>
            </svg>
        </div>


    </div>
</section>

<h4 class="legend_h">Case Study - Urban Air Quality</h4>
<section class="cta">
    <div id="map_element"></div>

</section>


<!-- Mashead header-->
<!--<header class="masthead" style="max-height: 30%">-->
<!--    <div class="container px-5">-->
<!--        <div class=" gx-5 align-items-center">-->
<!--            <div class="col-lg">-->

<!--                <div id="slider">-->
<!--                    <div id="line">-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <ul id="move">-->
<!--                        <li><img src="asset/airPolution2.jpg">-->
<!---->
<!--                        </li>-->
<!---->
<!--                        <li><img src="asset/connected.jpg"></li>-->

<!--                        <li><img src="asset/airTree2.png"></li>-->
<!--                        <li><img src="asset/pollutantEmissions.jpg"></li>-->
<!--                    </ul>-->
<!--                    <div id="back">-->
<!--                        <-->
<!--                    </div>-->
<!---->
<!--                    <div id="center">-->
<!---->
<!--                        <div id="wrap">-->
<!--                            <div class="card" style="width: 25rem;">-->
<!--                            <h3 style="color: black "><b>You can now download Gaia Platform stable version.</b></h3>-->
<!---->
<!--                            <a href="--><?php //echo Yii::$app->urlManager->createUrl(['site/download', 'path' => '/upload/', 'file' => 'GAIAsetup.exe'])
//                            ?><!--" class="btn-slide2">-->
<!--                                <span class="circle2"><i class="fa fa-download"></i></span>-->
<!--                                <span class="title2">Download GAIA Desktop Application</span>-->
<!--                                <span class="title-hover2">Click here</span>-->
<!--                            </a>-->
<!--                            <br>-->
<!--                                    <p style="color:black">Gaia Platform - Version 1.0</p>-->
<!--                        </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div id="forword">-->
<!--                        >-->
<!--                    </div>-->
<!--                    <div id="dots">-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--                <script>-->
<!--                    window.onload = function() {-->
<!---->
<!--                        let slider = document.querySelector('#slider');-->
<!--                        let move = document.querySelector('#move');-->
<!--                        let moveLi = Array.from(document.querySelectorAll('#slider #move li'));-->
<!--                        let forword = document.querySelector('#slider #forword');-->
<!--                        let back = document.querySelector('#slider #back');-->
<!--                        let counter = 1;-->
<!--                        let time = 3000;-->
<!--                        let line = document.querySelector('#slider #line');-->
<!--                        let dots = document.querySelector('#slider #dots');-->
<!--                        let dot;-->
<!---->
<!--                        for (i = 0; i < moveLi.length; i++) {-->
<!---->
<!--                            dot = document.createElement('li');-->
<!--                            dots.appendChild(dot);-->
<!--                            dot.value = i;-->
<!--                        }-->
<!---->
<!--                        dot = dots.getElementsByTagName('li');-->
<!---->
<!--                        line.style.animation = 'line ' + (time / 1000) + 's linear infinite';-->
<!--                        dot[0].classList.add('active');-->
<!---->
<!--                        function moveUP() {-->
<!---->
<!--                            if (counter == moveLi.length) {-->
<!---->
<!--                                moveLi[0].style.marginLeft = '0%';-->
<!--                                counter = 1;-->
<!---->
<!--                            } else if (counter >= 1) {-->
<!---->
<!--                                moveLi[0].style.marginLeft = '-' + counter * 100 + '%';-->
<!--                                counter++;-->
<!--                            }-->
<!---->
<!--                            if (counter == 1) {-->
<!---->
<!--                                dot[moveLi.length - 1].classList.remove('active');-->
<!--                                dot[0].classList.add('active');-->
<!---->
<!--                            } else if (counter > 1) {-->
<!---->
<!--                                dot[counter - 2].classList.remove('active');-->
<!--                                dot[counter - 1].classList.add('active');-->
<!---->
<!--                            }-->
<!---->
<!--                        }-->
<!---->
<!--                        function moveDOWN() {-->
<!---->
<!--                            if (counter == 1) {-->
<!---->
<!--                                moveLi[0].style.marginLeft = '-' + (moveLi.length - 1) * 100 + '%';-->
<!--                                counter = moveLi.length;-->
<!--                                dot[0].classList.remove('active');-->
<!--                                dot[moveLi.length - 1].classList.add('active');-->
<!---->
<!--                            } else if (counter <= moveLi.length) {-->
<!---->
<!--                                counter = counter - 2;-->
<!--                                moveLi[0].style.marginLeft = '-' + counter * 100 + '%';-->
<!--                                counter++;-->
<!---->
<!--                                dot[counter].classList.remove('active');-->
<!--                                dot[counter - 1].classList.add('active');-->
<!---->
<!--                            }-->
<!---->
<!--                        }-->
<!---->
<!--                        for (i = 0; i < dot.length; i++) {-->
<!---->
<!--                            dot[i].addEventListener('click', function(e) {-->
<!---->
<!--                                dot[counter - 1].classList.remove('active');-->
<!--                                counter = e.target.value + 1;-->
<!--                                dot[e.target.value].classList.add('active');-->
<!--                                moveLi[0].style.marginLeft = '-' + (counter - 1) * 100 + '%';-->
<!---->
<!--                            });-->
<!---->
<!--                        }-->
<!---->
<!--                        forword.onclick = moveUP;-->
<!--                        back.onclick = moveDOWN;-->
<!---->
<!--                        let autoPlay = setInterval(moveUP, time);-->
<!---->
<!--                        slider.onmouseover = function() {-->
<!---->
<!--                            autoPlay = clearInterval(autoPlay);-->
<!--                            line.style.animation = '';-->
<!---->
<!--                        }-->
<!---->
<!--                        slider.onmouseout = function() {-->
<!---->
<!--                            autoPlay = setInterval(moveUP, time);-->
<!--                            line.style.animation = 'line ' + (time / 1000) + 's linear infinite';-->
<!---->
<!--                        }-->
<!---->
<!--                    }-->
<!---->
<!---->
<!--                </script>-->

<!--<div class="container px-5">-->
<!--    <br>-->
<!--    <h1 class="display-2 lh-1 mb-3">Create powerful IoT networks,<br> We’ve designed everything-->
<!--        beyond...-->
<!--    </h1>-->
<!--</div>-->

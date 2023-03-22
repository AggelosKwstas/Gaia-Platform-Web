<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\helpers\Url;

$this->title = 'GAIA V2';
$this->registerJs("let locationMap='" . Url::to(['site/map']) . "'", \yii\web\View::POS_BEGIN);
?>
<header>
    <div class="container-zoom">
        <div class="item-zoom">
            <img src="asset/airPolution3.jpg" style="width:100%">
        </div>

    </div>
</header>




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

<div class="container px-5">
    <br>
    <h1 class="display-2 lh-1 mb-3">Create powerful IoT networks,<br> We’ve designed everything
        beyond...
    </h1>
</div>


<!--<div class="container px-5">-->
<!--    <div style="text-align: center">-->
<!--        <div id="wrap">-->
<!--            <h3 style="color: #5caa32 "><b>You can now download Gaia Platform stable version.</b></h3>-->
<!--                <h1 class="display-6 lh-1 mb-3"></h1>-->-->
<!--            <a href="--><?php //echo Yii::$app->urlManager->createUrl(['site/download', 'path' => '/upload/', 'file' => 'GAIAsetup.exe'])
//            ?><!--" class="btn-slide2">-->
<!--                <span class="circle2"><i class="fa fa-download"></i></span>-->
<!--                <span class="title2">Download GAIA Desktop Application</span>-->
<!--                <span class="title-hover2">Click here</span>-->
<!--            </a>-->
<!--                  <p>Gaia Platform - Version 1.0</p>-->-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
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
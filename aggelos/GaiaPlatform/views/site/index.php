<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\helpers\Url;

$this->registerJs("let locationMap='" . Url::to(['site/map']) . "'", \yii\web\View::POS_BEGIN);
$this->registerJs("let downloadUrl='" . Url::to(['site/download', 'path' => '/upload/', 'file' => 'GAIAsetup.exe']) . "'", \yii\web\View::POS_BEGIN);
?>

<title>GAIA Platform</title>
<header>
    <div class="container-zoom">
        <div class="item-zoom">
            <img src="asset/libe.png">
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
                    <img src="asset/whatMeasure1.jpg" class="img-fluid" style="width: 1500px;  pointer-events: none"
                         alt="">
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
        <div class="row">
            <div class="col">
                <div class="item" data-aos="fade-right" data-aos-duration="1000">
                    <h5><b>MULTIPLE RADIO OPTIONS</b></h5>
                </div>
                <div class="item" data-aos="fade-right" data-aos-duration="1000">
                    <p>
                        WiFi and 3G/GPRS radios can be used in order to send the sensor data directly to the Internet
                        without using an intermediate gateway.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="item" data-aos="fade-up" data-aos-duration="1000">
                    <h5><b>GEOLOCATION TRACKING</b></h5>
                </div>
                <div class="item" data-aos="fade-up" data-aos-duration="1000">
                    <p>
                        3G+GPS and GPRS+GPS modules allow the implementation of realtime tracking applications in an
                        easy way.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="item" data-aos="fade-left" data-aos-duration="1000">
                    <h5><b>SENSORS TO THE CLOUD</b></h5>
                </div>
                <div class="item" data-aos="fade-left" data-aos-duration="1000">
                    <p>
                        Connect any sensor the GAIA platform and deploy Internet of Things (IoT), machine-to-machine
                        (M2M) or Smart Cities projects with minimum time to market.
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

        <button type="button" class="icon" onclick="downloadGaia()" title="Download GAIA">
            <div class="cloud">
                <div class="puff puff-1"></div>
                <div class="puff puff-2"></div>
                <div class="puff puff-3"></div>
                <div class="puff puff-4"></div>
                <div class="puff puff-5"></div>
                <div class="puff puff-6"></div>
                <div class="puff puff-7"></div>
                <div class="puff puff-8"></div>
                <div class="puff puff-9"></div>
                <div class="puff puff-10"></div>
                <div class="cloud-core"></div>
                <div class="check"></div>
                <div class="arrow">
                    <div class="arrow-stem">
                        <div class="arrow-l-tip"></div>
                        <div class="arrow-r-tip"></div>
                    </div>
                </div>
            </div>
            <div class="preload">
                <div class="drop drop-1"></div>
                <div class="drop drop-2"></div>
                <div class="drop drop-3"></div>
            </div>
            <!-- <div class="progress"></div> -->
        </button>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                this.querySelector(".icon").addEventListener("click", function () {
                    let waitClass = "waiting",
                        runClass = "running",
                        cl = this.classList;

                    if (!cl.contains(waitClass) && !cl.contains(runClass)) {
                        cl.add(waitClass);
                        setTimeout(function () {
                            cl.remove(waitClass);
                            setTimeout(function () {
                                cl.add(runClass);
                                setTimeout(function () {
                                    cl.remove(runClass);
                                }, 4000);
                            }, 200);
                        }, 1800);
                    }
                });
            });

        </script>

    </div>
</section>
<section class="bg-light">
    <div class="item" data-aos="fade-up" data-aos-duration="1000">
        <div class="container pt-3" style="display: block;text-align: center">
            <h4 class="display-6">Case Study - Urban Air Quality</h4>
            <p style="font-size: 19px">
                With the rise of urbanization, air pollution has become a growing concern for public health and the
                environment. Using our sensors we have an efficient way to monitor air quality in real-time and generate
                accurate data for analysis.
                This case study monitors the city of Ioannina, Greece and demonstrates the potential of sensor
                technology to address and solve critical environmental challenges.
            </p>
        </div>
    </div>
</section>

<section class="cta">
    <div id="map_element"></div>
</section>



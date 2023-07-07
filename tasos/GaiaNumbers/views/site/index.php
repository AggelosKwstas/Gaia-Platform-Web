<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\helpers\Url;

$this->registerJs("let locationMap='" . Url::to(['site/map']) . "'", \yii\web\View::POS_BEGIN);
$this->registerJs("let downloadUrl='" . Url::to(['site/download', 'path' => '/upload/', 'file' => 'GAIA Platform_1.1.0_x64_en-US.msi']) . "'", \yii\web\View::POS_BEGIN);
?>
<?php if (Yii::$app->controller->action->id === 'index'): ?>
    <?php $this->registerJs("


// Configuration
const config1 = {
    minZoom: 7,
    maxZoom: 18,
    zoomControl: false,
};

// Map initialization
const zoom = 11;
const lat = 39.6711248555161;
const lng = 20.85619898364398;
const map = L.map('map_element', config1).setView([lat, lng], zoom);

// LeafIcon customization
const LeafIcon = L.Icon.extend({
    options: {
        iconSize: [25, 30],
        popupAnchor: [-1, -15]
    }
});

// Creating LeafIcon instance
const Icon = new LeafIcon({
    iconUrl: 'asset/markers/stationGreen.png',
});

// Adding tile layer to the map
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 20,
}).addTo(map);

// Adding markers to the map with tooltips
const marker3 = L.marker([39.6216, 20.8596], {icon: Icon}).bindTooltip('<b><em>Click on the station for a detailed view</em></b>').addTo(map);
const marker4 = L.marker([39.7147, 20.7572], {icon: Icon}).bindTooltip('<b><em>Click on the station for a detailed view</em></b>').addTo(map);
const marker5 = L.marker([39.7027, 20.8122], {icon: Icon}).bindTooltip('<b><em>Click on the station for a detailed view</em></b>').addTo(map);
const marker6 = L.marker([39.7066, 20.7926], {icon: Icon}).bindTooltip('<b><em>Click on the station for a detailed view</em></b>').addTo(map);

// Customizing attribution control
map.attributionControl.setPrefix();

// Function to handle map click events
function onMapClick() {
    window.location.href = locationMap;
}

// Setting up map click event listeners
const markers = [marker3, marker4, marker5, marker6];
map.on('click', onMapClick);
markers.forEach(marker => {
    marker.on('click', onMapClick);
});

    ");
    ?>
<?php endif; ?>


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
                    <h3 class="h3Hover" style="position:center">What we offer?</h3>
                </div>
                <div class="item" data-aos="fade-up" data-aos-duration="1000">
                    <p style="font-size: 19px;">
<!--                        Our platform helps to enable real-time monitoring and measurement of the air quality index in-->
<!--                        the environment. These sensors are designed to detect and measure the concentration of various-->
<!--                        pollutants such as PM2.5, PM10, CO2 and other harmful gases. The platform is designed to be easy-->
<!--                        to use, making it convenient for you to access the air quality data whenever you need it.-->
<!--                        In addition to personal use, GAIA platform is also used for public health purposes, such as-->
<!--                        tracking air pollution levels in cities and industrial areas.-->
                        GAIA Platform is dedicated to promoting environmental sustainability by providing real-time monitoring and measurement of both air and water quality indices.
                        Through advanced sensor technology, our platform enables the detection and measurement of various pollutants, including PM2.5, PM10, CO2, and other harmful gases, in the air.
                        Simultaneously, it also offers comprehensive monitoring of water quality parameters such as pH, turbidity, dissolved oxygen, and chemical contaminants.
                        With an intuitive interface and user-friendly design, accessing and interpreting the data becomes effortless, allowing users to make informed decisions regarding their environmental well-being.

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

<section class="bg-light">
    <div class="container px-4">
        <div class="row gx-3">
            <div class="col-xs-12 col-sm-12 col-lg" data-aos="fade-right" data-aos-duration="1000">
                <div class="p-1">
                    <div class="container-type" style="background-color: white">
                        <img src="asset/cards/pol.png" class="container-image" style="width: 80px">
                        <div style="text-align: center;">
                            <b>OVER 50 SENSOR TYPES</b><br>
                            <p>
                                The sensors encompass a wide range of measurements including air quality, water quality, ion concentration,
                                container levels, noise levels, agricultural parameters, security parameters,
                                radioactivity levels, and many more, making them indispensable tools for comprehensive monitoring and analysis in various industries and applications.
<!--                                These sensor measurements play a crucial role in various fields such as environmental monitoring,-->
<!--                                infrastructure management, smart cities, industrial processes, healthcare,-->
<!--                                and scientific research, enabling data-driven decision-making and improving the overall quality of life.-->
<!--                                The sensors encompass a wide range of measurements including air quality, water quality,-->
<!--                                ion concentration, container levels, structural health, noise levels, agricultural-->
<!--                                parameters, security parameters, radioactivity levels, etc.<br>-->
                            </p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <div class="p-1">
                    <div class="container-type" style="background-color: white">
                        <img src="asset/cards/solar-panel.png" class="container-image" style="width: 80px">
                        <div style="text-align: center">
                            <b>SOLAR POWERED</b><br>
                            <p>
                                The GAIA platform offers fast and hassle-free installation, minimizing maintenance
                                costs. Its versatility enables a wide range of services and applications to cater to
                                diverse needs. With robust equipment and network scalability, the platform ensures
                                seamless growth and adaptability for future requirements.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                <div class="p-1">
                    <div class="container-type" style="background-color: white">
                        <img src="asset/cards/sensor.png" class="container-image" style="width: 80px">
                        <div style="text-align: center">
                            <b>POWERFULL SENSOR NETWORKS
                            </b><br>
                            <p>
                                GAIA platform excels in providing fast installation and low maintenance costs.
                                It offers a wide range of diverse services, while its robust equipment and network scalability ensure seamless growth and adaptability.
                                The GAIA platform's robust data security ensure the protection and confidentiality of sensitive information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-3 pt-3">
            <div class="col-xs-12 col-sm-12 col-lg" data-aos="fade-right" data-aos-duration="1000">
                <div class="p-1">
                    <div class="container-type" style="background-color: white">
                        <img src="asset/cards/globe.png" class="container-image" style="width: 70px">
                        <div style="text-align: center;padding-top:0.2rem">
                            <b>GEOLOCATION TRACKING
                            </b><br>
                            <p>
                                The integration of 3G+GPS and GPRS+GPS modules enables the implementation of real-time
                                tracking applications in a seamless and user-friendly manner. These modules combine the
                                power of GPS technology with 3G or GPRS cellular communication, providing accurate and
                                efficient tracking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <div class="p-1">
                    <div class="container-type" style="background-color: white">
                        <img src="asset/cards/cloud-data.png" class="container-image" style="width: 70px">
                        <div style="text-align: center;padding-top:0.2rem">
                            <b>SENSORS TO THE CLOUD
                            </b><br>
                            <p>
                                The GAIA platform enables seamless sensor connectivity and expedites IoT, M2M, or Smart
                                Cities projects. It supports diverse sensor types, ensuring minimal time to market and
                                eliminating the need for an intermediary gateway, revolutionizing the deployment of
                                groundbreaking developments in the field.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                <div class="p-1">
                    <div class="container-type" style="background-color: white">
                        <img src="asset/cards/internet.png" class="container-image" style="width: 70px">
                        <div style="text-align: center">
                            <b>MULTIPLE RADIO OPTIONS
                            </b><br>
                            <p>
                                By harnessing the advanced functionalities offered by Wi-Fi and 3G/GPRS radios, an
                                exciting opportunity arises to establish a seamless and unbroken connection for
                                transmitting sensor data directly to the Internet. This groundbreaking development
                                eliminates the necessity for an intermediary gateway.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container" style="display:block;text-align:center">
        <div class="item" data-aos="fade-down" data-aos-duration="1000">
            <h3 class="h3Hover" style="position:center">Gaia Platform Stable Version</h3>
        </div>
        <div class="item" data-aos="fade-up" data-aos-duration="1000">
            <p class="lead fw-normal text-muted mb-5 mb-lg-0">You can now download Gaia Platform version 1.1.0 for
                Windows.</p>
        </div>

        <button1 type="button" class="icon" onclick="downloadGaia()" title="Download GAIA">
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
        </button1>
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
<!--            <h4 class="display-6">Case Study - Urban Air Quality</h4>-->
            <h3 class="h3Hover">Case Study - Urban Air Quality</h3>
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



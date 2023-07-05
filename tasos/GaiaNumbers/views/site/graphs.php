<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
//$this->registerJs("let title=" . json_encode($title), \yii\web\View::POS_BEGIN);
$this->registerJs("let nodeId=" . json_encode($id), \yii\web\View::POS_BEGIN);
//$this->registerJsFile('js/echarts.js',['depends' => 'yii\web\JqueryAsset']);
//$this->registerJsFile('js/graphs.js',['depends' => 'yii\web\JqueryAsset']);
//$this->registerJs("let gardiki_object=" . json_encode($content_gardiki), \yii\web\View::POS_BEGIN);
//$this->registerJs("let ioannis_object=" . json_encode($content_ioannis), \yii\web\View::POS_BEGIN);
//$this->registerJs("let eleousa_object=" . json_encode($content_eleousa), \yii\web\View::POS_BEGIN);
$this->registerCss('css/graphs.css');

?>
<title>GAIA Platform - Graphs </title>
    <ol class="breadcrumb" style="background-color: #e5e9ec;margin-top: 30px;margin-left: 50px;">
        <li class="breadcrumb-item"><a style="color:grey" href="<?= \yii\helpers\Url::to(['site/index']) ?>">Home</a></li>
        <li class="breadcrumb-item"> <a style="color: grey" href="<?= \yii\helpers\Url::to(['site/map']) ?>">Stations Overview</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: gray" id="nodeId">  <?php echo $title  ?>  </li>
    </ol>
<section style="padding-top: 4rem!important; background-color: #e5e9ec;">
    <div class='card-container'>
        <div class='card-left' style="background-color: white;transform-origin: center;">
            <div class='card-image'>
                <img src="/asset/libeliumSensor.png" >
            </div>
            <div class='card-text'>
                <?php echo '<p class="battery__text"><b>' . $name . '</b></p>';?>
                <?php echo '<p class="battery__text">' . $title . '</p>';?>
                <?php echo '<p class="battery__text">' . $time . '</p>';?>
            </div>
        </div>
        <div class='mid-card' style="background-color: white">
            <div class='card-text' style="margin-top:1rem;">
<!--                <p class="battery-text"><b>Temperature&nbsp&nbsp&nbsp Humidity&nbsp&nbsp&nbsp&nbsp Air Pressure</b></p>-->
<!--                <div class="container-horizontal">-->
<!--                    <img src="/asset/graphs/temperature.png" style="height:50px;width:50px;" alt="Temperature Icon"/>-->
<!--                    <p id="tempCard" class="battery__text"></p>&nbsp&nbsp-->
<!--                    <img src="/asset/graphs/humidity.png" style="height:50px;width:50px;" alt="Humidity Icon"/>-->
<!--                    <p id="humidCard" class="battery__text"></p>&nbsp&nbsp-->
<!--                    <img src="/asset/graphs/gauge.png" style="height:50px;width:50px;" alt="Air Pressure Icon"/>-->
<!--                    <p id="pressCard" class="battery__text"></p>-->
<!--                </div>-->
                <?php echo '<h4 class="battery__text h4Hover"><strong> Weather Forecast </strong></h4>';?>
                <?php echo '<h5><strong> Status: </strong>' . $content['weather'][0]['main'] . '</h5>';?>
                <?php echo '<img class="forecast" style="padding-left: 20px;height: 60px;width: 65px" src="http://openweathermap.org/img/w/'. $content['weather'][0]['icon'] .'.png"></img>' ;?><br>
            </div>
        </div>

        <div class='card-right' style="background-color: white">
            <div class='card-image'>
                <div class="battery__pill" style="margin:2rem">
                    <div class="battery__level">
                        <div class="battery__liquid"></div>
                    </div>
                </div>
            </div>
            <div class='card-text'>
                <p class="battery__text"><b>Sensor Node Battery</b></p>
                <h1 class="battery__percentage">
                </h1>
            </div>
        </div>

    </div>
</section>

<div class="item" data-aos="fade-down" data-aos-duration="1000">
<div class="grid-title-container">
<div class="grid-title" style="text-align:left;border-radius:4px;background-color:#292725;
        justify-content: center;">
    &nbsp<?php echo '<i class="fa-solid fa-chart-column fa-lg" style="margin-top:8px;color: #ffffff;"></i><span style="color: white;margin-top:5px; font-size:20px; ">&nbsp&nbspMost Recent Values for ' . $title . '</span>';?>
</div>
</div>
</div>
<section style="padding-top: 0.3rem!important;padding-bottom: 5px!important; background-color: #e5e9ec;height:auto!important;">
    <div class="item" data-aos="fade-down" data-aos-duration="1000">
    <div class="graphs-container" style="border-radius:4px;background-color: white;!important;">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <img src="/asset/values/o3.png" style="height:3rem;width:3rem; margin-right:8px;"/>
                        <div id="Gauge1" class="chart-container">
                        </div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <img src="/asset/values/thermometer.png" style="height:3rem;width:3rem"/>
                        <div id="Gauge2" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 " >
                    <figure class="highcharts-figure">
                        <img src="/asset/values/humidity.png" style="height:3rem;width:3rem"/>
                        <div id="Gauge3" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <img src="/asset/values/pm1.png" style="height:3rem;width:3rem;margin-right:8px;"/>
                        <div id="Gauge5" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <img src="/asset/values/pm25.png" style="height:4rem;width:4rem"/>
                        <div id="Gauge6" class="chart-container"></div>
                    </figure>
            </div>
        </div>

        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <img src="/asset/values/pm10.png" style="height:3rem;width:3rem;margin-right:8px;"/>
                        <div id="Gauge7" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <img src="/asset/values/so2.png" style="height:5rem;width:5rem"/>
                        <div id="Gauge8" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <img src="/asset/values/no.png" style="height:3rem;width:3rem;margin-right:8px;"/>
                        <div id="Gauge9" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <img src="/asset/values/no2.png" style="height:3rem;width:3rem;margin-right:8px;"/>
                        <div id="Gauge10" class="chart-container"></div>
                    </figure>
            </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <figure class="highcharts-figure">
                            <img src="/asset/values/pressure.jpg" style="height:3rem;width:3rem"/>
                            <div id="Gauge11" class="chart-container"></div>
                        </figure>
                </div>
            </div>
    </div>
</section>


<section style="padding-top:5px; background-color: #e5e9ec;padding-bottom: 1rem!important;">
    <div class="graphs-container-unhovered" style="background-color: #e5e9ec;!important;">
        <div class="row p-1" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-right" data-aos-duration="1000">
                <div class="card card-hover"  style=" border-color: transparent">
                        <div id="Line1" ></div>
                </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-left" data-aos-duration="1000">
                <div class="card card-hover"  style=" border-color: transparent">
                    <div id="Line2" ></div>
                </div>
                </div>
            </div>
        </div>
    </div>
        <div class="graphs-container-unhovered" style="background-color: #e5e9ec;!important;">
        <div class="row p-1" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-right" data-aos-duration="1400">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line3" ></div>
                </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-left" data-aos-duration="1400">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line5" ></div>
                </div>
                </div>
            </div>
        </div>
        </div>
    <div class="graphs-container-unhovered" style="background-color: #e5e9ec;!important;">
        <div class="row p-1" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-right" data-aos-duration="1800">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line6" ></div>
                </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-left" data-aos-duration="1800">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line7" ></div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="graphs-container-unhovered" style="background-color: #e5e9ec;!important;">
        <div class="row p-1" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-right" data-aos-duration="2200">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line8" ></div>
                </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-left" data-aos-duration="2200">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line9" ></div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="graphs-container-unhovered" style="background-color: #e5e9ec;!important;">
        <div class="row p-1" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-right" data-aos-duration="2600">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line10" ></div>
                </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="item" data-aos="fade-left" data-aos-duration="2600">
                <div class="card card-hover" style=" border-color: transparent">
                    <div id="Line11" ></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding-top: 4rem!important; background-color: #e5e9ec;">
    <div class='card-container' style="margin-left 10rem; justify-content: center; align-items: center;">
        <div class='card-left' style="width: 100%;grid-column: auto/span 3;background-color:white">
            <div class='card-image' style="">
                <img src="asset/graphs/stacked-area-chart.png" alt="" loading="lazy"
                     style="object-fit: scale-down"/>
            </div>
            <div class='card-text' style="width: 80%">
                <p class="battery__text">Select between two dates,<br> to show specific measurements average values.</p><br>
                <span class="col-md-4" id="reportrange"
                      style="width:100%;background: white; cursor: pointer; padding: 5px 10px; border: 5px solid #292725;height: 40px;">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span><i class="fa fa-caret-down"></i>
        </span>
                <span></br</span>
            </div>
        </div>

    </div>


</section>


<div id="loading" class="lds-facebook"><div></div><div></div><div></div></div>
<section id="hiddenSection1" style="display:none;padding-top: 1rem!important; background-color: #e5e9ec;padding-bottom: 1rem!important;">
    <div class="graphs-container" style="background-color: white!important;">
        <table>
            <thead>
            <tr>
                <th>Description</th>
                <th>O3</th>
                <th>Environment Temperature</th>
                <th>Humidity</th>
                <th>PM 1.0</th>
                <th>PM 2.5</th>
                <th>PM 10</th>
                <th>SO2</th>
                <th>NO</th>
                <th>NO2</th>
                <th>Pressure</th>
<!--                <th>dasdas</th>-->
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Average</td>
                <td id="average-o3"></td>
                <td id="average-temp"></td>
                <td id="average-humid"></td>
                <td id="average-pm1"></td>
                <td id="average-pm25"></td>
                <td id="average-pm10"></td>
                <td id="average-so2"></td>
                <td id="average-no"></td>
                <td id="average-no2"></td>
                <td id="average-pres"></td>
<!--                <td>fsdfsd</td>-->
            </tr>
            <tr>
                <td>Min</td>
                <td id="min-o3"></td>
                <td id="min-temp"></td>
                <td id="min-humid"></td>
                <td id="min-pm1"></td>
                <td id="min-pm25"></td>
                <td id="min-pm10"></td>
                <td id="min-so2"></td>
                <td id="min-no"></td>
                <td id="min-no2"></td>
                <td id="min-pres"></td>
<!--                <td>fdsfs</td>-->
            </tr>
            <tr>
                <td>Max</td>
                <td id="max-o3"></td>
                <td id="max-temp"></td>
                <td id="max-humid"></td>
                <td id="max-pm1"></td>
                <td id="max-pm25"></td>
                <td id="max-pm10"></td>
                <td id="max-so2"></td>
                <td id="max-no"></td>
                <td id="max-no2"></td>
                <td id="max-pres"></td>
<!--                <td>fsdfsd</td>-->
            </tr>

            </tbody>
        </table>

    </div>
</section>
<div>

</div>
<div class="grid-title-container" id="grid-title" style="display:none;">
    <div class="grid-title" style="border-radius:4px;background-color:#292725;
        justify-content: center;">
        &nbsp<?php echo '<i class="fa-solid fa-chart-pie fa-lg" style="margin-top:8px;color: #ffffff;"></i><span style="color: white;margin-top:5px; font-size:20px; ">&nbsp&nbspData Analysis for selected date range: <span id="date1Value"></span> to <span id="date2Value"></span>.</span>';?>
    </div>
</div>

<section id="hiddenSection2" style="display:none;padding-top: 0.3rem!important; background-color: #e5e9ec;padding-bottom: 1rem!important;">
    <div class="graphs-container-unhovered" style="border-radius:4px;background-color: #e5e9ec;">
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="o3Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="tempChart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="humidChart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="pm1Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="pm25Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="pm10Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="so2Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="noChart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="no2Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card card-hover" style="border-color: transparent;margin-bottom:10px; border-radius:4px;">
                    <div id="presChart" ></div>
                </div>
            </div>

    </div>
</section>


<div id="loader">
    <div class="loading-screen">
        <div class="loading-text">
            <div class="container_loader">
                <div class="sound-wave">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="loading">Gathering sensor nodes...</div><br /><br />
            <img src="asset/LogoGaiaPlatform.png" style="margin-left:30%;">
        </div>
    </div>
</div>

<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
//$this->registerJs("let title=" . json_encode($title), \yii\web\View::POS_BEGIN);
$this->registerJs("let nodeId=" . json_encode($id), \yii\web\View::POS_BEGIN);
//$this->registerJsFile('js/echarts.js',['depends' => 'yii\web\JqueryAsset']);
//$this->registerJsFile('js/graphs.js',['depends' => 'yii\web\JqueryAsset']);
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
        <div class='card-left'>
            <div class='card-image'>
                <img src="/asset/libeliumSensor.png" >
            </div>
            <div class='card-text'>
                <?php echo '<p class="battery__text">' . $name . '</p>';?>
                <?php echo '<p class="battery__text">' . $title . '</p>';?>
                <?php echo '<p class="battery__text">' . $time . '</p>';?>
            </div>
        </div>
        <div class='card-right'>
            <div class='card-image'>
                <div class="battery__pill" style="margin:2rem">
                    <div class="battery__level">
                        <div class="battery__liquid"></div>
                    </div>
                </div>
            </div>
            <div class='card-text'>
                <p class="battery__text">Sensor Node Battery</p>
                <h1 class="battery__percentage">
                </h1>
            </div>
        </div>

    </div>
</section>
<!--<section style="padding-top: 4rem!important; background-color: #e5e9ec;display: grid;">-->
<!---->
<!--<div class="battery">-->
<!---->
<!--    <div class="battery__card">-->
<!--        <img src="/asset/libeliumSensor.png">-->
<!--        <div class="battery__data" style="margin:2rem">-->
<!--            --><?php //echo '<p class="battery__text">' . $name . '</p>';?>
<!--            --><?php //echo '<p class="battery__text">' . $title . '</p>';?>
<!--            --><?php //echo '<p class="battery__text">' . $time . '</p>';?>
<!--        </div>-->

<!--        <div class="battery__data" style="margin:2rem">-->
<!--            <p class="battery__text">Sensor Node Battery</p>-->
<!--            <h1 class="battery__percentage">-->
<!--            </h1>-->
<!--        </div>-->
<!--        <div class="battery__pill" style="margin:2rem">-->
<!--            <div class="battery__level">-->
<!--                <div class="battery__liquid"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</section>-->
<div class="grid-title-container">
<div class="grid-title" style="border-radius:25px;background-color:#292725;display: flex;
        justify-content: center;">
    <?php echo '<i class="fa-solid fa-chart-column fa-lg" style="margin-top:8px;color: #ffffff;"></i><h4 style="color: white;margin-top:5px;font-family: Calibri; ">  Most Recent Values for ' . $title . '</h4>';?>
</div>
</div>
<section style="padding-top: 0.3rem!important;padding-bottom: 5px!important; background-color: #e5e9ec;height:auto!important;">
    <div class="graphs-container" style="border-radius:25px;background-color: white;!important;">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <div id="Gauge1" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <div id="Gauge2" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 " >
                    <figure class="highcharts-figure">
                        <div id="Gauge3" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <div id="Gauge5" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" >
                    <figure class="highcharts-figure">
                        <div id="Gauge6" class="chart-container"></div>
                    </figure>
            </div>
        </div>

        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <div id="Gauge7" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <div id="Gauge8" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <div id="Gauge9" class="chart-container"></div>
                    </figure>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <figure class="highcharts-figure">
                        <div id="Gauge10" class="chart-container"></div>
                    </figure>
            </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <figure class="highcharts-figure">
                            <div id="Gauge11" class="chart-container"></div>
                        </figure>
                </div>
            </div>
</section>


<section style="padding-top:5px; background-color: #e5e9ec;padding-bottom: 1rem!important;">
    <div class="graphs-container" style="background-color: #e5e9ec;!important;">
<!--        <div class="grid-title" style="background-color:#07786e;height:40px;display: flex;-->
<!--        justify-content: center;">-->
<!--            --><?php //echo '<h2 style="color: white;margin-top:5px;">Todays Values for ' . $title . '</h2>';?>
<!--        </div>-->
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card"  style=" border-color: transparent">
                        <div id="Line1" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card"  style=" border-color: transparent">
                    <div id="Line2" ></div>
                </div>
            </div>
        </div>
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line3" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line5" ></div>
                </div>
            </div>
        </div>
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line6" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line7" ></div>
                </div>
            </div>
        </div>
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line8" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line9" ></div>
                </div>
            </div>
        </div>
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line10" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="Line11" ></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding-top: 1rem!important;">
    <div class="container" style="display:flex; justify-content:center;">
        <div class="card" style=" border-color: white">
            <img src="asset/graphs/stacked-area-chart.png" height="120" alt="" loading="lazy"
            style="margin-top: -3px;"/>
            <p class="battery__text">Select between two dates,<br> to show specific measurements average values.</p>

        <span class="col-md-4" id="reportrange"
           style="width:100%;background: white; cursor: pointer; padding: 5px 10px; border: 5px solid #30730e;height: 40px;">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span><i class="fa fa-caret-down"></i>
        </span>
        <span></br</span>

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
<section id="hiddenSection2" style="display:none;padding-top: 1rem!important; background-color: #e5e9ec;padding-bottom: 1rem!important;">
    <div class="graphs-container" style="background-color: white;!important;">
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="o3Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="tempChart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="humidChart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="pm1Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="pm25Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="pm10Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="so2Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="noChart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
                    <div id="no2Chart" ></div>
                </div>
            </div>
            <div class="col-lg-12" >
                <div class="card" style=" border-color: transparent">
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
            <img src="asset/LogoGaiaPlatform.png" style="margin-left:30%">
        </div>
    </div>
</div>

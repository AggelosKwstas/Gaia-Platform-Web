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
<!--<div class="container-fluid bg-light">-->
<!--    <div class="container bg-light" style="padding-top: 3rem">-->
<!--        <nav class="navbar navbar-dark bg-white" style="display: block;text-align: center">-->
<!---->
<!--        </nav>-->
<!--    </div>-->
<!--</div>-->

<section style="padding-top: 1rem!important; background-color: #e5e9ec;">
<!--    <div>--><?php //echo '<h1 style="color: black">' . $title . '</h1>';?><!--</div>-->

    <div class="graphs-container" style="background-color: white;!important;">
        <div class="grid-title" style="background-color:#07786e;height:40px;display: flex;
        justify-content: center;">
            <?php echo '<h4 style="color: white;margin-top:5px;">Most Recent Values for ' . $title . '</h4>';?>
        </div>
        <div class="row p-5" style="display: flex; justify-content: center;">
            <div class="col-sm-3" style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge1" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3" style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge2" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3 " style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge3" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3 " style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge5" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3" style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge6" class="chart-container"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="row p-5" style="display: flex; justify-content: center;">
            <div class="col-sm-3" style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge7" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3" style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge8" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3 " style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge9" class="chart-container"></div>
                    </figure>
                </div>
            </div>
            <div class="col-sm-3 " style="width:20%!important;">
                <div class="card" style=" border-color: transparent">
                    <figure class="highcharts-figure">
                        <div id="Gauge10" class="chart-container"></div>
                    </figure>
                </div>
            </div>
                <div class="col-sm-3" style="width:20%!important;">
                    <div class="card" style=" border-color: transparent">
                        <figure class="highcharts-figure">
                            <div id="Gauge11" class="chart-container"></div>
                        </figure>
                    </div>
                </div>
            </div>
</section>


<section class="battery">
    <div class="battery__card">
        <div class="battery__data">
            <p class="battery__text">Battery Level</p>
            <h1 class="battery__percentage">
            </h1>

            <p class="battery__status">
                Low battery <i class="ri-plug-line"></i>
            </p>
        </div>

        <div class="battery__pill">
            <div class="battery__level">
                <div class="battery__liquid"></div>
            </div>
        </div>
    </div>
</section>
<section style="padding-top: 1rem!important; background-color: #e5e9ec;">
    <div class="graphs-container" style="background-color: white;!important;">
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                        <div id="chart-container1" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                    <div id="chart-container2" ></div>
                </div>
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
            <div class="loading">Gathering sensor nodes...</div>
        </div>
    </div>
</div>

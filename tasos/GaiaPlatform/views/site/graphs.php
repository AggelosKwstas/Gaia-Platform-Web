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

<section style="padding-top: 4rem!important; background-color: #e5e9ec;display: grid;">

<div class="battery">
<!--    <div class="grid-title" style="background-color:#07786e;height:50px;width: 100%;-->
<!--        display:flex; justify-content: center;">-->
<!--        --><?php //echo '<h2 style="color: white;margin-top:7px;">' . $title . '</h2>';?>
<!--    </div>-->
    <div class="battery__card">
        <div class="battery__data" style="margin:2rem">
            <p class="battery__text">Air Station 4</p>
            <p class="battery__text">Eleousa Air Monitor</p>
            <p class="battery__text">16:03:54 AM</p>
        </div>
        <div style="  border-left: 6px solid green;
  height: 104%;"></div>
        <div class="battery__data" style="margin:2rem">
            <p class="battery__text">Sensor Node Battery</p>
            <h1 class="battery__percentage">
            </h1>
        </div>
        <div class="battery__pill" style="margin:2rem">
            <div class="battery__level">
                <div class="battery__liquid"></div>
            </div>
        </div>
    </div>
</div>
</section>
<section style="padding-top: 1rem!important; background-color: #e5e9ec;height:auto!important;">

    <div class="graphs-container" style="background-color: white;!important;">
        <div class="grid-title" style="background-color:#07786e;height:40px;display: flex;
        justify-content: center;">
            <?php echo '<h4 style="color: white;margin-top:5px;">Most Recent Values for ' . $title . '</h4>';?>
        </div>
        <div class="row p-5" style="display: flex; justify-content: center;">
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

        <div class="row p-5" style="display: flex; justify-content: center;">
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


<section style="padding-top: 1rem!important; background-color: #e5e9ec;padding-bottom: 1rem!important;">
    <div class="graphs-container" style="background-color: white;!important;">
        <div class="grid-title" style="background-color:#07786e;height:40px;display: flex;
        justify-content: center;">
            <?php echo '<h2 style="color: white;margin-top:5px;">Todays Values for ' . $title . '</h2>';?>
        </div>
        <div class="row p-2" style="display: flex; justify-content: center;">
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
                        <div id="Line1" ></div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="card" style=" border-color: transparent">
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
        <span class="col-md-4" id="reportrange"
           style="width:20rem;margin-top:65px;margin-left: 115px;background: white; cursor: pointer; padding: 5px 10px; border: 5px solid #165C40;height: 40px;">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span><i class="fa fa-caret-down"></i>
        </span>
        <span></br</span>

    </div>
</section>
<div id="loading" class="lds-facebook"><div></div><div></div><div></div></div>

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

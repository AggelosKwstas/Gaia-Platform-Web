<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
//$this->registerJs("let title=" . json_encode($title), \yii\web\View::POS_BEGIN);
$this->registerJs("let nodeId=" . json_encode($id), \yii\web\View::POS_BEGIN);
//$this->registerJsFile('js/echarts.js',['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('js/graphs.js',['depends' => 'yii\web\JqueryAsset']);
$this->registerCss('css/graphs.css');
?>

<title>GAIA Platform - Graphs </title>
<!--<div class="container-fluid bg-light">-->
<!--    <div class="container bg-light" style="padding-top: 3rem">-->
<!--        <nav class="navbar navbar-dark bg-white" style="display: block;text-align: center">-->
<!--            --><?php //echo '<h1 style="color: black">' . $title . '</h1>';?>
<!--        </nav>-->
<!--    </div>-->
<!--</div>-->

<section style="padding-top: 1rem!important; background-color: #e5e9ec;">
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">

                    <figure class="highcharts-figure">
                        <div id="container-speed" class="chart-container"></div>
                    </figure>

<!--                    <div class="chart" id="barChart1" style=" min-height: 400px;width:100%"></div>-->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
<!--                    <div class="chart" id="barChart2" style="min-height: 400px;width:100%"></div>-->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    fgfgfgffg
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chart" id="gaugeChart1" style="min-height: 400px;width:100%"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chart" id="gaugeChart" style=" min-height: 400px"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chart" id="gaugeChart" style="min-height: 400px"></div>
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

<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<title>GAIA Platform | Graphs </title>

<div class="container-fluid bg-light">
    <div class="container bg-light" style="padding-top: 3rem">
        <nav class="navbar navbar-dark bg-white" style="display: block;text-align: center">
            <p style="color: black">hghghgh</p>
        </nav>
    </div>
</div>

<section class="bg-light" style="padding-top: 1rem!important;">
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chart" id="barChart1" style=" min-height: 400px;width:100%"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chart" id="barChart2" style="min-height: 400px;width:100%"></div>
                </div>
            </div>
            <!--            <div class="col-xs-12 col-sm-12 col-lg">-->
            <!--                <div class="card">-->
            <!--                    fgfgfgffg-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <div class="row p-3">
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chart" id="gaugeChart1" style="min-height: 400px;width:100%"></div>
                </div>
            </div>
            <!--            <div class="col-xs-12 col-sm-12 col-lg">-->
            <!--                <div class="card">-->
            <!--                    <div class="chart" id="gaugeChart" style=" min-height: 400px"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="col-xs-12 col-sm-12 col-lg">-->
            <!--                <div class="card">-->
            <!--                    <div class="chart" id="gaugeChart" style="min-height: 400px"></div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</section>

<?php
$script = <<< JS


let barChart1 = null;
let barChart2 = null;
let barChart3 = null;

function initCharts() {
    if (!barChart1) {
        barChart1 = echarts.init(document.getElementById('barChart1'));
        barChart1.setOption(makeBlueChart());
    }

    if (!barChart2) {
        barChart2 = echarts.init(document.getElementById('barChart2'));
        barChart2.setOption(makeBlueChart());
    }

    if (!barChart3) {
        barChart3 = echarts.init(document.getElementById('gaugeChart1'));
        barChart3.setOption(makeBlueChart());
    }
}

initCharts();

   $(window).on('resize', function() {
    if (barChart1 != null) {
        barChart1.resize();
    }
    if (barChart2 != null) {
        barChart2.resize();
    }
    if (barChart3 != null) {
        barChart3.resize();
    }
});

   // gives warning
//    const container = document.querySelectorAll('.chart');
// for (let arrayElement of container) {
//   let chart = echarts.init(arrayElement);
//   new ResizeObserver(() => chart.resize()).observe(arrayElement);
// }


JS;
$this->registerJs($script);
?>

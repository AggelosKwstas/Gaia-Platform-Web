<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>

<!--    <div class="container-fluid bg-light" style="padding-top: 3rem">-->
<!--        <nav class="navbar navbar-dark bg-dark">-->
<!--            <h1 style="color: white">hghghgh</h1>-->
<!--        </nav>-->
<!--    </div>-->

<section class="bg-light" style="padding-top: 1rem!important;">
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-lg">
                <div class="card">
                    <div class="chartt" id="barChart1" style="width: 100%; min-height: 400px"></div>
                </div>
            </div>
            <div class="col-lg">
                    <div class="card">
                        <div class="chartt" id="barChart2" style="width: 100%; min-height: 400px"></div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    fgfgfgffg
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-lg">
                <div class="card">
                    <div class="chartt" id="gaugeChart" style="width: 100%; min-height: 400px"></div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="chartt" id="gaugeChart" style="width: 100%; min-height: 400px"></div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="chartt" id="gaugeChart" style="width: 100%; min-height: 400px"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="bg-light">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-4 ">-->
<!--                <div class="card w-auto h-100">-->
<!--                        <div id="barChart1" style="height: 350px;width: auto"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<?php
$script = <<< JS


let barChart1 = echarts.init(document.getElementById('barChart1'));
barChart1.setOption(makeBlueChart());

let barChart2 = echarts.init(document.getElementById('barChart2'));
barChart2.setOption(makeBlueChart());

var chartDom = document.getElementById('gaugeChart');
var myChart = echarts.init(chartDom);
myChart.setOption(makeBlueChart());

const container = document.querySelectorAll('.chartt');
for (let arrayElement of container) {
  let chart = echarts.init(arrayElement);
  new ResizeObserver(() => chart.resize()).observe(arrayElement);
}

JS;
$this->registerJs($script);
?>

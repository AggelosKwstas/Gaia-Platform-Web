<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
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
                    <div class="chartt" id="barChart1" style=" min-height: 400px"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chartt" id="barChart2" style="min-height: 400px"></div>
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
                    <div class="chartt" id="gaugeChart" style="min-height: 400px"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chartt" id="gaugeChart" style=" min-height: 400px"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg">
                <div class="card">
                    <div class="chartt" id="gaugeChart" style="min-height: 400px"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<h1>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
    type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
    Lorem Ipsum.
</h1>
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

<?php

/** @var yii\web\View $this */


use app\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>


<div style="padding-top: 10vh;" class="bg-light">
    <div class="container-1 overflow-hidden p-5 bg-light">
        <div class="page-title">
                <img src="asset/graph.png" alt="" style="width: 20px;padding-top: 20px">
            <h3 style="color:black;display: inline-block;position: relative">Άγιος Ιωάννης Air Monitor - Enviromental PRO</h3>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card" >
                    <div class="p-1" id="barChart1" style="height: 350px"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" >
                <div class="p-1" id="barChart2" style="height: 350px"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" >
                <div class="p-1" id="barChart2" style="height: 350px"></div>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-4">
                <div class="card">
                <div class="p-1" id="barChart2" style="height: 350px"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                <div class="p-1" id="barChart2" style="height: 350px"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                <div class="p-1" id="barChart2" style="height: 350px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<< JS
let barChart1 = echarts.init(document.getElementById('barChart1'));
barChart1.setOption(makeBlueChart());

let barChart2 = echarts.init(document.getElementById('barChart2'));
barChart2.setOption(makeBlueChart());

let barChart3 = echarts.init(document.getElementById('barChart3'));
barChart3.setOption(makeBlueChart());
JS;
$this->registerJs($script);
?>

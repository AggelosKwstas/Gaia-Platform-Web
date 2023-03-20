<?php

/** @var yii\web\View $this */


use app\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>
<div class="card" style="left: 10vh">
    <div class="container">
        <div id="testGraph1" style="height:210px">
        </div>
    </div>
</div>

<div class="card" style="left: 70vh">
    <div class="container">
        <div id="testGraph2" style="height:210px">
        </div>
    </div>
</div>

<?php
$script = <<< JS
let barChart1 = echarts.init(document.getElementById('testGraph1'));
barChart1.setOption(makeBlueChart());

let barChart2 = echarts.init(document.getElementById('testGraph2'));
barChart2.setOption(makeBlueChart());
JS;
$this->registerJs($script);
?>

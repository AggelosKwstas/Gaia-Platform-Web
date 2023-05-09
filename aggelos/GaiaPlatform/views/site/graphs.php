<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->registerJsFile('js/graphs.js');
?>
<title>GAIA Platform - Graphs </title>

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
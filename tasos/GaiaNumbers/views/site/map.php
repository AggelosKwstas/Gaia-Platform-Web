<?php

/** @var yii\web\View $this */


use yii\helpers\Url;


$this->registerJs("let uoi_object=" . json_encode($content_uoi), \yii\web\View::POS_BEGIN);
$this->registerJs("let gardiki_object=" . json_encode($content_gardiki), \yii\web\View::POS_BEGIN);
$this->registerJs("let ioannis_object=" . json_encode($content_ioannis), \yii\web\View::POS_BEGIN);
$this->registerJs("let eleousa_object=" . json_encode($content_eleousa), \yii\web\View::POS_BEGIN);
$this->registerJs("let locationGraphs='" . Url::to(['site/graphs']) . "'", \yii\web\View::POS_BEGIN);
$this->registerJs("let locationMap='" . Url::to(['site/map']) . "'", \yii\web\View::POS_BEGIN);
$this->registerJs("let baseUrl='" . Url::base('http') . "'", \yii\web\View::POS_BEGIN);
?>
<title>GAIA Platform - Stations </title>

<div>
    <section id="map_cta" class="cta">
        <div class="map-wrapper">
            <div id="map_full"></div>
            <div class="container_map" style="z-index: 50000;position: absolute;top:15px;right:30px">
                <div class="dropdown" style="width: 150px">
                    <div class="select">
                        <span id="cycle_span"><i class="fa-solid fa-layer-group pull-left" style="font-size: 15px;"></i> <b>Cycle stations</b></span>
                        <i id="cycle" class="fa fa-chevron-left"></i>
                    </div>
                    <input type="hidden" name="gender" id="dropdown_input">
                    <ul class="dropdown-menu" id="cycle_dropdown" style="font-weight: bold!important;">
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&nbsp&nbsp&times;</span>
                <div class="modal-body" style="font-size: 15px">
                    <h3><b>Case Study - Air Quality Index at Ioannina,Greece</b></h3>
                    <p>
                        <em>The map markers indicate the positions of air quality monitoring stations,
                            and the color assigned to each marker corresponds to the air quality index recorded at that specific station.
                            <br>The index is determined by considering concentration values of up to five primary pollutants, which include:
                        </em>

                    <ul>
                        <li><b>Particulate matter  (PM<sub>10</sub>)</b></li>
                        <li><b>Fine particulate matter (PM<sub>2.5</sub>)</b></li>
                        <li><b>Ozone (O<sub>3</sub>)</b></li>
                        <li><b>Nitrogen dioxide (NO<sub>2</sub>)</b></li>
                        <li><b>Sulphur dioxide (SO2)</b></li>
                    </ul>
                    <em> For all the pollutants (NO2, O3, SO2, PM10 and PM2.5), the air quality index levels are typically determined based on <b>latest</b> concentration measurements.
                        By analyzing the latest concentration data of these key pollutants, the air quality index provides a comprehensive assessment of the current air quality at each monitoring station.
                        This approach allows for a more immediate understanding of the overall air pollution levels in a given area, as it takes into account the most recent measurements available for PM10 and PM2.5 pollutants.</em>
                    <br>
                    <br>
                    <h5 class="removePhrase"><strong>Bands of concentrations and index levels :</strong></h5>
                    <table class="styled-table" style="align-items: center">
                        <thead>
                        <tr>
                            <th style="text-align: left"><i style="font-size: 30px" class="fa fa-info-circle"></i>
                            </th>
                            <th style="text-align: left">Good</th>
                            <th style="text-align: left">Fair</th>
                            <th style="text-align: left">Bad</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: left"><b>O<sub>3</sub> (ppm)</b></td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #01FB0AFF;"></span>
                                <span>&#8804; 0.04</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #DECF37FF;"></span>
                                <span>0.04-0.2</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #ff0032;"></span>
                                <span>&#8805; 0.2</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><b>PM 2.5 (μg/m3)</b></td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #01FB0AFF;"></span>
                                <span>&#8804; 25</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #DECF37FF;"></span>
                                <span>25-100</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #ff0032;"></span>
                                <span>&#8805; 100</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><b>PM 10 (μg/m3)</b></td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #01FB0AFF;"></span>
                                <span>&#8804; 50</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #DECF37FF;"></span>
                                <span>50-200</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #ff0032;"></span>
                                <span>&#8805; 100</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><b>SO<sub>2</sub> (ppm)</b></td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #01FB0AFF;"></span>
                                <span>&#8804; 0.1</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #DECF37FF;"></span>
                                <span>0.1-0.3</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #ff0032;"></span>
                                <span>&#8805; 0.3</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><b>NO<sub>2</sub> (ppm)</b></td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #01FB0AFF;"></span>
                                <span>&#8804; 0.1</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #DECF37FF;"></span>
                                <span>0.1-0.2</span>
                            </td>
                            <td style="text-align: left">
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: #ff0032;"></span>
                                <span>&#8805; 0.2</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
                <div class="loading">Initializing map elements...</div><br /><br />
                <img src="asset/LogoGaiaPlatform.png" class="mediaImage" >
            </div>
        </div>
    </div>
</div>
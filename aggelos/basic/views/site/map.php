<?php

/** @var yii\web\View $this */



$this->title = 'GAIA V2';
?>
<section class="cta">
    <div id="map_full">

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-body" style="font-size: 15px">
                    <h5><strong>Details on the methodology the AQ Index is calculated :</strong></h5>
                    <p>
                        <em>The markers on the map represent the locations of air quality monitoring stations , their colour corresponds to the air quality index  at that station.
                        </em>
                        <br>
                        The Index is based on concentration values for up to five key pollutants, including:
                    <ul>
                        <li>particulate matter (PM<sub>10</sub>)</li>
                        <li>fine particulate matter (PM<sub>2.5</sub>)</li>
                        <li>ozone (O<sub>3</sub>)</li>
                        <li>nitrogen dioxide (NO<sub>2</sub>)</li>
                        <li>sulphur dioxide (SO2)</li>
                    </ul>
                    <em> *Index levels for pollutants NO<sub>2</sub> , O<sub>3</sub> , SO2 are based on hourly concentrations ,  <br>
                        while PM<sub>10</sub> and PM<sub>2.5</sub> are based on daily running means.</em>
                    <br>
                    </p>
                    <h5><strong>Bands of concentrations and index levels :</strong></h5>
                    <table class="styled-table" style="align-items: center">
                        <thead>
                        <tr>
                            <th style="text-align: center"><i style="font-size: 30px" class="fa fa-info-circle"></i></th>
                            <th style="text-align: center">Good</th>
                            <th style="text-align: center">Fair</th>
                            <th style="text-align: center">Bad</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: center">O<sub>3</sub> (ppm)</td>
                            <td style="color: green;text-align: center" >0-100</td>
                            <td style="color: orange;text-align: center">100-240</td>
                            <td style="color: red;text-align: center">240-800</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">PM 2.5 (μg/m3)</td>
                            <td style="color: green;text-align: center" >0-20</td>
                            <td style="color: orange;text-align: center">20-50</td>
                            <td style="color: red;text-align: center">50-800</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">PM 10 (μg/m3)</td>
                            <td style="color: green;text-align: center" >0-40</td>
                            <td style="color: orange;text-align: center">40-100</td>
                            <td style="color: red;text-align: center">100-1200</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">SO<sub>2</sub> (ppm)</td>
                            <td style="color: green;text-align: center" >0-100</td>
                            <td style="color: orange;text-align: center">100-200</td>
                            <td style="color: red;text-align: center">200-1200</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">NO<sub>2</sub> (ppm)</td>
                            <td style="color: green;text-align: center" >0-90</td>
                            <td style="color: orange;text-align: center">90-230</td>
                            <td style="color: red;text-align: center">230-1000</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



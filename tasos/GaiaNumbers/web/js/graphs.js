var decodeEntities = (function () {
    var element = document.createElement('div');
    function decodeHTMLEntities(str) {
        if (str && typeof str === 'string') {
            str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
            str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
            element.innerHTML = str;
            str = element.textContent;
            element.textContent = '';
        }
        return str;
    }
    return decodeHTMLEntities;
})();

function findAverageMinMax(numbers) {
    if (numbers.length === 0) {
        return {
            average: 0,
            min: 0,
            max: 0
        }; // Return default values for an empty array or handle it according to your requirements
    }

    var sum = numbers.reduce(function(acc, num) {
        return acc + num;
    }, 0);

    var ave = sum / numbers.length;
    var average = ave.toFixed(3);
    var min = Math.min.apply(null, numbers);
    var max = Math.max.apply(null, numbers);

    return {
        average: average,
        min: min,
        max: max
    };
}


let nodeTypeURL = ['https://restapi.gaia-platform.eu/rest-api/items/readNodeType.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id='+ nodeId +''];
let nodeTypes = [];
const typeDescriptions =[];
const min_value = [];
const max_value =[];
const typeUnits =[];
const typeResults = [];
const typeRequests = nodeTypeURL.map(url => fetch(url).then(response => response.json()));
Promise.all(typeRequests)
    .then(responseData => {
        responseData.forEach(data => {
            nodeTypes = data['tbl_sensor_type'];
            typeResults.push(nodeTypes);
        });
    })
    .then(() => {

        console.log('All requests completed 1');

        for (let j = 0; j < nodeTypes.length; j++){
            typeDescriptions.push(typeResults[0][j]['description']);
            min_value.push(typeResults[0][j]['min_value']);
            max_value.push(typeResults[0][j]['max_value']);
            typeUnits.push((typeResults[0][j]['unit']));
        }
    })
    .catch(error => {
        console.error('Error occurred:', error);
    });


const day = new Date().getDate();
const month = new Date().getMonth() + 1; // Months are zero-based
const year = new Date().getFullYear();
const dateFormatted = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;

let measurementInit='_measurements';
let measurementFilter = nodeId + measurementInit;

let typeIds = [3,4,5,6,8,9,10,11,12,13,14];
let urls = [];
for(let id in typeIds){
    url= 'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id='+ nodeId +'&date=' + dateFormatted + '&sensor_type_id='+typeIds[id]+'';
    urls.push(url);
}

let measurements = [];
const results = [];
const requests = urls.map(url => fetch(url).then(response => response.json()));
Promise.all(requests)
    .then(responseData => {
        responseData.forEach(data => {
            measurements = data[measurementFilter];
            results.push(measurements);
        });
    })
    .then(() => {
        $('#loader').fadeOut('fast');
        AOS.init({
            once: true,
        });
        console.log('All requests completed 2');
        const timestamps = [];
        const timestampsSliced = [];
        for (let j = 0; j < measurements.length; j++) {
            timestamps.push(results[0][j]['timestamp']);
            timestampsSliced.push(timestamps[j].slice(11,19));
        }
        let objects = [];
        let lastMeasurement = [];
        let cycleCounter = measurements.length;

        for (let i = 0; i < results.length; i++) {
            objects = [];
            cycleCounter = measurements.length;
            for (let j = 0; j < measurements.length; j++) {
                objects.push(results[i][j]['value'])
                cycleCounter--;
                if(cycleCounter===0){
                    lastMeasurement.push(results[i][j]['value'])
                }
            }
            if(i!==3){
                let add = i +1;
                let lineName = 'Line';
                let lineSum = lineName+add;
                lineCharts(lineSum, typeDescriptions[i], objects, timestampsSliced, typeUnits[i]);
            }
        }

        for(let k =0; k<results.length; k++)
        {
            let adder = k +1;
            let gaugeName = 'Gauge';
            let gaugeSum = gaugeName+adder;
            if (k!==3){
                gaugeChart(gaugeSum, typeDescriptions[k], lastMeasurement[k], min_value[k], max_value[k], typeUnits[k]);
                if(k===1){
                    var cardTemp = document.getElementById("tempCard");
                    cardTemp.textContent = Math.floor(lastMeasurement[k])+decodeEntities(typeUnits[k]);
                }
                if(k===2){
                    var cardHumid = document.getElementById("humidCard");
                    cardHumid.textContent = Math.floor(lastMeasurement[k])+decodeEntities(typeUnits[k]);
                }
                if(k===10){
                    var cardPress = document.getElementById("pressCard");
                    cardPress.textContent = Math.floor(lastMeasurement[k])+decodeEntities(typeUnits[k]);
                }
            }
            else if(k===3){
                initBattery(lastMeasurement[k]);
            }

        }
    })
    .catch(error => {
        console.error('Error occurred:', error);
    });
function gaugeChart(targetElementId, measurementName, measurementValue, min, max, unit){
var card = document.getElementById(targetElementId);

    // Create and set the measurement name element
    var measurementNameElement = document.createElement('h3');
    // measurementNameElement.classList.add('h4Hover');
    measurementNameElement.style.color = '#5caa32';
    measurementNameElement.innerText = decodeEntities(measurementName);
    card.appendChild(measurementNameElement);

    // Create and set the measurement value element
    var measurementValueElement = document.createElement('h5');
    measurementValueElement.innerText = measurementValue + ' ' + decodeEntities(unit);
    card.appendChild(measurementValueElement);

    // Create and set the min-max range element
    var rangeElement = document.createElement('h8');
    rangeElement.innerText = 'Range: '+ min + ' - ' +max + '(' +decodeEntities(unit)+')';
    card.appendChild(rangeElement);

}
// card.textContent = measurementName
// card.textContent = Math.floor(measurementValue)+decodeEntities(unit);

// function gaugeChart(targetElementId, measurementName, measurementValue, min, max, unit){
//     var gaugeOptions = {
//         chart: {
//             type: 'solidgauge'
//         },
//
//         title: null,
//
//         pane: {
//             center: ['50%', '85%'],
//             size: '90%',
//             startAngle: -90,
//             endAngle: 90,
//             background: {
//                 backgroundColor:
//                     Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
//                 innerRadius: '60%',
//                 outerRadius: '100%',
//                 shape: 'arc'
//             }
//         },
//
//         exporting: {
//             enabled: false
//         },
//
//         tooltip: {
//             enabled: false
//         },
//         // the value axis
//         yAxis: {
//             stops: [
//                 [0.3, '#55BF3B'], // green
//                 [0.6, '#DDDF0D'], // yellow
//                 [0.9, '#DF5353'] // red
//             ],
//             lineWidth: 0,
//             tickWidth: 0,
//             minorTickInterval: null,
//             tickAmount: 2,
//             title: {
//                 y: -70
//             },
//             labels: {
//                 y: 20
//             }
//         },
//
//         plotOptions: {
//             solidgauge: {
//                 dataLabels: {
//                     y: 5,
//                     borderWidth: 0,
//                     useHTML: true
//                 }
//             }
//         }
//     };
//
//     // The speed gauge
//     var chartSpeed = Highcharts.chart(targetElementId, Highcharts.merge(gaugeOptions, {
//         yAxis: {
//             min: min,
//             max: max,
//             tickInterval: 0,
//             title: {
//                 text: measurementName
//             },
//         },
//
//         credits: {
//             enabled: false
//         },
//
//         series: [{
//             name: measurementName,
//             data: [measurementValue],
//             dataLabels: {
//                 format:
//                     '<div style="text-align:center">' +
//                     '<span style="font-size:19px">{y}</span><br/>' +
//                     '<span style="font-size:12px;opacity:0.4">'+ decodeEntities(unit) +'</span>' +
//                     '</div>'
//             },
//             tooltip: {
//                 valueSuffix: decodeEntities(unit)
//             }
//         }]
//
//     }));
//
// }

function initBattery(level) {
    const batteryLiquid = document.querySelector('.battery__liquid'),
        batteryStatus = document.querySelector('.battery__status'),
        batteryPercentage = document.querySelector('.battery__percentage')

    navigator.getBattery().then(() => {
        updateBattery = () => {
            batteryPercentage.innerHTML = level + '%'
            batteryPercentage.valueOf(level);
            batteryLiquid.style.height = `${parseInt(level)}%`

            if (level <= 20) {
                batteryLiquid.classList.add('gradient-color-red')
                batteryLiquid.classList.remove('gradient-color-orange', 'gradient-color-yellow', 'gradient-color-green')
            }
            else if (level <= 40) {
                batteryLiquid.classList.add('gradient-color-orange')
                batteryLiquid.classList.remove('gradient-color-red', 'gradient-color-yellow', 'gradient-color-green')
            }
            else if (level <= 80) {
                batteryLiquid.classList.add('gradient-color-yellow')
                batteryLiquid.classList.remove('gradient-color-red', 'gradient-color-orange', 'gradient-color-green')
            }
            else {
                batteryLiquid.classList.add('gradient-color-green')
                batteryLiquid.classList.remove('gradient-color-red', 'gradient-color-orange', 'gradient-color-yellow')
            }
        }
        updateBattery()
    })
}

function lineCharts(targetElementId, measurementName, measurementValues, measurementTimestamps, measurementUnits) {
    Highcharts.chart(targetElementId, {
        chart: {
            type: 'line'
        },
        title: {
            text: measurementName
        },
        xAxis: {
            categories: measurementTimestamps,
            tickInterval: 6
        },
        yAxis: {
            categories: [],
            gridLineWidth: 0,
            gridLineColor: 'transparent',
            tickInterval: 10
        },
        series: [
            {
                color: '#30730e',
                data: measurementValues,
                name: decodeEntities(measurementUnits),
                marker: {
                    radius: 5,
                },
                animation: {
                    duration: 700,
                    easing: 'easeOutBounce',
                    defer: 500,
                },

            },
        ],
    });
}

$(document).ready(function(){

    $(function () {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('YYYY MM, D') + ' - ' + end.format('YYYY MM, D'));
        }

        $('#reportrange').daterangepicker({
            drops: 'up',
            opens: 'center',
            startDate: start,
            endDate: end,
            maxDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);


    });
    const o3Timestamp = [];
    const o3Value = [];
    const tempTimestamp = [];
    const tempValue = [];
    const humidTimestamp = [];
    const humidValue = [];
    const pm1Timestamp = [];
    const pm1Value = [];
    const pm25Timestamp = [];
    const pm25Value = [];
    const pm10Timestamp = [];
    const pm10Value = [];
    const so2Timestamp = [];
    const so2Value = [];
    const noTimestamp = [];
    const noValue = [];
    const no2Timestamp = [];
    const no2Value = [];
    const presTimestamp = [];
    const presValue = [];

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        document.getElementById('loading').style.display = 'inline-block';
        let measurementInit1 = '_measurements';
        let measurementFilter1 = nodeId + measurementInit1;
        document.getElementById("date1Value").textContent = picker.startDate.format('YYYY-MM-DD');
        document.getElementById("date2Value").textContent = picker.endDate.format('YYYY-MM-DD');
        let readDateURL = ['https://restapi.gaia-platform.eu/rest-api/items/readDates.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=' + nodeId + '&date1=' + picker.startDate.format('YYYY-MM-DD') + '&date2=' + picker.endDate.format('YYYY-MM-DD') + '&sensor_type_id='];
        let readMeasurementType = [];
        const readTimestamp = [];
        const readTypeId = [];
        const readValues = [];
        const readResults = [];
        const readRequests = readDateURL.map(url => fetch(url).then(response => response.json()));
        Promise.all(readRequests)
            .then(responseData => {
                $('#loading').fadeOut('fast');
                responseData.forEach(data => {
                    readMeasurementType = data[measurementFilter1];
                    readResults.push(readMeasurementType);
                });
            })
            .then(() => {
                console.log('All requests completed 3');

                document.getElementById('hiddenSection1').style.display = 'inline-block';
                document.getElementById('hiddenSection2').style.display = 'inline-block';
                document.getElementById('grid-title').style.display = 'inline-block';
                for (let j = 0; j < readMeasurementType.length; j++) {
                    readTimestamp.push(readResults[0][j]['timestamp']);
                    readTypeId.push(readResults[0][j]['sensor_type_id']);
                    readValues.push(readResults[0][j]['value']);
                }
                let ccounter =0;
                for(let i = 0; i < readTypeId.length; i++){
                    if(readTypeId[i]===3){
                        o3Value.push(readValues[i]);
                        o3Timestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===4){
                        tempValue.push(readValues[i]);
                        tempTimestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===5){
                        humidValue.push(readValues[i]);
                        humidTimestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===8){
                        pm1Value.push(readValues[i]);
                        pm1Timestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===9){
                        pm25Value.push(readValues[i]);
                        pm25Timestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===10){
                        pm10Value.push(readValues[i]);
                        pm10Timestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===11){
                        so2Value.push(readValues[i]);
                        so2Timestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===12){
                        noValue.push(readValues[i]);
                        noTimestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===13){
                        no2Value.push(readValues[i]);
                        no2Timestamp.push(readTimestamp[i]);
                    }
                    if(readTypeId[i]===14){
                        presValue.push(readValues[i]);
                        presTimestamp.push(readTimestamp[i]);
                    }

                }
                lineCharts('o3Chart', '03', o3Value, o3Timestamp, 'ppm');
                var o3Stats = findAverageMinMax(o3Value);
                document.getElementById('average-o3').textContent = o3Stats.average;
                document.getElementById('min-o3').textContent = o3Stats.min;
                document.getElementById('max-o3').textContent = o3Stats.max;

                lineCharts('tempChart', 'Environment Temperature', tempValue, tempTimestamp, decodeEntities('&deg;C'));
                var tempStats = findAverageMinMax(tempValue);
                document.getElementById('average-temp').textContent = tempStats.average;
                document.getElementById('min-temp').textContent = tempStats.min;
                document.getElementById('max-temp').textContent = tempStats.max;

                lineCharts('humidChart', 'Humidity', humidValue, humidTimestamp, '%');
                var humidStats = findAverageMinMax(humidValue);
                document.getElementById('average-humid').textContent = humidStats.average;
                document.getElementById('min-humid').textContent = humidStats.min;
                document.getElementById('max-humid').textContent = humidStats.max;

                lineCharts('pm1Chart', 'PM 1.0', pm1Value, pm1Timestamp, decodeEntities('μg/m3'));
                var pm1Stats = findAverageMinMax(pm1Value);
                document.getElementById('average-pm1').textContent = pm1Stats.average;
                document.getElementById('min-pm1').textContent = pm1Stats.min;
                document.getElementById('max-pm1').textContent = pm1Stats.max;

                lineCharts('pm25Chart', 'PM 2.5', pm25Value, pm25Timestamp, decodeEntities('μg/m3'));
                var pm25Stats = findAverageMinMax(pm25Value);
                document.getElementById('average-pm25').textContent = pm25Stats.average;
                document.getElementById('min-pm25').textContent = pm25Stats.min;
                document.getElementById('max-pm25').textContent = pm25Stats.max;

                lineCharts('pm10Chart', 'PM 10', pm10Value, pm10Timestamp, decodeEntities('μg/m3'));
                var pm10Stats = findAverageMinMax(pm10Value);
                document.getElementById('average-pm10').textContent = pm10Stats.average;
                document.getElementById('min-pm10').textContent = pm10Stats.min;
                document.getElementById('max-pm10').textContent = pm10Stats.max;

                lineCharts('so2Chart', 'SO2', so2Value, so2Timestamp, 'ppm');
                var so2Stats = findAverageMinMax(so2Value);
                document.getElementById('average-so2').textContent = so2Stats.average;
                document.getElementById('min-so2').textContent = so2Stats.min;
                document.getElementById('max-so2').textContent = so2Stats.max;

                lineCharts('noChart', 'NO', noValue, noTimestamp, 'ppm');
                var noStats = findAverageMinMax(noValue);
                document.getElementById('average-no').textContent = noStats.average;
                document.getElementById('min-no').textContent = noStats.min;
                document.getElementById('max-no').textContent = noStats.max;

                lineCharts('no2Chart', 'NO2', no2Value, no2Timestamp, 'ppm');
                var no2Stats = findAverageMinMax(no2Value);
                document.getElementById('average-no2').textContent = no2Stats.average;
                document.getElementById('min-no2').textContent = no2Stats.min;
                document.getElementById('max-no2').textContent = no2Stats.max;

                lineCharts('presChart', 'Pressure', presValue, presTimestamp, 'Pa');
                var pressureStats = findAverageMinMax(presValue);
                document.getElementById('average-pres').textContent = pressureStats.average;
                document.getElementById('min-pres').textContent = pressureStats.min;
                document.getElementById('max-pres').textContent = pressureStats.max;
            })
            .catch(error => {
                console.error('Error occurred:', error);
            });

    });
})

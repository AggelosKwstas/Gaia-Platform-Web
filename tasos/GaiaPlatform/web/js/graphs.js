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
    var gaugeOptions = {
        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '85%'],
            size: '90%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        exporting: {
            enabled: false
        },

        tooltip: {
            enabled: false
        },
        // the value axis
        yAxis: {
            stops: [
                [0.3, '#55BF3B'], // green
                [0.6, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            tickWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 40
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The speed gauge
    var chartSpeed = Highcharts.chart(targetElementId, Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: min,
            max: max,
            tickInterval: 0,
            title: {
                text: measurementName
            },
        },

        credits: {
            enabled: false
        },

        series: [{
            name: measurementName,
            data: [measurementValue],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">'+ decodeEntities(unit) +'</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: decodeEntities(unit)
            }
        }]

    }));

}

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
        },
        yAxis: {
            categories: [],
            gridLineWidth: 0,
            gridLineColor: 'transparent',
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
    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        document.getElementById('loading').style.display = 'inline-block';
        let measurementInit1 = '_measurements';
        let measurementFilter1 = nodeId + measurementInit1;

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
                for (let j = 0; j < readMeasurementType.length; j++) {
                    readTimestamp.push(readResults[0][j]['timestamp']);
                    readTypeId.push(readResults[0][j]['sensor_type_id']);
                    readValues.push(readResults[0][j]['value']);
                }
                let ccounter =0;
                for(let i = 0; i < readTypeId.length; i++){
                    if(readTypeId[i]==typeIds[i]){
                        console.log(readTypeId[i]);
                    }
                }
                console.log(ccounter);
                console.log("Last:", readTimestamp, readTypeId, readValues);
            })
            .catch(error => {
                console.error('Error occurred:', error);
            });

            // for(let i = 0; i < readTypeId.length; j++){
            //     if(i==3){
            //         console.log("i=3",readTypeId[i]);
            //     }
            // }
    });
})

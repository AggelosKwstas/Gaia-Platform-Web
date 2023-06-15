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
        console.log(typeResults);

        for (let j = 0; j < nodeTypes.length; j++){
            typeDescriptions.push(typeResults[0][j]['description']);
            min_value.push(typeResults[0][j]['min_value']);
            max_value.push(typeResults[0][j]['max_value']);
            typeUnits.push((typeResults[0][j]['unit']))
        }
        console.log(typeDescriptions, min_value,max_value, typeUnits);

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
        console.log('All requests completed');
        const timestamps = [];
        for (let j = 0; j < measurements.length; j++) {
            timestamps.push(results[0][j]['timestamp']);
        }
        let objects = [];
        let lastMeasurement = [];
        let cycleCounter = measurements.length;
        console.log("len",measurements.length);
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
            console.log(objects);

        }
        for(let k =0; k<results.length; k++)
        {
            let adder = k +1;
            let chartName = 'Gauge';
            let sum = chartName+adder;
            if (k!==3){
                gaugeChart(sum, typeDescriptions[k], lastMeasurement[k], min_value[k], max_value[k], typeUnits[k]);
            }
            else if(k===3){
                initBattery(lastMeasurement[k]);

            }
            console.log(lastMeasurement[k]);
        }
        lineCharts("chart-container1");
        lineCharts('chart-container2');

        console.log('last',lastMeasurement);
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

// function lineChart(targetElementId, measurementName, measurementValue, min, max, unit)
// {

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

            if (level === 100) {
                batteryStatus.innerHTML = `Full battery <i class="ri-battery-2-fill green-color"></i>`
            }
            if (level > 20 && level < 100) {
                batteryStatus.innerHTML = `Moderate Battery <i class="ri-battery-2-fill green-color"></i>`
            }
            else if (level <= 20) {
                batteryStatus.innerHTML = `Low battery <i class="ri-plug-line animated-red"></i>`
            }
            else {
                batteryStatus.innerHTML = ''
            }

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
function lineCharts(targetElementId, measurementName, measurementValues, unit) {
console.log("lineCharts");
    Highcharts.chart(targetElementId, {
        chart: {
            type: 'line'
        },
        title: {
            text: measurementName
        },
        xAxis: {
            type: 'logarithmic',
            title: {
                text: 'X Axis Title'
            }
        },
        yAxis: {
            type: 'logarithmic',
            title: {
                text: 'Y Axis Title'
            }
        },
        series: [{
            name: 'Series Name',
            data: [measurementValues]
        }]
    });
}

$(document).ready(function(){


        console.log("function ready");


})

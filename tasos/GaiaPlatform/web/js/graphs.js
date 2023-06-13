console.log("ready");
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
const typeUnit =[];
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
            typeUnit.push((typeResults[0][j]['unit']))
        }
        console.log(typeDescriptions, min_value,max_value, typeUnit);

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

            if(i===0){
                gaugeChart('Gauge1', typeDescriptions[i], lastMeasurement[i], min_value[i], max_value[i], typeUnit[i]);
                console.log(lastMeasurement[i]);
                console.log("min val", min_value[i], typeUnit[i])
            }
            if(i===1){
                gaugeChart('Temp2', 'Gay', lastMeasurement[i]);
            }
        }
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
            size: '140%',
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
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
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
                y: 16
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
            min: 0,
            max: 200,
            title: {
                text: measurementName
            }
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
                    '<span style="font-size:12px;opacity:0.4">km/h</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' km/h'
            }
        }]

    }));

    // // Bring life to the dials
    // setInterval(function () {
    //     // Speed
    //     var point,
    //         newVal,
    //         inc;
    //
    //     if (chartSpeed) {
    //         point = chartSpeed.series[0].points[0];
    //         inc = Math.round((Math.random() - 0.5) * 100);
    //         newVal = point.y + inc;
    //
    //         if (newVal < 0 || newVal > 200) {
    //             newVal = point.y - inc;
    //         }
    //
    //         point.update(newVal);
    //     }
    //
    // }, 2000);

}


$(document).ready(function(){


        console.log("function ready");


})

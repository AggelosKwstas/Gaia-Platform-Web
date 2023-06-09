const day = new Date().getDate();
const month = new Date().getMonth() + 1; // Months are zero-based
const year = new Date().getFullYear();
const dateFormatted = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
console.log(dateFormatted);

// measurementInit='_measurements';

const urls = ['https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=3',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=4',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=5',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=6',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=8',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=9',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=10',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=11',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=12',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=13',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8&sensor_node_id=6&date=' + dateFormatted + '&sensor_type_id=14'];

let measurements = [];
const results = [];
const requests = urls.map(url => fetch(url).then(response => response.json()));
Promise.all(requests)
    .then(responseData => {
        responseData.forEach(data => {
            measurements = data['6_measurements'];
            console.log(measurements.length);
            //  results[0]['6_measurements'][0]['timestamp']
            results.push(measurements);
        });
        console.log(measurements);
        // for(let i = 0; i < results.length; i++){
        // }
    })
    .then(() => {
        console.log('All requests completed');
        console.log(results.length);
        console.log(results);
        const timestamps = [];
        for (let j = 0; j < measurements.length; j++) {
            timestamps.push(results[0][j]['timestamp']);
        }
        let objects = [];
        for (let i = 0; i < results.length; i++) {
            objects = [];
            for (let j = 0; j < measurements.length; j++) {
                objects.push(results[i][j]['value'])
            }
          if(i===0)
              makeBlueChart(objects,timestamps,'O3');
        }

    })
    .catch(error => {
        console.error('Error occurred:', error);
    });


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


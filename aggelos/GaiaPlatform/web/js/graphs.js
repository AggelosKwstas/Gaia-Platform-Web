function convertSubscriptTagsToCharacters(str) {
    var regex = /<sub>(.*?)<\/sub>/g;
    return str.replace(regex, function (match, p1) {
        return p1.replace(/./g, function (char) {
            var charCode = char.charCodeAt(0);
            var subscriptCode = charCode + 8272;
            return String.fromCharCode(subscriptCode);
        });
    });
}

const urls = [
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?sensor_node_id=6&date=2023-06-09&sensor_type_id=3&token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8',
    'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?sensor_node_id=6&date=2023-06-09&sensor_type_id=4&token_auth=99f344c4-5afd-4962-a7e2-ddbc3467d4c8'
];

const results = [];

const requests = urls.map(url => fetch(url));

Promise.all(requests)
    .then(async responses => {
        for (const response of responses) {
            const data = await response.json();
            results.push(data);
        }
    })
    .then(() => {
        console.log('data are:', results[0]['6_measurements'][0]['timestamp'])
    })
    .catch(error => {
        console.error('Error occurred:', error);
    });




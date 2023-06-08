

typeId = [];
typeDescription = [];
minTypeValue = [];
maxTypeValue = [];
typeUnit = [];

// function typeCall(id, callback) {
    key3 = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    id=5;
    typeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNodeType.php?sensor_node_id=" + id + "";
    $.ajax(typeURL, {
        method: 'GET', data: {
            token_auth: key3,
        }, success: function (data) {
            typeId = [];
            typeDescription = [];
            minTypeValue = [];
            maxTypeValue = [];
            typeUnit = [];
            for (let index in data['tbl_sensor_type']) {
                let item = data['tbl_sensor_type'][index];
                typeId.push(item.sensor_type_id);
                typeDescription.push(item.description);
                minTypeValue.push(item.min_value);
                maxTypeValue.push(item.max_value);
                typeUnit.push(item.unit);
            }
            // callback(id);
            console.log(typeId);
        }
    });
// }


// function lastMeasurementsCall(id, callback) {
    let key = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    let lastMeasurementsURL = "https://restapi.gaia-platform.eu/rest-api/items/readLast.php?sensor_node_id=" + id + "";

    $.ajax(lastMeasurementsURL, {
        method: 'GET', data: {
            token_auth: key,
        }, success: function (data) {
            if (data === null) {
            } else {
                sensorTypeId = [];
                measurementValue = [];
                for (let index in data) {
                    let item = data[index];
                    sensorTypeId.push(item.sensor_type_id);
                    measurementValue.push(item.value);
                }
                // callback(id, counter);
            }
        }
        // , error: function (error) {
        //     found = true;
        //     callback(found);
        //     console.log(`Error ${error}`);
        // }
    });
// }
//
//
// let sensorNode = [];
// let sensorName = [];
// let sensorDescription = [];
// let sensorLongitude = [];
// let sensorLatitude = [];
//
// function nodeApiCall(callback) {
//     key2 = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
//     let nodeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNode.php?project_id=2";
//     $.ajax(nodeURL, {
//         method: 'GET', data: {
//             token_auth: key2,
//         }, success: function (data) {
//             sensorNode = [];
//             sensorName = [];
//             sensorDescription = [];
//             sensorLongitude = [];
//             sensorLatitude = [];
//             for (let index in data['tbl_sensor_node']) {
//                 let item = data['tbl_sensor_node'][index];
//                 sensorNode.push(item.sensor_node_id);
//                 sensorName.push(item.name);
//                 sensorDescription.push(item.description);
//                 sensorLongitude.push(item.longitude);
//                 sensorLatitude.push(item.latitude);
//             }
//             callback();
//         }
//     });
// }
//
// let typeId = [];
// let typeDescription = [];
// let minTypeValue = [];
// let maxTypeValue = [];
// let typeUnit = [];
//
// function typeCall(id, callback) {
//     key3 = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
//     let typeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNodeType.php?sensor_node_id=" + id + "";
//     $.ajax(typeURL, {
//         method: 'GET', data: {
//             token_auth: key3,
//         }, success: function (data) {
//             typeId = [];
//             typeDescription = [];
//             minTypeValue = [];
//             maxTypeValue = [];
//             typeUnit = [];
//             for (let index in data['tbl_sensor_type']) {
//                 let item = data['tbl_sensor_type'][index];
//                 typeId.push(item.sensor_type_id);
//                 typeDescription.push(item.description);
//                 minTypeValue.push(item.min_value);
//                 maxTypeValue.push(item.max_value);
//                 typeUnit.push(item.unit);
//             }
//             callback(id);
//         }
//     });
// }
//
// function readMeasurements(nodeId,  typeId){
//     key1 = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
//     url = 'https://restapi.gaia-platform.eu/rest-api/items/readMeasurements.php?sensor_node_id=4&date=2023-06-08&sensor_type_id=3';
//
// }


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


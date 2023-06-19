function toFixed(num, fixed) {
    var re = new RegExp('^-?\\d+(?:\.\\d{0,' + (fixed || -1) + '})?');
    return num.toString().match(re)[0];
}

//works only with xaamp directory
function makeAjax(id, title) {
    $.ajax({
        url: './?r=api/testing&title=' + title + "&id=" + id,
        data: {}, type: 'POST', success: function (response) {
            console.log(response);
        }, error: function (xhr, status, error) {
            console.log(error);
        }
    });
}


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

function fixTimestamp(timestamp) {
    var time = timestamp.split(' ')[1];

    var hour = parseInt(time.split(':')[0]);
    var minute = time.split(':')[1];
    var second = time.split(':')[2];

    var period = hour >= 12 ? 'PM' : 'AM';

    // Convert 24-hour format to 12-hour format
    if (hour > 12) {
        hour -= 12;
    }

    var formattedTime = hour + ':' + minute + ':' + second + ' ' + period;
    return formattedTime;
}

function checkQuality(o3, pm10, pm2, so2, no2) {
    // ,pm10,pm25,so2,no2
    let conditions_bad = [];
    let conditions_fair = [];

    let found_bad = false;

    let fair_o3 = false;
    let bad_o3 = false;

    let fair_pm2 = false;
    let bad_pm2 = false;

    let fair_pm1 = false;
    let bad_pm1 = false;

    let fair_so2 = false;
    let bad_so2 = false;

    let fair_no2 = false;
    let bad_no2 = false;

    if (o3 >= 0.04 && o3 <= 0.2) {
        fair_o3 = true;
    } else if (o3 >= 0.2) {
        bad_o3 = true;
    }

    if (pm10 >= 50 && pm10 <= 200) {
        fair_pm1 = true;
    } else if (pm10 >= 200) {
        bad_pm1 = true;
    }

    if (pm2 >= 25 && pm2 <= 100) {
        fair_pm2 = true;
    } else if (pm2 >= 100) {
        bad_pm2 = true;
    }

    if (so2 >= 0.1 && so2 <= 0.3) {
        fair_so2 = true;
    } else if (so2 >= 0.3) {
        bad_so2 = true;
    }

    if (no2 >= 0.1 && no2 <= 0.2) {
        fair_no2 = true;
    } else if (no2 >= 0.2) {
        bad_no2 = true;
    }

    if (bad_o3) {
        conditions_bad.push('O<sub>3</sub>');
        found_bad = true;
    }

    if (bad_pm1) {
        conditions_bad.push('PM 10');
        found_bad = true;
    }


    if (bad_pm2) {
        conditions_bad.push('PM 2.5');
        found_bad = true;
    }

    if (bad_so2) {
        found_bad = true;
        conditions_bad.push('SO<sub>2</sub>');
    }

    if (bad_no2) {
        conditions_bad.push('NO<sub>2</sub>');
        found_bad = true;
    }

    if (fair_o3) {
        conditions_fair.push('O<sub>3</sub>')
    }

    if (fair_pm1) {
        conditions_fair.push('PM 10')
    }

    if (fair_pm2) {
        conditions_fair.push('PM 2.5')
    }

    if (fair_so2) {
        conditions_fair.push('SO<sub>2</sub>')
    }

    if (fair_no2) {
        conditions_fair.push('NO<sub>2</sub>')
    }

    if (found_bad) {
        return {icon: redIcon, condition: conditions_bad, flag: 'bad'}
    }

    if (!found_bad) {
        return {icon: orangeIcon, condition: conditions_fair, flag: 'fair'}
    }

    return {icon: greenIcon, condition: null, flag: null};

}

let sensorTypeId = [];
let measurementValue = [];
let timestamp = null;
let found = false;
let counter = 0;

function lastMeasurementsCall(id, callback) {
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
                timestamp = null;
                for (let index in data) {
                    let item = data[index];
                    timestamp = item.timestamp;
                    sensorTypeId.push(item.sensor_type_id);
                    measurementValue.push(item.value);
                }
                callback(id, counter);
            }
        }, error: function (error) {
            found = true;
            callback(found);
            console.log(`Error ${error}`);
        }
    });
}


let sensorNode = [];
let sensorName = [];
let sensorDescription = [];
let sensorLongitude = [];
let sensorLatitude = [];

function nodeApiCall(callback) {
    key2 = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    let nodeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNode.php?project_id=2";
    $.ajax(nodeURL, {
        method: 'GET', data: {
            token_auth: key2,
        }, success: function (data) {
            sensorNode = [];
            sensorName = [];
            sensorDescription = [];
            sensorLongitude = [];
            sensorLatitude = [];
            for (let index in data['tbl_sensor_node']) {
                let item = data['tbl_sensor_node'][index];
                sensorNode.push(item.sensor_node_id);
                sensorName.push(item.name);
                sensorDescription.push(item.description);
                sensorLongitude.push(item.longitude);
                sensorLatitude.push(item.latitude);
            }
            callback();
        }
    });
}

let typeId = [];
let typeDescription = [];
let minTypeValue = [];
let maxTypeValue = [];
let typeUnit = [];

function typeCall(id, callback) {
    key3 = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    let typeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNodeType.php?sensor_node_id=" + id + "";
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
            callback(id);
        }
    });
}

let url = window.location.href;
const parts = url.split("=");
const lastPart = parts[parts.length - 1];
const decodedLastPart = decodeURIComponent(lastPart);
if (decodedLastPart === 'site/map') {
    console.log('on map');
    /* Config map elements */
    const zoom = 11;
    const lat = 39.6711248555161;
    const lng = 20.85619898364398;

    let config2 = {
        minZoom: 7, maxZoom: 18, zoomControl: false
    };

    let s = new Date().toLocaleString();
    map2 = L.map("map_full", config2).setView([lat, lng], zoom);

    LeafIcon = L.Icon.extend({
        options: {
            iconSize: [25, 32], popupAnchor: [-1, -15]
        }
    });

    greenIcon = new LeafIcon({
        iconUrl: 'asset/stationGreen.png',
    })

    redIcon = new LeafIcon({
        iconUrl: 'asset/stationRed.png',
    })

    orangeIcon = new LeafIcon({
        iconUrl: 'asset/stationOrange.png',
    })

    greyIcon = new LeafIcon({
        iconUrl: 'asset/stationGrey.png',
    })

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
    }).addTo(map2);

    map2.attributionControl.setPrefix();

    function checkCompletion() {
        console.log(counter);
        if (counter === 4) {
            $('#loader').fadeOut('fast');
        }
    }

    nodeApiCall(function () {
        lastMeasurementsCall(sensorNode[0], function (id) {
            typeCall(sensorNode[0], function (id) {
                counter++;
                let marker3 = L.marker([sensorLatitude[0], sensorLongitude[0]]).addTo(map2);
                if (found === true) {
                    marker3.setIcon(greyIcon);
                    popup = `
        <div style="display: block;text-align: center">
        <h6 ><i class="fa fa-location-dot"></i> ${sensorDescription[0]}</h6>
        <img style="height:7rem;" src="../asset/sensorImages/sensor_default.jpg">
        <hr>
        <b>State: </b><u style="color: red">Inactive</u><br>
        <b>Type: </b>${sensorName[0]}<br>
        <b>Status: </b>${uoi_object['weather'][0]['main']}<br>
        <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${uoi_object['weather'][0]['icon']}.png">
        <div style="height: 45px;width: 130px"><b>Station is currently unavailable!</b></div>
        <button class="button_station button4" style="cursor: not-allowed">View station</button>
        </div>`;
                    marker3.bindPopup(popup);
                } else if (found === false) {
                    let icon = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).icon
                    let objects = [];
                    objects = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).condition
                    let flag = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).flag
                    marker3.setIcon(icon);
                    marker3.bindPopup(`<div style="display: block;text-align: center">
                        <div id="stationLoca"><h6><i class="fa fa-location-dot"></i> ${sensorDescription[0]}</h6></div>
                        <img style="height:7rem;" src="../asset/sensorImages/sensorGardiki.jpg">
                        <hr class="dotted">
                                  ${(() => {
                        let loopContent0 = '';
                        if (flag === 'bad') {
                            loopContent0 += `<div><b><u>Bad due to:</u></b></div>`;
                            for (let i = 0; i < objects.length; i++) {
                                loopContent0 += `<li style="color: red;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                            }
                        } else if (flag === 'fair') {
                            loopContent0 += `<div><b><u>Fair due to:</u></b></div>`;
                            for (let i = 0; i < objects.length; i++) {
                                loopContent0 += `<li style="color: orange;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                            }
                        }
                        return loopContent0;
                    })()}
                        <b>State: </b><u style="color: #01FB0AFF">Active</u><br>
                        <b>Type: </b>${sensorName[0]}<br>
                        <b>Status: </b>${gardiki_object['weather'][0]['main']}<br>
                        <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${gardiki_object['weather'][0]['icon']}.png"><br>
                        <b>Today at:</b><br>F
                        ${fixTimestamp(timestamp)}<br>
                        <b><u>Sensor Readings:</u></b><br>
                            ${(() => {
                        let loopContent0 = '';
                        for (let i = 0; i < measurementValue.length; i++) {
                            loopContent0 += `<b>${typeDescription[i]}:</b> ${measurementValue[i]} ${typeUnit[i]}<br>`;
                        }
                        return loopContent0;
                    })()}
                        <button onclick="Redirect(sensorNode[0],sensorDescription[0])" class="btn btn-primary  px-3 mb-2 mb-lg-0">View station</button><br>
                        <div id="1" class="lds-roller" style="display: none;padding-left: 30px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div>`);
                }
                found = false;
                checkCompletion();

                lastMeasurementsCall(sensorNode[1], function (id) {
                    typeCall(sensorNode[1], function (id) {
                        counter++;
                        marker4 = L.marker([sensorLatitude[1], sensorLongitude[1]]).addTo(map2);
                        if (found === true) {
                            marker4.setIcon(greyIcon);
                            popup = `
        <div style="display: block;text-align: center">
        <h6 ><i class="fa fa-location-dot"></i> ${sensorDescription[1]}</h6>
        <img style="height:7rem;" src="../asset/sensorImages/sensor_default.jpg">
        <hr>
        <b>State: </b><u style="color: red">Inactive</u><br>
        <b>Type: </b>${sensorName[1]}<br>
        <b>Status: </b>${uoi_object['weather'][0]['main']}<br>
        <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${uoi_object['weather'][0]['icon']}.png">
        <div style="height: 45px;width: 130px"><b>Station is currently unavailable!</b></div>
        <button class="button_station button4" style="cursor: not-allowed">View station</button>
        </div>`;
                            marker4.bindPopup(popup);
                        } else if (found === false) {
                            let icon = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).icon
                            let objects = [];
                            objects = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).condition
                            let flag = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).flag
                            marker4.setIcon(icon);
                            marker4.bindPopup(`<div style="display: block;text-align: center">
                <div id="stationLoca"><h6><i class="fa fa-location-dot"></i> ${sensorDescription[1]}</h6></div>
                <img style="height:7rem;" src="../asset/sensorImages/sensorGardiki.jpg">
                <hr class="dotted">
                                  ${(() => {
                                let loopContent0 = '';
                                if (flag === 'bad') {
                                    loopContent0 += `<div><b><u>Bad due to:</u></b></div>`;
                                    for (let i = 0; i < objects.length; i++) {
                                        loopContent0 += `<li style="color: red;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                                    }
                                } else if (flag === 'fair') {
                                    loopContent0 += `<div><b><u>Fair due to:</u></b></div>`;
                                    for (let i = 0; i < objects.length; i++) {
                                        loopContent0 += `<li style="color: orange;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                                    }
                                }
                                return loopContent0;
                            })()}
                        <b>State: </b><u style="color: #01FB0AFF">Active</u><br>
                <b>Type: </b>${sensorName[1]}<br>
                <b>Status: </b>${gardiki_object['weather'][0]['main']}<br>
                <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${gardiki_object['weather'][0]['icon']}.png"><br>
                  <b>Today at:</b><br>
                        ${fixTimestamp(timestamp)}<br>
                <b><u>Sensor Readings:</u></b><br>
                    ${(() => {
                                let loopContent0 = '';
                                for (let i = 0; i < measurementValue.length; i++) {
                                    loopContent0 += `<b>${typeDescription[i]}:</b> ${measurementValue[i]} ${typeUnit[i]}<br>`;
                                }
                                return loopContent0;
                            })()}
                <button onclick="Redirect(sensorNode[1],sensorDescription[1])" class="btn btn-primary  px-3 mb-2 mb-lg-0">View station</button><br>
                <div id="1" class="lds-roller" style="display: none;padding-left: 30px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>`);
                        }
                        found = false;
                        checkCompletion();

                        lastMeasurementsCall(sensorNode[2], function (id) {
                            typeCall(sensorNode[2], function (id) {
                                counter++;
                                marker5 = L.marker([sensorLatitude[2], sensorLongitude[2]], {icon: greyIcon}).addTo(map2);
                                if (found === true) {
                                    marker5.setIcon(greyIcon);
                                    popup = `
        <div style="display: block;text-align: center">
        <h6 ><i class="fa fa-location-dot"></i> ${sensorDescription[1]}</h6>
        <img style="height:7rem;" src="../asset/sensorImages/sensor_default.jpg">
        <hr>
        <b>State: </b><u style="color: red">Inactive</u><br>
        <b>Type: </b>${sensorName[1]}<br>
        <b>Status: </b>${uoi_object['weather'][0]['main']}<br>
        <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${uoi_object['weather'][0]['icon']}.png">
        <div style="height: 45px;width: 130px"><b>Station is currently unavailable!</b></div>
        <button class="button_station button4" style="cursor: not-allowed">View station</button>
        </div>`;
                                    marker5.bindPopup(popup);
                                } else if (found === false) {
                                    let icon = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).icon
                                    let objects = [];
                                    objects = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).condition
                                    let flag = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).flag
                                    marker5.setIcon(icon);
                                    marker5.bindPopup(`
                <div style="display: block;text-align: center">
                <h6 id="station"><i class="fa fa-location-dot"></i> ${sensorDescription[2]}</h6>
                <img style="height:7rem;" src="../asset/sensorImages/sensorAgiosIoannis.jpg">
                <hr class="dotted">
                                    ${(() => {
                                        let loopContent0 = '';
                                        if (flag === 'bad') {
                                            loopContent0 += `<div><b><u>Bad due to:</u></b></div>`;
                                            for (let i = 0; i < objects.length; i++) {
                                                loopContent0 += `<li style="color: red;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                                            }
                                        } else if (flag === 'fair') {
                                            loopContent0 += `<div><b><u>Fair due to:</u></b></div>`;
                                            for (let i = 0; i < objects.length; i++) {
                                                loopContent0 += `<li style="color: orange;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                                            }
                                        }
                                        return loopContent0;
                                    })()}
                        <b>State: </b><u style="color: #01FB0AFF">Active</u><br>
                <b>Type: </b>${sensorName[2]}<br>
                <b>Status: </b>${ioannis_object['weather'][0]['main']}<br>
                <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${ioannis_object['weather'][0]['icon']}.png"><br>
                  <b>Today at:</b><br>
                        ${fixTimestamp(timestamp)}<br>
                <b><u>Sensor Readings:</u></b><br>
                ${(() => {
                                        let loopContent1 = '';
                                        for (let i = 0; i < measurementValue.length; i++) {
                                            loopContent1 += `<b>${typeDescription[i]}:</b> ${measurementValue[i]} ${typeUnit[i]}<br>`;
                                        }
                                        return loopContent1;
                                    })()}
                <button onclick="Redirect(sensorNode[2],sensorDescription[2])" class="btn btn-primary  px-3 mb-2 mb-lg-0">View station</button><br>
                <div id='2' class="lds-roller" style="display: none;padding-left: 35px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                `);
                                }
                                found = false;
                                checkCompletion();

                                lastMeasurementsCall(sensorNode[3], function (id) {
                                    typeCall(sensorNode[3], function (id) {
                                        counter++;
                                        marker6 = L.marker([sensorLatitude[3], sensorLongitude[3]]).addTo(map2);
                                        if (found === true) {
                                            marker6.setIcon(greyIcon);
                                            popup = `
        <div style="display: block;text-align: center">
        <h6 ><i class="fa fa-location-dot"></i> ${sensorDescription[3]}</h6>
        <img style="height:7rem;" src="../asset/sensorImages/sensor_default.jpg">
        <hr>
                <b>State: </b><u style="color: red">Inactive</u><br>
        <b>Type: </b>${sensorName[3]}<br>
        <b>Status: </b>${uoi_object['weather'][0]['main']}<br>
        <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${uoi_object['weather'][0]['icon']}.png">
        <div style="height: 45px;width: 130px"><b>Station is currently unavailable!</b></div>
        <button class="button_station button4" style="cursor: not-allowed">View station</button>
        </div>`;
                                            marker6.bindPopup(popup);
                                        } else if (found === false) {
                                            let icon = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).icon
                                            let objects = [];
                                            objects = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).condition
                                            let flag = checkQuality(measurementValue[0], measurementValue[6], measurementValue[5], measurementValue[7], measurementValue[9]).flag
                                            marker6.setIcon(icon);
                                            marker6.bindPopup(`
                <div style="display: block;text-align: center">
                <h6 id="station"><i class="fa fa-location-dot"></i> ${sensorDescription[3]}</h6>
                <img style="height:7rem;" src="../asset/sensorImages/sensorAgiosIoannis.jpg">
                <hr class="dotted">
                                       ${(() => {
                                                let loopContent0 = '';
                                                if (flag === 'bad') {
                                                    loopContent0 += `<div><b><u>Bad due to:</u></b></div>`;
                                                    for (let i = 0; i < objects.length; i++) {
                                                        loopContent0 += `<li style="color: red;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                                                    }
                                                } else if (flag === 'fair') {
                                                    loopContent0 += `<div><b><u>Fair due to:</u></b></div>`;
                                                    for (let i = 0; i < objects.length; i++) {
                                                        loopContent0 += `<li style="color: orange;"><b>${convertSubscriptTagsToCharacters(objects[i])}</b></li>`;
                                                    }
                                                }
                                                return loopContent0;
                                            })()}
                                        <b>State: </b><u style="color: #01FB0AFF">Active</u><br>
                <b>Type: </b>${sensorName[3]}<br>
                <b>Status: </b>${ioannis_object['weather'][0]['main']}<br>
                <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${ioannis_object['weather'][0]['icon']}.png"><br>
                 <b>Today at:</b><br>
                        ${fixTimestamp(timestamp)}<br>
                <b><u>Sensor Readings:</u></b><br>
                ${(() => {
                                                let loopContent1 = '';
                                                for (let i = 0; i < measurementValue.length; i++) {
                                                    loopContent1 += `<b>${typeDescription[i]}:</b> ${measurementValue[i]} ${typeUnit[i]}<br>`;
                                                }
                                                return loopContent1;
                                            })()}
                <button onclick="Redirect(sensorNode[3],sensorDescription[3])" class="btn btn-primary  px-3 mb-2 mb-lg-0">View station</button><br>
                <div id='2' class="lds-roller" style="display: none;padding-left: 35px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                `);
                                        }
                                        found = false;
                                        checkCompletion();
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
    });


    var legend = L.control({position: "topleft"});

    legend.onAdd = function (map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += " <div class='con-tool right'>  <h4 style='color: black;padding-left: 0.5rem;cursor:help;'>Air Quality</h4><div class='tool'><span style='font-family: Georgia, serif;'><em>Filter the staions by clicking on the color codes.</em></span></div> </div><br>" + '<i class="circle_dot" id="greenFilter" style="background: #01fb0a;cursor: pointer" onclick="greenButton()"></i><span><b>Good</b></span><br>' + '<i class="circle_dot" id="yellowFilter" style="background: #ffeb00;cursor: pointer" onclick="yellowButton()"></i><span><b>Fair</b></span><br>' + '<i class="circle_dot" id="redFilter" style="background: #ff0032;cursor: pointer" onclick="redButton()"></i><span><b>Bad</b></span><br>' + '<i class="circle_dot" id="grayFilter" style="background: grey;cursor: pointer" onclick="grayButton()"></i><span><b>No data</b></span><br>' + '<a id="myBtn" style="text-decoration: none;font-size: 15px" href="javascript:void(0);">Legend explained</a><br>';
        return div;
    };

    legend.addTo(map2);

    document.getElementById("myBtn").addEventListener("click", detailsFunction, false);
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    function detailsFunction() {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    legend.getContainer().addEventListener('mouseover', function () {
        map2.doubleClickZoom.disable();
        if (!checkMobile()) map2.dragging.disable();
    });

    legend.getContainer().addEventListener('mouseout', function () {
        map2.dragging.enable();
        map2.doubleClickZoom.enable();
    });

    if (checkMobile()) {
        map2.on('popupopen', () => {
            $('.legend').hide();
            $(".container_map").hide();

        })
        map2.on('popupclose', () => {
            $('.legend').show();
            $(".container_map").show();
        })
    }

    /*Dropdown Menu*/
    $('.dropdown').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
        if ($(this).hasClass('active')) {
            $('#cycle').addClass('fa fa-chevron-down');
        } else $('#cycle').addClass('fa fa-chevron-left');

    });
    $('.dropdown').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu').slideUp(300);
        $('#cycle').addClass('fa fa-chevron-left');
        $('#cycle').removeClass('fa fa-chevron-down');
    });
    $('.dropdown .dropdown-menu li').click(function () {
        $(this).parents('.dropdown').find('span').text($(this).text());
        $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        $('#cycle').addClass('fa fa-chevron-left');
    });
    /*End Dropdown Menu*/
    $('.dropdown-menu li').click(function () {
        if ($(this).parents('.dropdown').find('input').val() === 'Γαρδίκι') {
            map2.flyTo([39.7147, 20.7572], 18, {
                animate: true, duration: 1.5
            });
        } else if ($(this).parents('.dropdown').find('input').val() === 'Ελεούσα') {
            map2.flyTo([39.7066, 20.7926], 18, {
                animate: true, duration: 1.5
            });
        } else if ($(this).parents('.dropdown').find('input').val() === 'Άγιος Ιωάννης') {
            map2.flyTo([39.7027, 20.8122], 18, {
                animate: true, duration: 1.5
            });
        } else if ($(this).parents('.dropdown').find('input').val() === 'Πανεπιστήμιο') {
            map2.flyTo([39.6216, 20.8596], 18, {
                animate: true, duration: 1.5
            });
        }
    });

    let element = document.getElementById("mainNav");
    element.classList.remove("fixed-top");
}

function fToC(f) {
    f = f - 273.15;
    return toFixed(f, 1);
}

function checkMobile() {
    const isMobile = /Android|webOS|iPhone/i.test(navigator.userAgent);
    return isMobile;
}

function Redirect(id, title) {
    // document.getElementById(id).style.display = 'block';
    //
    // map2._handlers.forEach(function (handler) {
    //     handler.disable();
    // });
    makeAjax(id, title);
}

/* Filter Stations */
let greenPressed = false

function greenButton() {
    if (!greenPressed) {
        $('.leaflet-pane img[src="asset/stationGreen.png"]').hide();
        document.getElementById('greenFilter').style.backgroundColor = '#D3D3D3';
        greenPressed = true
    } else {
        $('.leaflet-pane img[src="asset/stationGreen.png"]').show();
        document.getElementById('greenFilter').style.backgroundColor = '#20de28';
        greenPressed = false
    }
}

let yellowPressed = false

function yellowButton() {
    if (!yellowPressed) {
        $('.leaflet-pane img[src="asset/stationOrange.png"]').hide();
        document.getElementById('yellowFilter').style.backgroundColor = '#D3D3D3';
        yellowPressed = true
    } else {
        $('.leaflet-pane img[src="asset/stationOrange.png"]').show();
        document.getElementById('yellowFilter').style.backgroundColor = '#ffea00';
        yellowPressed = false
    }
}

let redPressed = false

function redButton() {
    if (!redPressed) {
        $('.leaflet-pane img[src="asset/stationRed.png"]').hide();
        document.getElementById('redFilter').style.backgroundColor = '#D3D3D3';
        redPressed = true
    } else {
        $('.leaflet-pane img[src="asset/stationRed.png"]').show();
        document.getElementById('redFilter').style.backgroundColor = '#ff0032';
        redPressed = false
    }
}

let grayPressed = false

function grayButton() {
    if (!grayPressed) {
        $('.leaflet-pane img[src="asset/stationGrey.png"]').hide();
        document.getElementById('grayFilter').style.backgroundColor = '#D3D3D3';
        grayPressed = true
    } else {
        $('.leaflet-pane img[src="asset/stationGrey.png"]').show();
        document.getElementById('grayFilter').style.backgroundColor = '#808080';
        grayPressed = false
    }
}
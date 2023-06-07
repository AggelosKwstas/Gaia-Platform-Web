function toFixed(num, fixed) {
    var re = new RegExp('^-?\\d+(?:\.\\d{0,' + (fixed || -1) + '})?');
    return num.toString().match(re)[0];
}

//works only with xaamp directory
function makeAjax(id,title) {
    $.ajax({
        url:  './?r=api/testing&id=' + id +"&title=" +decodeURI(title),
        data: {},
        type: 'POST',
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

// var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
// var yyyy = today.getFullYear();
// today = yyyy + '-' +mm + '-' + dd;
// let phrase = '_measurements';
// let apiMeasurementsPhrase = sensor_node_id + phrase;

let sensorTypeId = [];
let measurementValue = [];
function lastMeasurementsCall(id, callback){
    let key = '99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    let lastMeasurementsURL = "https://restapi.gaia-platform.eu/rest-api/items/readLast.php?sensor_node_id=" + id +"";
    $.ajax(lastMeasurementsURL, {
        method: 'GET',
        data: {
            token_auth: key,
        },
        success: function (data) {
            sensorTypeId = [];
            measurementValue = [];
            for (let index in data) {
                let item = data[index];
                sensorTypeId.push(item.sensor_type_id);
                measurementValue.push(item.value);
            }
            callback(id);
            console.log(sensorTypeId, measurementValue);
}
});
}

let sensorNode = [];
let sensorName = [];
let sensorDescription = [];
let sensorLongitude = [];
let sensorLatitude = [];
function nodeApiCall(callback) {
    key2='99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    let nodeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNode.php?project_id=2";
    $.ajax(nodeURL, {
        method: 'GET',
        data: {
            token_auth: key2,
        },
        success: function (data) {
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

let typeId =[];
let typeDescription = [];
let minTypeValue = [];
let maxTypeValue = [];
let typeUnit = [];
function typeCall(id, callback) {
    key3='99f344c4-5afd-4962-a7e2-ddbc3467d4c8';
    let typeURL = "https://restapi.gaia-platform.eu/rest-api/items/readNodeType.php?sensor_node_id="+ id +"";
    $.ajax(typeURL, {
        method: 'GET',
        data: {
            token_auth: key3,
        },
        success: function (data) {
            typeId =[];
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
        minZoom: 7,
        maxZoom: 18,
        zoomControl: false
    };

    let s = new Date().toLocaleString();
    map2 = L.map("map_full", config2).setView([lat, lng], zoom);

    LeafIcon = L.Icon.extend({
        options: {
            iconSize: [25, 32],
            popupAnchor: [-1, -15]
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


    nodeApiCall(function (){
        console.log("finished");

        marker3 = L.marker([39.6216, 20.8596], {icon: greyIcon}).addTo(map2);
        popup = `
        <div style="display: block;text-align: center">
        <h6 ><i class="fa fa-location-dot"></i> ${sensorDescription[0]}</h6>
        <img style="height:7rem;" src="../asset/sensorImages/sensor_default.jpg">
        <hr>
        <b>Type: </b>${sensorName[0]}<br>
        <b>Status: </b>${uoi_object['weather'][0]['main']}<br>
        <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${uoi_object['weather'][0]['icon']}.png">
        <div style="height: 45px;width: 130px"><b>Station is currently unavailable!</b></div>
        <button id="uoiButton" onclick="Redirect('uoiDiv')" class="btn btn-primary  px-3 mb-2 mb-lg-0"><b>View station</b></button>
        </div>`;
        marker3.bindPopup(popup);

        //gardiki
        marker4 = L.marker([39.7147, 20.7572], {icon: greenIcon}).addTo(map2);
        console.log(sensorNode[1]);
            marker4.bindPopup(`<div style="display: block;text-align: center">
            <div id="stationLoca"><h6><i class="fa fa-location-dot"></i> ${sensorDescription[1]}</h6></div>
            <img style="height:7rem;" src="../asset/sensorImages/sensorGardiki.jpg">
            <hr class="dotted">
            <b>Type: </b>${sensorName[1]}<br>
            <b>Status: </b>${gardiki_object['weather'][0]['main']}<br>
            <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${gardiki_object['weather'][0]['icon']}.png"><br>
            <b><u>Τελευταίες Μετρήσεις</u></b><br>
            <b>Temperature: </b>${fToC(gardiki_object['main']['temp'])} °C<br>
            <b>Wind: </b>${gardiki_object['wind']['speed']} km/h - ${gardiki_object['wind']['deg']} °<br>
            <b>Humidity: </b>${gardiki_object['main']['humidity']} %<br>
            <b>Pressure: </b>${gardiki_object['main']['pressure']} Pa<br>
            <b>Visibility: </b>${gardiki_object['visibility']} m<br>
            <button onclick="Redirect(sensorNode[1])" class="btn btn-primary  px-3 mb-2 mb-lg-0"><b>View station</b></button><br>
            <div id="1" class="lds-roller" style="display: none;padding-left: 30px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>`);

        marker5 = L.marker([39.7027, 20.8122], {icon: greenIcon}).addTo(map2);
        lastMeasurementsCall(sensorNode[2], function(id) {
            // console.log(measurementValue[2])
            typeCall(sensorNode[2], function(id) {
                marker5.bindPopup(`
                <div style="display: block;text-align: center">
                <h6 id="station"><i class="fa fa-location-dot"></i> ${sensorDescription[2]}</h6>
                <img style="height:7rem;" src="../asset/sensorImages/sensorAgiosIoannis.jpg">
                <hr class="dotted">
                <b>Type: </b>${sensorName[2]}<br>
                <b>Status: </b>${ioannis_object['weather'][0]['main']}<br>
                <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${ioannis_object['weather'][0]['icon']}.png"><br>
                <b><u>Τελευταίες Μετρήσεις</u></b><br>
                ${(() => {
                    let loopContent1 = '';
                    for (let i = 0; i < measurementValue.length; i++) {
                        loopContent1 += `<b>${typeDescription[i]}:</b> ${measurementValue[i]} ${typeUnit[i]}<br>`;
                    }
                    return loopContent1;
                })()}
                <button onclick="Redirect(sensorNode[2])" class="btn btn-primary  px-3 mb-2 mb-lg-0"><b>View station</b></button><br>
                <div id='2' class="lds-roller" style="display: none;padding-left: 35px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                `);
            });
        });

        marker6 = L.marker([39.7066, 20.7926], {icon: greenIcon}).addTo(map2);
        lastMeasurementsCall(sensorNode[3], function(id) {
            let sensor6 = sensorNode[3];
            typeCall(sensorNode[3], function(id) {
                marker6.bindPopup(`
                <div style="display: block;text-align: center">
                <h6><i class="fa fa-location-dot"></i> ${sensorDescription[3]}</h6>
                <img style="height:7rem;" src="../asset/sensorImages/sensorEleousa.jpg">
                <hr class="dotted">
                  <b>Type: </b>${sensorName[3]}<br>
                <b>Status: </b>${eleousa_object['weather'][0]['main']}<br>
                <img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${eleousa_object['weather'][0]['icon']}.png"><br>
                <b><u>Τελευταίες Μετρήσεις</u></b><br>
                ${(() => {
                    let loopContent2 = '';
                    for (let i = 0; i < typeDescription.length; i++) {
                        loopContent2 += `<b>${typeDescription[i]}:</b> ${measurementValue[i]} ${typeUnit[i]}<br>`;
                    }
                    return loopContent2;
                })()}
                <button onclick="Redirect(sensorNode[3],sensorDescription[3])" class="btn btn-primary  px-3 mb-2 mb-lg-0"><b>View station</b></button><br>
                <div id="3" class="lds-roller" style="display: none;padding-left: 30px"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                `);
            });
        });
    });

    var legend = L.control({position: "topleft"});

    legend.onAdd = function (map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += " <div class='con-tool right'>  <h4 style='color: black;padding-left: 0.5rem;cursor:help;'>Air Quality</h4><div class='tool'><span style='font-family: Georgia, serif;'><em>Filter the staions by clicking on the color codes.</em></span></div> </div><br>" +
            '<i class="circle_dot" id="greenFilter" style="background: #01fb0a;cursor: pointer" onclick="greenButton()"></i><span><b>Good</b></span><br>' +
            '<i class="circle_dot" id="yellowFilter" style="background: #ffeb00;cursor: pointer" onclick="yellowButton()"></i><span><b>Fair</b></span><br>' +
            '<i class="circle_dot" id="redFilter" style="background: #ff0032;cursor: pointer" onclick="redButton()"></i><span><b>Bad</b></span><br>' +
            '<i class="circle_dot" id="grayFilter" style="background: grey;cursor: pointer" onclick="grayButton()"></i><span><b>No data</b></span><br>' +
            '<a id="myBtn" style="text-decoration: none;font-size: 15px" href="javascript:void(0);">Legend explained</a><br>';
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
        if (!checkMobile())
            map2.dragging.disable();
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
        } else
            $('#cycle').addClass('fa fa-chevron-left');

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
                animate: true,
                duration: 1.5
            });
        } else if ($(this).parents('.dropdown').find('input').val() === 'Ελεούσα') {
            map2.flyTo([39.7066, 20.7926], 18, {
                animate: true,
                duration: 1.5
            });
        } else if ($(this).parents('.dropdown').find('input').val() === 'Άγιος Ιωάννης') {
            map2.flyTo([39.7027, 20.8122], 18, {
                animate: true,
                duration: 1.5
            });
        } else if ($(this).parents('.dropdown').find('input').val() === 'Πανεπιστήμιο') {
            map2.flyTo([39.6216, 20.8596], 18, {
                animate: true,
                duration: 1.5
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

function Redirect(id,title) {
    // document.getElementById(id).style.display = 'block';
    //
    // map2._handlers.forEach(function (handler) {
    //     handler.disable();
    // });

    makeAjax(id,title);
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
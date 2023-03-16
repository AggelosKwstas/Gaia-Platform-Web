/*!
* Start Bootstrap - New Age v6.0.6 (https://startbootstrap.com/theme/new-age)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-new-age/blob/master/LICENSE)
*/
//
// Scripts
// 


let config = {
    minZoom: 7,
    maxZoom: 18,
    zoomControl: false
};

const zoom = 11;

const lat = 39.6935;
const lng = 20.8465;


map = L.map("map_element", config).setView([lat, lng], zoom);

LeafIcon = L.Icon.extend({
    options: {
        iconSize: [25, 30],
        popupAnchor: [-1, -15]
    }
});

Icon = new LeafIcon({
    iconUrl: 'asset/stationGreen.png',
})

console.log('i am here');
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 20,
}).addTo(map);

marker3 = L.marker([39.6216, 20.8596], {icon: Icon}).addTo(map);

marker4 = L.marker([39.7147, 20.7572], {icon: Icon}).addTo(map);

marker5 = L.marker([39.7027, 20.8122], {icon: Icon}).addTo(map);

marker6 = L.marker([39.7066, 20.7926], {icon: Icon}).addTo(map);

var legend = L.control({position: "topright"});

map.attributionControl.setPrefix();

legend.onAdd = function (map) {
    var div = L.DomUtil.create("div", "legend_info");
    div.innerHTML += "<div class='three'><h1>Case Study - Urban Air Quality</h1></div>";


    return div;
};

legend.addTo(map);

function onMapClick() {
    window.location.href = locationMap;
}

map.on('click', onMapClick);

legend.getContainer().addEventListener('mouseover', function () {
    map.dragging.disable();
});

legend.getContainer().addEventListener('mouseout', function () {
    map.dragging.enable();
});
/*!
* Start Bootstrap - New Age v6.0.6 (https://startbootstrap.com/theme/new-age)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-new-age/blob/master/LICENSE)
*/
//
// Scripts
//




map2 = L.map("map_full", config).setView([lat, lng], zoom);

LeafIcon = L.Icon.extend({
    options: {
        iconSize: [40, 35],
        popupAnchor: [1, -15]
    }
});

greenIcon = new LeafIcon({
    iconUrl: 'asset/GreenMarker.png',
})

redIcon = new LeafIcon({
    iconUrl: 'asset/RedMarker.png',
})

orangeIcon = new LeafIcon({
    iconUrl: 'asset/OrangeMarker.png',
})

greyIcon = new LeafIcon({
    iconUrl: 'asset/GreyMarker.png',
})

L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}.png', {
    maxZoom: 20,
}).addTo(map2);


marker3 = L.marker([39.6216, 20.8596], {icon: greyIcon}).addTo(map2);

marker3.bindPopup("<b>Click here to view this station</b>");
marker3.on('mouseover', function (e) {
    this.openPopup();
});
marker3.on('mouseout', function (e) {
    this.closePopup();
});


marker4 = L.marker([39.7147, 20.7572], {icon: greyIcon}).addTo(map2);

marker4.bindPopup("<b>Click here to view this station</b>");
marker4.on('mouseover', function (e) {
    this.openPopup();
});
marker4.on('mouseout', function (e) {
    this.closePopup();
});



marker5 = L.marker([39.7027, 20.8122], {icon: greyIcon}).addTo(map2);

marker5.bindPopup("<b>Click here to view this station</b>");
marker5.on('mouseover', function (e) {
    this.openPopup();
});
marker5.on('mouseout', function (e) {
    this.closePopup();
});


marker6 = L.marker([39.7066, 20.7926], {icon: greyIcon}).addTo(map2);

marker6.bindPopup("<b>Click here to view this station</b>");
marker6.on('mouseover', function (e) {
    this.openPopup();
});
marker6.on('mouseout', function (e) {
    this.closePopup();
});


var legend = L.control({ position: "bottomright" });

legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");
    div.innerHTML += "<div class='three'><h1>Case Study - Urban Air Quality</h1></div>";




    return div;
};

legend.addTo(map2);


var legend1 = L.control({ position: "bottomright" });

legend1.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");
    div.innerHTML += "<div class='three'><h1>Case Study - Urban Air Quality</h1></div>";




    return div;
};

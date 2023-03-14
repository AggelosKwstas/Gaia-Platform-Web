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
        popupAnchor: [-1, -15]
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

map2.attributionControl.setPrefix();

marker3 = L.marker([39.6216, 20.8596], {icon: greyIcon}).addTo(map2);

marker3.bindPopup("<b>Click here to view this station</b>");


marker4 = L.marker([39.7147, 20.7572], {icon: greyIcon}).addTo(map2);

marker4.bindPopup("<b>Click here to view this station</b>");



marker5 = L.marker([39.7027, 20.8122], {icon: greyIcon}).addTo(map2);

marker5.bindPopup("<b>Click here to view this station</b>");


marker6 = L.marker([39.7066, 20.7926], {icon: greyIcon}).addTo(map2);

marker6.bindPopup("<b>Click here to view this station</b>");


var legend = L.control({ position: "topleft" });

legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");
    div.innerHTML += "<h4 style='color: black'>Air Quality</h4>";
    div.innerHTML += '<i style="background: #4caf50"></i><span><b>Good</b></span><br>';
    div.innerHTML += '<i style="background: #ffee33"></i><span><b>Fair</b></span><br>';
    div.innerHTML += '<i style="background: #b2102f"></i><span><b>Bad</b></span><br>';
    div.innerHTML += '<i style="background: grey"></i><span><b>No data</b></span><br>';
    div.innerHTML += '<a id="myBtn" style="text-decoration: none" href="javascript:void(0);">Legend explained</a>';


    return div;
};

legend.addTo(map2);



var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function toFixed(num, fixed) {
    var re = new RegExp('^-?\\d+(?:\.\\d{0,' + (fixed || -1) + '})?');
    return num.toString().match(re)[0];
}

function fToC(fahrenheit)
{
    let fTemp = fahrenheit;
    let fToCel = (fTemp - 32) * 5 / 9;
    return toFixed(fToCel,1);
}
let s= new Date().toLocaleString();
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

console.log(fToC(140.8));

marker3.bindPopup(`
<div style="display: block;text-align: center">
<h4>Forecast</h4>
  <hr class="dotted">
 Status: <b>${uoi_object['weather'][0]['main']}</b><br>
<img class="forecast" style="height: 70px;width: 65px" src="http://openweathermap.org/img/w/${uoi_object['weather'][0]['icon']}.png"><br>
 <b><u>Forecast stats</u></b><br>
 <b>Temperature: </b>${fToC(uoi_object['main']['temp'])} °F<br>
 <b>Wind: </b>${uoi_object['wind']['speed']} km/h - ${uoi_object['wind']['deg']} °<br>
 <b>Humidity: </b>${uoi_object['main']['humidity']} %<br>
 <b>Pressure: </b>${uoi_object['main']['pressure']} Pa<br>
 <b>Visibility: </b>${uoi_object['visibility']} m<br>
 <button class="button_station button4"><b>View Station</b></button>
</div>
`);

marker4 = L.marker([39.7147, 20.7572], {icon: greyIcon}).addTo(map2);


// marker4.bindPopup(`
// <div style="display: block;text-align: center">
// <b>Current Weather Stautus</b><br>
//  <hr class="divider"/>
// <p6><b>${s}</b></p6><br>
//  <b>${foreG}</b><br>
// <img style="height: 45px;width: 65px" src="${urlG}.png"><br>
// </div>
// `);


marker5 = L.marker([39.7027, 20.8122], {icon: greyIcon}).addTo(map2);

// marker5.bindPopup(`
// <div style="display: block;text-align: center">
// <b>Current Weather Stautus</b><br>
//  <hr class="divider"/>
// <p6><b>${s}</b></p6><br>
//  <b>${foreG}</b><br>
// <img style="height: 45px;width: 65px" src="${urlI}.png"><br>
// </div>
// `);


marker6 = L.marker([39.7066, 20.7926], {icon: greyIcon}).addTo(map2);

// marker6.bindPopup(`
// <div style="display: block;text-align: center">
// <b>Current Weather Stautus</b><br>
//  <hr class="divider"/>
// <p6><b>${s}</b></p6><br>
//  <b>${foreG}</b><br>
// <img style="height: 45px;width: 65px" src="${urlE}.png"><br>
// </div>
// `);
//

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
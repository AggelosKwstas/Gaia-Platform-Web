const zoom = 11;

const lat = 39.6650;
const lng = 20.8537;

var map = L.map('map').setView([lat, lng], zoom);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">Gaia</a>'
}).addTo(map);

LeafIcon = L.Icon.extend({
    options: {
        iconSize: [32, 37],
        shadowSize: [50, 64],
        iconAnchor: [20, 35],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    }
});

greenIcon = new LeafIcon({
    iconUrl: 'asset/GreenMarker.png',
})
greyIcon = new LeafIcon({
    iconUrl: 'asset/stationGreen.png',
})

//eleousa
marker1 = L.marker([39.7027, 20.8122], {icon: greyIcon}).addTo(map);
marker1.on('click', onMarkerClick);
var popupStatic1 = '';
marker1.bindPopup(popupStatic1);

marker2 = L.marker([39.7147, 20.7572], {icon: greyIcon}).addTo(map);
marker2.on('click', onMarkerClick);
var popupStatic2 = '';
marker2.bindPopup(popupStatic2);

marker3 = L.marker([39.7066, 20.7926], {icon: greyIcon}).addTo(map);
marker3.on('click', onMarkerClick);
var popupStatic3 = '';
marker3.bindPopup(popupStatic3);

// uoi marker
marker4 = L.marker([39.6216, 20.8596], {icon: greyIcon}).addTo(map);
marker4.on('click', onMarkerClick);
var popupStatic4 = '';
marker4.bindPopup(popupStatic4);

function onMarkerClick(e) {
    var popup = e.target.getPopup();
    popup.setContent(`
        <div id="mydiv">
                <h6>Press to find out the air quality</h6>
<!--                <hr class="divider" style="margin-bottom: 1px; margin-top: 1px;"/>-->
                </div>
        `)
}
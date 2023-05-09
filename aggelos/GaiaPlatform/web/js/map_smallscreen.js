/* Download GAIA Desktop logic */
function downloadGaia() {
    setTimeout(function () {
        location.href = downloadUrl;
    }, 2750);
}

$(".btn-circle-download").click(function () {
    $(this).addClass("load");
    setTimeout(function () {
        $(".btn-circle-download").addClass("done");
        downloadGaia();
    }, 1000);
    setTimeout(function () {
        $(".btn-circle-download").removeClass("load done");
    }, 5000);
});
let url_index = window.location.href;
const parts_index = url_index.split("=");
const lastPart_index = parts_index[parts_index.length - 1];
const decodedLastPart_index = decodeURIComponent(lastPart_index);
if (decodedLastPart_index === 'site/index') {
    /* Config map elements */
    let config1 = {
        minZoom: 7,
        maxZoom: 18,
        zoomControl: false,
    };

    const zoom = 11;
    const lat = 39.6711248555161;
    const lng = 20.85619898364398;

    map = L.map("map_element", config1).setView([lat, lng], zoom);

    LeafIcon = L.Icon.extend({
        options: {
            iconSize: [25, 30],
            popupAnchor: [-1, -15]
        }
    });

    Icon = new LeafIcon({
        iconUrl: 'asset/stationGreen.png',
    })

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
    }).addTo(map);

    marker3 = L.marker([39.6216, 20.8596], {icon: Icon}).bindTooltip(`<b><em>Click on the station for a detailed view</em></b>`).addTo(map);

    marker4 = L.marker([39.7147, 20.7572], {icon: Icon}).bindTooltip(`<b><em>Click on the station for a detailed view</em></b>`).addTo(map);

    marker5 = L.marker([39.7027, 20.8122], {icon: Icon}).bindTooltip(`<b><em>Click on the station for a detailed view</em></b>`).addTo(map);

    marker6 = L.marker([39.7066, 20.7926], {icon: Icon}).bindTooltip(`<b><em>Click on the station for a detailed view</em></b>`).addTo(map);

    map.attributionControl.setPrefix();


    function onMapClick() {
        window.location.href = locationMap;
    }

    map.on('click', onMapClick);
}

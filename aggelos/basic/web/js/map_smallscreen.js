let config1 = {
    minZoom: 7,
    maxZoom: 18,
    zoomControl: false
};


const zoom = 11;

const lat = 39.6935;
const lng = 20.8465;


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

function makeBlueChart(){
    let colorPalette = ['rgb(124, 181, 236)'];
    let base = +new Date(1988, 9, 3);
    let oneDay = 24 * 3600 * 1000;
    let data = [[base, Math.random() * 300]];
    for (let i = 1; i < 20000; i++) {
        let now = new Date((base += oneDay));
        data.push([+now, Math.round((Math.random() - 0.5) * 20 + data[i - 1][1])]);
    }
    return option = {
        tooltip: {
            trigger: 'axis',
            position: function (pt) {
                return [pt[0], '10%'];
            }
        },
        title: {
            left: 'center',
            text: 'PM 1.0',
            fontWeight:'lighter'
        },
        toolbox: {
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis: {
            type: 'time',
            showGrid: false,
            boundaryGap: false,
        },
        yAxis: {
            type: 'value',
            showGrid: false,
            boundaryGap: [0, '100%'],
            splitLine: {
                show: true
            },
        },
        dataZoom: [
            {
                type: 'inside',
                start: 0,
            },
            {
                start: 0,
            }
        ],
        series: [
            {
                z2:9,
                z: 9,
                color: colorPalette,
                name: 'Fake Data',
                type: 'line',
                smooth: true,
                symbol: 'none',
                areaStyle: {},
                data: data,
                areaStyle: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                        {
                            offset: 0,
                            color: '#FFFFFF'
                        },
                        {
                            offset: 1,
                            color: '#FFFFFF'
                        },
                    ])
                },
            }
        ],
    };
}
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

function makeBlueChart() {
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
            confine: true,
            position: function (pt) {
                return [pt[0], '10%'];
            }
        },
        title: {
            left: 'center',
            text: 'PM 1.0',
            fontWeight: 'lighter'
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
        //ean value einai px 20000 se mobile kobete (delete ean oi arithmoi einai mikroi)
        grid: {
            containLabel: true,
        },
        series: [
            {
                z2: 9,
                z: 9,
                zlevel: 9,
                color: colorPalette,
                name: 'Fake Data',
                type: 'line',
                smooth: true,
                symbol: 'none',
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

// $('.bstooltip').on('shown.bs.tooltip', function () {
//     var that = $(this);
//
//     var element = that[0];
//     if (element.myShowTooltipEventNum == null) {
//         element.myShowTooltipEventNum = 0;
//     } else {
//         element.myShowTooltipEventNum++;
//     }
//     var eventNum = element.myShowTooltipEventNum;
//
//     setTimeout(function () {
//         if (element.myShowTooltipEventNum === eventNum) {
//             that.tooltip('hide');
//         }
//         // else skip timeout event
//     }, 2000);
// });
function makeBlueChart(title, name) {
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
            text: title,
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
                name: name,
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

window.onload = function () {

    const chartIds = ['barChart1', 'barChart2', 'gaugeChart1'];
    const barCharts = {};

    function initCharts() {
        chartIds.forEach((chartId) => {
            const chart = echarts.init(document.getElementById(chartId));
            chart.setOption(makeBlueChart());
            barCharts[chartId] = chart;
        });
    }

    initCharts();

    $(window).on('resize', function () {
        chartIds.forEach((chartId) => {
            const chart = barCharts[chartId];
            if (chart) {
                chart.resize();
            }
        });
    });
};

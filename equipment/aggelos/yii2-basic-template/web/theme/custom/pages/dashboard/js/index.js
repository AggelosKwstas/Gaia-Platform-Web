$(document).ready(function () {


    plantChart();
    imagesChart();
    locationChart();
})

let plantChart = function () {
    if ($('#kt_chart_activities').length == 0) {
        return;
    }
    let {plants} = window.models;

    let labels = [];
    for (let i = 15; i >= 0; i--) labels.push(moment(new Date).add(-i, "days").format("YYYY-MM-DD"))
    let data = [];


    for (let l in labels) {
        let label = labels[l];
        let found = false;
        for (let ob in plants) {
            let plant = plants[ob];
            console.log(plant.date,label)
            if (plant.date === label) {
                data.push(plant.count);
                found = true;
            }
            //labels.push(plant.date);

        }
        if (!found)
            data.push(0);

    }

    console.log(data)


    var ctx = document.getElementById("kt_chart_activities").getContext("2d");

    var gradient = ctx.createLinearGradient(0, 0, 0, 240);
    gradient.addColorStop(0, Chart.helpers.color('#e14c86').alpha(1).rgbString());
    gradient.addColorStop(1, Chart.helpers.color('#e14c86').alpha(0.3).rgbString());

    var config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                // label: "Sales Stats",
                backgroundColor: Chart.helpers.color('#e14c86').alpha(1).rgbString(),  //gradient
                borderColor: '#e13a58',

                pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointHoverBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointHoverBorderColor: Chart.helpers.color('#ffffff').alpha(0.1).rgbString(),

                //fill: 'start',
                data: data
            }]
        },
        options: {
            title: {
                display: false,
            },
            tooltips: {
                mode: 'nearest',
                intersect: false,
                position: 'nearest',
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0.0000001
                },
                point: {
                    radius: 4,
                    borderWidth: 12
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    };

    var chart = new Chart(ctx, config);
}

// Bandwidth Charts 1.
// Based on Chartjs plugin - http://www.chartjs.org/
let imagesChart = function () {
    if ($('#kt_chart_bandwidth1').length == 0) {
        return;
    }

    var ctx = document.getElementById("kt_chart_bandwidth1").getContext("2d");

    var gradient = ctx.createLinearGradient(0, 0, 0, 240);
    gradient.addColorStop(0, Chart.helpers.color('#d1f1ec').alpha(1).rgbString());
    gradient.addColorStop(1, Chart.helpers.color('#d1f1ec').alpha(0.3).rgbString());
    let {images} = window.models;
    let labels = [];
    for (let i = 15; i >= 0; i--) labels.push(moment(new Date).add(-i, "days").format("YYYY-MM-DD"))
    let data = [];


    for (let l in labels) {
        let label = labels[l];
        let found = false;

        for (let ob in images) {
            let image = images[ob];
            if(label===image.date){
                data.push(image.count);
                found=true;
            }

        }
        if(!found)
            data.push(0);


    }


    var config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                // label: "Bandwidth Stats",
                backgroundColor: gradient,
                borderColor: Chart.helpers.color('green'),

                pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointHoverBackgroundColor: Chart.helpers.color('red').alpha(0).rgbString(),
                pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),

                //fill: 'start',
                data: data,
            }]
        },
        options: {
            title: {
                display: false,
            },
            tooltips: {
                mode: 'nearest',
                intersect: false,
                position: 'nearest',
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0.0000001
                },
                point: {
                    radius: 4,
                    borderWidth: 12
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    };

    var chart = new Chart(ctx, config);
}

// Bandwidth Charts 2.
// Based on Chartjs plugin - http://www.chartjs.org/
let locationChart = function () {
    if ($('#kt_chart_bandwidth2').length == 0) {
        return;
    }

    var ctx = document.getElementById("kt_chart_bandwidth2").getContext("2d");

    var gradient = ctx.createLinearGradient(0, 0, 0, 240);
    gradient.addColorStop(0, Chart.helpers.color('#ffefce').alpha(1).rgbString());
    gradient.addColorStop(1, Chart.helpers.color('#ffefce').alpha(0.3).rgbString());
    let {locations} = window.models;
    let labels = [];
    for (let i = 15; i >= 0; i--) labels.push(moment(new Date).add(-i, "days").format("YYYY-MM-DD"))
    let data = [];


    for (let l in labels) {
        let label = labels[l];
        let found = false;

        for (let ob in locations) {
            let location = locations[ob];
            if(label===location.date){
                found=true;
                data.push(location.count);
            }


        }
        if(!found)
            data.push(0);
    }
    var config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                // label: "Bandwidth Stats",
                backgroundColor: gradient,
                borderColor: Chart.helpers.color('green').alpha(0).rgbString(),
                pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointHoverBackgroundColor: Chart.helpers.color('red').alpha(0).rgbString(),
                pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),

                //fill: 'start',
                data: data,
            }]
        },
        options: {
            title: {
                display: false,
            },
            tooltips: {
                mode: 'nearest',
                intersect: false,
                position: 'nearest',
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0.0000001
                },
                point: {
                    radius: 4,
                    borderWidth: 12
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    };

    var chart = new Chart(ctx, config);
}


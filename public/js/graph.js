$(document).ready(function () {
    //Crear Graficas
    getData();
});

const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Volts',
            borderWidth: 3,
            fill: false,
            borderColor: '#149481',
            tension: 0.2
        }]
    },
    options: {
        scales: {
            y: {

                grace: 2
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Variación de Amperaje',
                color: "#7C110C"
            }
        }
    }
});

const ctx1 = document.getElementById('myChart1').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['13:00', '13:05', '13:06', '13:07', '13:08', '13:09', '13:10', '13:11', '13:12', '13:13',
            '13:14', '13:15', '13:16', '13:17', '13:18', '13:19'
        ],
        datasets: [{
            label: 'AMP',
            data: [25, 25, 30, 26, 25, 25, 24, 25, 23, 25, 25, 25, 25, 25, 30, 26],
            borderWidth: 3,
            fill: false,
            borderColor: '#149481',
            tension: 0.2
        }]
    },
    options: {
        scales: {
            y: {

                grace: 2
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Variación de Amperaje',
                color: "#7C110C"
            }
        }
    }
});

function getData() {
    $.get("http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/r0001", function (data) {
        Object.values(data).reverse().forEach(values => {
            myChart.data.labels.push(values.time.substring(10));
            myChart.data.datasets[0].data.push(values.voltsValue);
            $("#lastValueVolt").val(values.time.substring(10))
        });
        myChart.update();
    });
}

function getLastData() {
    $.get("http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/lst/r0001", function (data) {
        Object.values(data).forEach(values => {
            if ($("input#lastValueVolt").val() != values.time.substring(10)) {
                myChart.data.labels.splice(0, 1);
                myChart.data.datasets[0].data.splice(0, 1);
                myChart.data.labels.push(values.time.substring(10));
                myChart.data.datasets[0].data.push(values.voltsValue);
                $("#lastValueVolt").val(values.time.substring(10))
            }
            console.log($("input#lastValueVolt").val());

        });
        myChart.update();
    });
}

function addData() {
    // var _random1 = Math.random() * (24 - 27) + 24;
    // myChart1.data.labels.splice(0, 1);
    // myChart1.data.datasets[0].data.splice(0, 1);
    // myChart1.data.labels.push("13:20");
    // myChart1.data.datasets[0].data.push(_random1);
    // myChart1.update();
}
setInterval('getLastData()', 4000);
$(document).ready(function () {
    let ModalSelectAero = new bootstrap.Modal(document.getElementById('selecAero'));
    if ($.cookie('id_aero_selected') == null) {
        ModalSelectAero.show();
    } else {
        getStatusArea();
        setupDieselGraph();
        getLogEvents();
    }
    $('#btnAero').click(function (event) {
        $.cookie('id_aero_selected', $("#selectAero").val(), { expires: 1 })
        console.log($.cookie('id_aero_selected'));
        ModalSelectAero.hide();
        location.reload();
        // getStatusArea();
        // setupDieselGraph();
        // getLogEvents();
    });
    $('#changeAero').click(function (e) {
        ModalSelectAero.show();
    });
});

var myChartDiesel = setupNewGraph('myChartDiesel', 'bar', 'Diesel por Planta');

async function setupDieselGraph() {
    let res = await fetch('http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/status/area/lst/' + $.cookie('id_aero_selected')).then(response => response.json());
    let i = 0;
    let porcent = 0;
    let color = "";
    res.forEach(value => {
        porcent = (value.volDiesel * 100) / value.maxDiesel;
        color = getColorBar(porcent);
        myChartDiesel.data.labels.push(value.areaName);
        myChartDiesel.data.datasets[0].data.push(value.volDiesel);
        myChartDiesel.data.datasets[0].backgroundColor.push(color);
        i += 1;
    });
    myChartDiesel.update();
}

async function updateDieselGraph() {
    let res = await fetch('http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/status/area/lst/' + $.cookie('id_aero_selected')).then(response => response.json());
    let color = "";
    //Amarillo ffc107, rojo dc3545, verde 198754
    let i = 0;
    let porcent = 0;
    res.forEach(value => {
        porcent = (value.volDiesel * 100) / value.maxDiesel;
        color = getColorBar(porcent);
        myChartDiesel.data.datasets[0].data[i] = value.volDiesel;
        myChartDiesel.data.datasets[0].backgroundColor[i] = color;
        i += 1;
    });
    myChartDiesel.update();
}

function getColorBar(porcentaje) {
    let color = "";
    if (porcentaje >= 80) {
        color = "#198754";
    } else {
        if (porcentaje >= 50) {
            color = "#ffc107";
        } else {
            if (porcentaje <= 50) {
                color = "#dc3545";
            }
        }
    }
    return color;
}
async function getStatusArea() {
    let resp = await fetch('http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/status/area/lst/' + $.cookie('id_aero_selected')).then(response => response.json());
    let vhtml = '';
    let color = '';
    console.log(resp);
    resp.forEach(area => {
        if (area.VoltL7 == null || area.VoltL8 == null || area.VoltL9 == null) {
            color = 'light';
        } else {
            if (parseFloat(area.VoltL7) <= 117 || parseFloat(area.VoltL8) <= 117 || parseFloat(area.VoltL9) <= 117) {
                color = 'danger';
            } else {
                if (parseFloat(area.VoltL4) > 117 || parseFloat(area.VoltL5) > 117 || parseFloat(area.VoltL6) > 117) {
                    color = 'warning';
                } else {
                    if (parseFloat(area.VoltL1) > 117 || parseFloat(area.VoltL2) > 117 || parseFloat(area.VoltL3) > 117) {
                        color = 'success';
                    }
                }
            }
        }
        vhtml += '<td class="text-center"><button type="button" class=" btn btn-sm btn-' + color + ' rounded-pill" style="width: 5rem; height:5rem;">' + area.areaName + '</button></td>"';
        color = '';
    });
    $("#showAreas").html(vhtml);

}

async function getLogEvents() {
    let res = await fetch('http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/alarmas/lst').then(response => response.json());
    console.log(res);
    const tbody = $("#tablebody");
    let rows = '';
    res.forEach(log => {
        rows += '<tr><td>' + log.areaName + '</td><td>' + log.alarma + '</td><td>' + log.fechaAlarma + '</td></tr>';
    });
    tbody.html(rows);
}

function setupNewGraph(ctx, GType, GText) {
    const _ctx = document.getElementById(ctx);
    const config = {
        type: GType,
        data: {
            datasets: [{
                label: "Litros",
                borderWidth: 3,
                fill: false,
                // borderColor: '#0275D8',
                backgroundColor: [],
                tension: 0.2
            }]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    grace: 2,
                    min: 0,
                    max: 600,

                }
            },
            plugins: {
                title: {
                    display: true,
                    text: GText,
                    color: "#000000"
                },
                legend: {
                    labels: {
                        boxWidth: 0
                    }
                }
            }
        }
    }
    const myChartTMP = new Chart(_ctx, config);
    return myChartTMP;
}

setInterval(() => {
    if ($.cookie('id_aero_selected') != null) {
        console.log("Actualizando data");
        getLogEvents();
        getStatusArea();
        updateDieselGraph();
    }
}, 3000);

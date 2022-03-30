$(document).ready(function () {
    let ModalSelectAero = new bootstrap.Modal(document.getElementById('selecAero'));
    ModalSelectAero.show();

    $('#btnAero').click(function (event) {
        $.cookie('id_aero_selected', $("#selectAero").val(), { expires: 5 })
        console.log($.cookie('id_aero_selected'));
        ModalSelectAero.hide();
        getStatusArea();
        setupDieselGraph();
    });

});


var myChartDiesel = setupNewGraph('myChartDiesel', 'bar', 'Diesel por Planta');

async function setupDieselGraph() {
    let res = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/status/area/lst/' + $.cookie('id_aero_selected')).then(response => response.json());
    let i = 0;
    let litros = [1500, 1000, 1850, 950, 1700];
    let color = ['#ffc107', '#dc3545', '#198754', '#dc3545', '#198754',]
    res.forEach(value => {
        myChartDiesel.data.labels.push(value.areaName);
        myChartDiesel.data.datasets[0].data.push(litros[i]);
        myChartDiesel.data.datasets[0].backgroundColor.push(color[i]);
        i += 1;
    });
    myChartDiesel.update();
}
async function getStatusArea() {
    let resp = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/status/area/lst/' + $.cookie('id_aero_selected')).then(response => response.json());
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
    let res = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api//alarmas/lst').then(response => response.json());
    console.log(res);
    const tbody = document.querySelector('#tableAlertas tbody');
    tbody.innerHTML = '';
    res.forEach(log => {
        let fila = tbody.insertRow();
        fila.insertCell().innerHTML = log.areaName;
        fila.insertCell().innerHTML = log.alarma;
        fila.insertCell().innerHTML = log.fechaAlarma;
    });
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
                    grace: 2

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
    console.log("Actualizando data");
    getStatusArea();
    getLogEvents;
}, 3000);

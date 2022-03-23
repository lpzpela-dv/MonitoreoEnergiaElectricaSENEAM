$(document).ready(function () {
    let ModalSelectAero = new bootstrap.Modal(document.getElementById('selecAero'));
    ModalSelectAero.show();

    $('#btnAero').click(function (event) {
        $.cookie('id_aero_selected', $("#selectAero").val(), { expires: 5 })
        console.log($.cookie('id_aero_selected'));
        ModalSelectAero.hide();
        getStatusArea();
    });

});


async function getStatusArea() {
    let resp = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/status/area/lst/' + $.cookie('id_aero_selected')).then(response => response.json());
    let vhtml = '';
    let color = '';
    let v1, v2, v3 = '';
    console.log(resp);
    resp.forEach(area => {
        if (area.VoltL7 == null || area.VoltL8 == null || area.VoltL9 == null) {
            color = 'light';
            v1 = "N/A";
            v2 = "N/A";
            v3 = "N/A";
        } else {
            if (parseFloat(area.VoltL7) <= 117 || parseFloat(area.VoltL8) <= 117 || parseFloat(area.VoltL9) <= 117) {
                color = 'danger';
                v1 = area.VoltL7;
                v2 = area.VoltL8;
                v3 = area.VoltL9;
            } else {
                if (parseFloat(area.VoltL4) > 117 || parseFloat(area.VoltL5) > 117 || parseFloat(area.VoltL6) > 117) {
                    color = 'warning';
                    v1 = area.VoltL4;
                    v2 = area.VoltL5;
                    v3 = area.VoltL6;
                } else {
                    if (parseFloat(area.VoltL1) > 117 || parseFloat(area.VoltL2) > 117 || parseFloat(area.VoltL3) > 117) {
                        color = 'success';
                        v1 = area.VoltL1;
                        v2 = area.VoltL2;
                        v3 = area.VoltL3;
                    }
                }
            }
        }
        vhtml += '<td class="text-center"><span tabindex="0" data-bs-toggle="popover" title="Ultima Lectura" data-bs-trigger="hover focus" data-bs-content="Fase1: ' + v1 + 'v Fase2: ' + v2 + 'v Fase3: ' + v3 + 'v"><button type="button" class=" btn btn-sm btn-' + color + ' rounded-pill" style="width: 5rem; height:5rem;">' + area.areaName + '</button></span></td>"';
        color = '';
        v1, v2, v3 = '';
    });
    $("#showAreas").html(vhtml);
    preparePoper()

    function preparePoper() {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    }
}

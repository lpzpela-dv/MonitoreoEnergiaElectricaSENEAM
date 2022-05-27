$(document).ready(() => {
    $('#datetimepicker1').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        locale: {
            format: 'YYYY/MM/DD HH:mm'
        }
    });
    let ModalSelectAero = new bootstrap.Modal(document.getElementById('selecAero'));
    $('#btnAero').click(function (event) {
        $.cookie('id_aero_selected', $("#selectAero").val(), { expires: 1, path: '/MonitoreoEnergiaElectricaSENEAM/public' })
        console.log($.cookie('id_aero_selected'));
        ModalSelectAero.hide();
        $(location).attr('pathname', 'MonitoreoEnergiaElectricaSENEAM/public/');
        // location.reload();
    });
    $('#changeAero').click(function (e) {
        ModalSelectAero.show();
        return false;
    });
})

function download() {
    $.ajax({
        url: "download",
        method: 'post',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'fecha': $("#datetimepicker1").val(),
            'areaID': $("#areaID").val(),
            'fuenteID': $("#fuenteID").val(),
            'datosID': $("#datoID").val()
        },
        dataType: 'json',
        success: function (res) {
            const url = window.URL.createObjectURL(new Blob([res.data]));
            const link = document.createElement('a');
            link.setAttribute('download', 'file.xlsx');
            document.body.appendChild(link);
            link.click();
            console.log('Respuesta endpoint')
            console.log(res)
        }
    });
}
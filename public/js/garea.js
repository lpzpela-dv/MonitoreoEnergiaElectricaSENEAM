$(document).ready(() => {
    var myModal;
    var myModal2;
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
});

function deleteArea(area) {
    $.get("../area/" + area, function (data) {
        console.log(data);
        $("#textDelet").empty();
        $("#textDelet").append("Estas seguro de eliminar al area " + data.areaName);
        $("#btnEliminar").attr('onClick', 'confirmDelete(' + data.id + ')');
        myModal = new bootstrap.Modal(document.getElementById('areaDeleteModal'));
        myModal.show();
    })

}

function editArea(area) {
    $.get("../area/" + area, function (data) {
        $("#btnconfirm").attr('onclick', "updateArea(" + data.id + ")");
        $("#edareaName").val(data.areaName);
        $("#edmaxDiesel").val(data.maxDiesel);
        myModal2 = new bootstrap.Modal(document.getElementById('editAreaModal'));
        myModal2.show();
    })
}
function updateArea(id) {
    let areaName = $("#edareaName").val();
    let maxDiesel = $("#edmaxDiesel").val();
    $.ajax({
        url: "../area/" + id,
        method: 'put',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'areaName': areaName,
            'maxDiesel': maxDiesel
        },
        dataType: 'json',
        success: function (res) {
            console.log(res);
            myModal2.hide();
        }
    });
    location.reload();
    return false;
}

function confirmDelete(id) {
    $.ajax({
        url: "../area/" + id,
        method: 'delete',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') },
        dataType: 'json',
        success: function (res) {
            console.log(res);
            if (res.status == "success") {
                $("#row" + res.id).remove();
            } else {
                console.log(res);
            }
            myModal.hide();
        }
    });
}

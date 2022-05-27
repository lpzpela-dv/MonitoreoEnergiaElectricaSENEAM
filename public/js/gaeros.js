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

function deleteAero(aero) {
    $.get("aero/" + aero, function (data) {
        $("#textDelet").empty();
        $("#textDelet").append("Estas seguro de eliminar al aeropuerto " + data.description);
        $("#btnEliminar").attr('onClick', 'confirmDelete(' + data.id + ')');
        myModal = new bootstrap.Modal(document.getElementById('aeroDeleteModal'));
        myModal.show();
    })

}

function editAero(aero) {
    $.get("aero/" + aero, function (data) {
        console.log(data);
        $("#aeroForm").attr('action', "http://localhost/MonitoreoEnergiaElectricaSENEAM/public/aero/" + data.id);
        $("#btnconfirm").attr('onclick', "updateAero(" + data.id + ")");
        $("#edshortName").val(data.shortName);
        $("#eddesc").val(data.description);
        myModal2 = new bootstrap.Modal(document.getElementById('editAeroModal'));
        myModal2.show();
    })
    $("#edshortName").val("");
    $("#eddesc").val("");
}
function updateAero(id) {
    let shortName = $("#edshortName").val();
    let description = $("#eddesc").val();
    $.ajax({
        url: "aero/" + id,
        method: 'put',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'shortName': shortName,
            'description': description
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
        url: "aero/" + id,
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

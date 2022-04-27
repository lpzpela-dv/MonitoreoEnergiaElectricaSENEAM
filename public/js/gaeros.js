$(document).ready(() => {
    var myModal;
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
        console.log($("#aeroForm").attr('action'));
        $("#edshortName").val(data.shortName);
        $("#eddesc").val(data.description);
        let myModal2 = new bootstrap.Modal(document.getElementById('editAeroModal'));
        myModal2.show();
    })
    $("#edshortName").val("");
    $("#eddesc").val("");
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

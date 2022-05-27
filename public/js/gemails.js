$(document).ready(() => {
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

// function deleteUser(user) {
//     $.get("user/" + user, function (data) {
//         $("#textDelet").empty();
//         $("#textDelet").append("Estas seguro de eliminar al usuario " + data.name);
//         $("#btnEliminar").attr('onClick', 'confirmDelete(' + data.id + ')');
//         let myModal = new bootstrap.Modal(document.getElementById('userDeleteModal'));
//         myModal.show();
//     })

// }

function editNotif(notifID) {
    $("#hdnotify").val("");
    $("#txtemails").val("");
    console.log(notifID);
    $.get("api/notif/" + notifID, function (data) {
        console.log(data);
        $("#hdnotify").val(data.id);
        $("#txtemails").val(data.emails);
        let myModal = new bootstrap.Modal(document.getElementById('EditEmails'));
        myModal.show();
    })

}

// function confirmDelete(id) {
//     $.ajax({
//         url: "user/" + id,
//         method: 'delete',
//         data: { '_token': $('meta[name="csrf-token"]').attr('content') },
//         dataType: 'json',
//         success: function (res) {
//             if (res.status == "success") {
//                 $("#row" + res.id).remove();
//             } else {
//                 console.log(res);
//             }
//         }
//     });
// }

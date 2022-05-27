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

function deleteUser(user) {
    $.get("user/" + user, function (data) {
        $("#textDelet").empty();
        $("#textDelet").append("Estas seguro de eliminar al usuario " + data.name);
        $("#btnEliminar").attr('onClick', 'confirmDelete(' + data.id + ')');
        myModal = new bootstrap.Modal(document.getElementById('userDeleteModal'));
        myModal.show();
    })

}

$('#enableInput').change(function () {
    console.log(this.checked);
    if (this.checked) {
        $('#passwordE').prop("disabled", false);
        $('#password-confirmE').prop("disabled", false);
    } else {
        $('#passwordE').prop("disabled", true);
        $('#password-confirmE').prop("disabled", true);
    }
});

function editUser(user) {
    $("#msgPass").html("");
    $.get("user/" + user, function (data) {
        console.log(data);
        $("#btnconfirm").attr('onclick', "updateUser(" + data.id + ")");
        $("#nameE").val(data.name);
        $("#emailE").val(data.email);
        myModal2 = new bootstrap.Modal(document.getElementById('EditUserModal'));
        myModal2.show();
    })

}

function updateUser(id) {
    let nameE = $("#nameE").val();
    let emailE = $("#emailE").val();
    let tpass;
    if ($("#enableInput").is(':checked')) {
        tpass = true;
    } else {
        tpass = false;
    }
    let pass = $("#passwordE").val();
    let confpass = $("#password-confirmE").val();
    if (tpass && pass != confpass) {
        $("#msgPass").html("").html("<strong style='color:red;'>La contraseña no coincide</strong>");
    } else {
        $("#msgPass").html("");
        $.ajax({
            url: "user/" + id,
            method: 'put',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'name': nameE,
                'email': emailE,
                'password': confpass,
                'tpass': tpass
            },
            dataType: 'json',
            success: function (res) {
                console.log(res);
                myModal2.hide();
                location.reload();
            }
        });
    }
    return false;
}

function confirmDelete(id) {
    $.ajax({
        url: "user/" + id,
        method: 'delete',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') },
        dataType: 'json',
        success: function (res) {
            if (res.status == "success") {
                $("#row" + res.id).remove();
            } else {
                console.log(res);
            }
            myModal.hide();
        }
    });
}

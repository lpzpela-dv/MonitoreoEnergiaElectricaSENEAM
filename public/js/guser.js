function deleteUser(user) {
    $.get("user/" + user, function (data) {
        $("#textDelet").empty();
        $("#textDelet").append("Estas seguro de eliminar al usuario " + data.name);
        $("#btnEliminar").attr('onClick', 'confirmDelete(' + data.id + ')');
        let myModal = new bootstrap.Modal(document.getElementById('userDeleteModal'));
        myModal.show();
    })

}

function editUser(user) {
    $.get("user/" + user, function (data) {
        console.log(data);
        $("#name").val(data.name);
        $("#email").val(data.email);
        let myModal = new bootstrap.Modal(document.getElementById('AddUserModal'));
        myModal.show();
    })

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
        }
    });
}

                        // let reg = ""
                        // $.get("api/user/lst", function (users) {
                        //     console.log(users);
                        //     users.forEach(element => {
                        //         if (element.rol == 2) {
                        //             var rol = "Administrador";
                        //         } else {
                        //             var rol = "Supervisor";
                        //         }

                        //         reg += "" + "<tr><th>" + element.name + "</th><td>" + element.email + "</td><td>" + rol + "</td><td>" + '<button type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button><button type="button" class="btn btn-outline-danger" onclick="deleteUser(' + element.id + ')"><i class="fa-solid fa-trash"></i></button>' + "</td></tr>";

                        //     });
                        //     console.log(reg)
                        //     $('tbody').append(reg);
                        //     //Realizar un foreach y hacer un append altbody para mostrar usuarios y probar
                        // })
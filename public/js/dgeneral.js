$(document).ready(function () {
    let ModalSelectAero = new bootstrap.Modal(document.getElementById('selecAero'));
    ModalSelectAero.show();

    $('#btnAero').click(function (event) {
        $.cookie('id_aero_selected', $("#selectAero").val(), { expires: 5 })
        console.log($.cookie('id_aero_selected'));
        ModalSelectAero.hide();
    });
});


function setStatusArea() {
    //consulta api

    //barrido y pintar
}

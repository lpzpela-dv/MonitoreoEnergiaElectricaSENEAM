$(document).ready(() => {
    $('#datetimepicker1').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        locale: {
            format: 'YYYY/MM/DD HH:mm'
        }
    });
})
var emp;

$( document ).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$("#radio_both").change(function() {
    if ($("#radio_both").is(':checked')) {
        $('#dlist').attr("list", "list_both");
    }
});

$("#radio_employee").change(function() {
    if ($("#radio_employee").is(':checked')) {
        $('#dlist').attr("list", "list_employee");
    }
});

$("#radio_student").change(function() {
    if ($("#radio_student").is(':checked')) {
        $('#dlist').attr("list", "list_student");
    }
});

$('#btn-edit').click(function() {
    if (emp == '-1') {
        $('#employee').hide();
        $('#employee_type').attr('disabled', true);
    }
    $('#btn-save-emp').hide();
    
    var inputs = $('#userForm :input');
    $.each(inputs, function(i, v) {
        $(v).removeAttr('disabled');
    });
    $('#btn-save').show();
    $('#btn-save').removeAttr('disabled');
});

$('#btn-employee').click(function() {
    if (emp == undefined) {
        emp = $('#employee_type option:selected').val()
    }
    
    var inputs = $('#userForm :input');
    $.each(inputs, function(i, v) {
        $(v).attr('disabled', true);
    });
    $('#btn-save').hide();
    
    $('#employee').show();
    $('#employee_type').removeAttr('disabled');
    $('#btn-save-emp').show();
    $('#btn-save-emp').removeAttr('disabled');
});
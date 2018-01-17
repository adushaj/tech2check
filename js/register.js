// $('#regerror').load(document.URL +  ' #regerror');
$("#next1").click(function() {
    if (!$("#username").val() || !$("#email").val() || !$("#password").val()) {
        $("#regerror").text("Please fill out all fields on this page before continuing.");
    } else {
        $('#regerror').load(document.URL +  ' #regerror');
    }
});
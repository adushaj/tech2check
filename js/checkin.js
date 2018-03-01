function checkin(button) {
    var cont = confirm('Are you sure you want to check in this equipment?');
    if (!cont) {
        return;
    }
    
    // queryParameters -> handles the query string parameters
    // queryString -> the query string without the fist '?' character
    // re -> the regular expression
    // m -> holds the string matching the regular expression
    var queryParameters = {}, queryString = location.search.substring(1),
        re = /([^&=]+)=([^&]*)/g, m;
    
    // Creates a map with the query string parameters
    while (m = re.exec(queryString)) {
        queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }
    
    // Add new parameters or update existing ones
    queryParameters['rental_id'] = $(button).val();
    queryParameters['notes'];
    queryParameters['status_id'];
    
    // Replace the query portion of the URL.
    // jQuery.param() -> create a serialized representation of an array or
    //    object, suitable for use in a URL query string or Ajax request.
    var new_url = "push/checkinpush.php?" + $.param(queryParameters);
    location.href = new_url; // Causes page to reload
}

$( document ).ready(function() {
    var $rows = $('#checkin-table tbody tr');
    $('#search').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        
        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
});
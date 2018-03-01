var queryParameters = {}, queryString = location.search.substring(1),
re = /([^&=]+)=([^&]*)/g, m;

while (m = re.exec(queryString)) {
   queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
}
if (queryParameters['type_id'] != null) {
   $('#selectModel').show();
   
   if (queryParameters['model_id'] != null) {
      $('#reserveIDs').show();
   }
}
if (queryParameters['serial'] != null) {
   $('#reserveIDs').show();
}

$( document ).ready(function() {

   $('#sel_type').on('change', function() {
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
      queryParameters['type_id'] = $("#sel_type").val();
      delete queryParameters['model_id'];
      delete queryParameters['serial'];
      
      // Replace the query portion of the URL.
      // jQuery.param() -> create a serialized representation of an array or
      //    object, suitable for use in a URL query string or Ajax request.
      location.search = $.param(queryParameters); // Causes page to reload
   });
   
   $('#sel_model').on('change', function() {
      var queryParameters = {}, queryString = location.search.substring(1),
      re = /([^&=]+)=([^&]*)/g, m;
      
      while (m = re.exec(queryString)) {
         queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
      }
      
      queryParameters['model_id'] = $("#sel_model").val();
      delete queryParameters['serial'];
      
      location.search = $.param(queryParameters);
   });

});

function checkout(button, i) {
   var username = '';
   var reserved = -1;
   if ($(i + ' #reserved').text() == 'N/A') {
      username = prompt("Please enter the students username:");
      if (username == null) {
         return;
      }
   } else {
      username = $(i + ' #reserved').text();
      reserved = $(i + ' #reserved').attr('res');
   }
   
   var queryParameters = {}, queryString = location.search.substring(1),
   re = /([^&=]+)=([^&]*)/g, m;
   
   while (m = re.exec(queryString)) {
      queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
   }
   
   queryParameters['username'] = username;
   queryParameters['reserved'] = reserved;
   queryParameters['serial'] = $(button).val();
   queryParameters['model_id'] = $(i + ' #model').text();
   
   var new_url = "push/checkoutpush.php?" + $.param(queryParameters);
   location.href = new_url;
}

function serialSearch() {
   var queryParameters = {}, queryString = location.search.substring(1),
   re = /([^&=]+)=([^&]*)/g, m;
   
   while (m = re.exec(queryString)) {
      queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
   }
   
   queryParameters['serial'] = $('#serial').val();
   delete queryParameters['model_id'];
   delete queryParameters['type_id'];
   
   location.search = $.param(queryParameters);
}



//  https://css-tricks.com/dynamic-dropdowns/

// https://stackoverflow.com/questions/47136615/how-to-change-a-select-option-based-on-choosing-other-select-option

// http://roshanbh.com.np/2008/01/populate-triple-drop-down-list-change-options-value-from-database-using-ajax-and-php.html
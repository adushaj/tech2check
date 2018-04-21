var queryParameters = {}, queryString = location.search.substring(1),
re = /([^&=]+)=([^&]*)/g, m;

while (m = re.exec(queryString)) {
   queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
}
if (queryParameters['type_id'] != null) {
   $('#selectModel').show();
   
   if (queryParameters['model_id'] != null) {
      $('#reserveIDs').show();
      $('#block').hide();
   }
}
if (queryParameters['serial'] != null) {
   $('#reserveIDs').show();
   $('#block').hide();
}

$( document ).ready(function() {
   
   if ('q' in queryParameters) {
      $('#modal_' + queryParameters['q']).modal('show');
   }

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
      delete queryParameters['lname'];
      delete queryParameters['q'];
      
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
      delete queryParameters['lname'];
      delete queryParameters['q'];
      
      location.search = $.param(queryParameters);
   });

});

function serialSearch() {
   var queryParameters = {}, queryString = location.search.substring(1),
   re = /([^&=]+)=([^&]*)/g, m;
   
   while (m = re.exec(queryString)) {
      queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
   }
   
   queryParameters['serial'] = $('#serial').val();
   delete queryParameters['model_id'];
   delete queryParameters['type_id'];
   delete queryParameters['lname'];
   delete queryParameters['q'];
   
   location.search = $.param(queryParameters);
}

// Get the input field
var input = document.getElementById("serial");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Cancel the default action, if needed
  event.preventDefault();
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Trigger the button element with a click
   //  document.getElementById("myBtn").click();
      serialSearch();
  }
}); 
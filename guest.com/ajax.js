
 $("#getform").click(function(e)
 {
	$("#postmess").toggle();
	
 }); 
 $().click(function ()
 {
	$("#postmess").hide();
 });
 
 $(function() {
  $('#postmess').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting via the browser
    var form = $(this);
    $.ajax({
	  success : function ()  { form.hide()},  
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize()
    }).done(function(data) {
      
    }).fail(function(data) {
      // Optionally alert the user of an error here...
    });
  });
});
 
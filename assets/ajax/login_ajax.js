$("#signin_form").submit(function(e){
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: 'signin/ajax_login',
    data: $(this).serialize(),
    success:function(data)
    {
      if(data === 'loggedin')
      {
        $("#error_box").html("<p style=\"color:white; padding:10px; text-align:center;\" class=\"bg-success\">Logged In Successfully</p>");
        setTimeout(function(){
          window.location = "dashboard";
        },1000);
      }
      else if(data === 'notloggedin')
      {
        $("#error_box").html("<p style=\"color:white; padding:10px; text-align:center;\" class=\"bg-danger\">Username Or Password May Invalid</p>");
      }
      else
      {
        $("#error_box").html("<div style=\" color:white; padding:10px; margin-bottom:10px; text-align:center;\" class=\"bg-warning\">"+data+"</div>");
      }
    }
  });
});

//End of file login_alax.js
//Location : ./assets/ajax/login_ajax.js
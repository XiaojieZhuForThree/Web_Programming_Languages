$(document).ready(function() {

    $("#username").after("<span id = 'forUsername'></span>");
    $('#forUsername').hide(); 
    $("#password").after("<span id = 'forPassword'></span>");
    $('#forPassword').hide(); 
    $("#email").after("<span id = 'forEmail'></span>"); 
    $('#forEmail').hide();       

    $("#username").focus(function() {
        inform("#username");
    });

    $("#password").focus(function() {
        inform("#password");
    });

    $("#email").focus(function() {
        inform("#email");
    });

    $("#username").blur(function() {
        validate("#username");
    });

    $("#password").blur(function() {
        validate("#password");
    });

    $("#email").blur(function() {
        validate("#email");
    });

   function validate(e){

      var username = $('#username').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var validEmail = new RegExp('^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{3,}$');  

      if (e == "#username"){
        if (username.length == 0) {
          $("#forUsername").hide();
        } else if (!username.match("^[a-zA-Z0-9]*$")){
          $("#forUsername").attr("class", "error");    
          $("#forUsername").text("Error");
          $("#forUsername").show();         
        } else {
          $("#forUsername").attr("class", "ok");    
          $("#forUsername").text("ok");
          $("#forUsername").show();         
        }
      } else if (e == "#email") {
        if (email.length == 0) {
          $("#forEmail").hide();
        } else if (!validEmail.test(email)){
          $("#forEmail").attr("class", "error");    
          $("#forEmail").text("Error");
          $("#forEmail").show(); 
          }
          else {
          $("#forEmail").attr("class", "ok");    
          $("#forEmail").text("ok");
          $("#forEmail").show();            
          }      
      } else if (e == "#password") {
        if (password.length == 0) {
          $("#forPassword").hide();        
        } else if (password.length < 6) {
          $("#forPassword").attr("class", "error");    
          $("#forPassword").text("Error");
          $("#forPassword").show(); 
        }
        else {
          $("#forPassword").attr("class", "ok");    
          $("#forPassword").text("ok");
          $("#forPassword").show();         
        }      
      }
    }

    function inform(e){
      if (e == "#username"){
        $("#forUsername").attr("class", "info");    
        $("#forUsername").text("The username field must contain only alphabetical or numeric characters.");
        $("#forUsername").show(); 
      }
      else if (e == "#email"){
        $("#forEmail").attr("class", "info");    
        $("#forEmail").text("The email field should be a valid email address (abc@def.xyz).");
        $("#forEmail").show();        
      }
      else if (e == "#password"){
        $("#forPassword").attr("class", "info");    
        $("#forPassword").text("The password field should be at least six characters long.");
        $("#forPassword").show();   
      }
    }
      
});

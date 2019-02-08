$(document).ready(function() {
    /* When the page is fully loaded, insert a <span> notification element immediately 
      after each form field and initially hide them. */
    $("#username").after("<span id = 'forUsername'></span>");
    $('#forUsername').hide(); 
    $("#password").after("<span id = 'forPassword'></span>");
    $('#forPassword').hide(); 
    $("#email").after("<span id = 'forEmail'></span>"); 
    $('#forEmail').hide();       

    /*When the field is currently being edited, call the inform function to 
    set the notification text as infoMessage, class as “info”, and make visible.*/
    $("#username").focus(function() {
        inform("#forUsername");
    });

    $("#password").focus(function() {
        inform("#forPassword");
    });

    $("#email").focus(function() {
        inform("#forEmail");
    });

    /* When the field is not being edited, call the validate function to 
    determine if the input is valid or not, and print the notification accordingly */
    $("#username").blur(function() {
        validate("#username","#forUsername");
    });

    $("#password").blur(function() {
        validate("#password","#forPassword");
    });

    $("#email").blur(function() {
        validate("#email", "#forEmail");
    });

    // the validate function to determine whether the input value is valid or not
   function validate(e, f){
      var value = $(e).val();
      var validEmail = new RegExp('^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{3,3}$');
      var hide = false;  
      var valid = true;
      if (value.length == 0){
        hide = true;
      } else if (e == "#username" && !value.match("^[a-zA-Z0-9]*$")){
        valid = false;
      } else if (e == "#email" && !validEmail.test(value)){
        valid = false;
      } else if (e == "#password" && value.length < 6) {
        valid = false;
      }
      
      if (hide) {
        $(f).hide();
      } else if (valid == false) {
          $(f).attr("class", "error");    
          $(f).text("Error");
          $(f).show();         
        } else {
          $(f).attr("class", "ok");    
          $(f).text("ok");
          $(f).show();       
        }
    }

    // the inform function to pop out the notification information for the user when inputting values
    function inform(e){
        $(e).attr("class", "info"); 
        $(e).show();        
      if (e == "#forUsername"){   
        $(e).text("The username field must contain only alphabetical or numeric characters.");
      }
      else if (e == "#forEmail"){   
        $(e).text("The email field should be a valid email address (abc@def.xyz).");       
      }
      else if (e == "#forPassword"){   
        $(e).text("The password field should be at least six characters long.");
      }
    }     
});

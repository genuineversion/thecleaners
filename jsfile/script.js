$(registerPage) .click(function(){

 $(myRegistrationForm) .show('slow');

});



$(registerPage) .click(function(){

    $(myLoginForm,myForgotPw).hide('fast');
   
   
   });
   


$(loginPage) .click(function(){

    $(myLoginForm) .show('slow');
   
   });



   
$(loginPage) .click(function(){

  $(myRegistrationForm,myForgotPw).hide('fast');
    
   
   
   });




   $(forgotPwPage) .click(function(){

    $(myForgotPw) .show('slow');
   
   });


   
   $(forgotPwPage) .click(function(){

    $(myLoginForm, myRegistrationForm).hide('fast');
    
 
   });





   
$(function() {
    $("form").on("submit", function() {
	if (validateUserPassword() && validateUsername() && validateUserEmail()) {
	    let form_data = $('form').serialize();
	    
	    $.post("https://prodevdz.tech/SmartCarMaintenance/php/add_user.php",
		   form_data, function(response){
		       console.log(response);

		       if (response == 'duplicate_email'){
			   alert('This email address is already in use!');
			   location.reload();
			   return false;
		       }
		       else if (response == 'duplicate_username') {
			   alert('This username is already in use!');
			   location.reload();
			   return false;
		       }
		       else if (response == 'true') {
			   alert('Successfully added a user!');
			   setTimeout(function() {
			       window.location = 'login.html';
			   }, 2000);
		       }
		       else {
			   alert('Failed to register for some reason?');
		       }
		   })
	}
	else {
	    return false;
	    //location.reload();
	}
    })
})


function validateUsername() {
    if($('#username').val().length == 0)
    {
	alert('Username cannot be empty');
	return false;
    }
    else {
	return true;
    }
    
}
function validateUserPassword(){
    if($('#password').val().length== 0)
    {
	alert('Password cannot be empty');
	return false;
	
    }

    if ($('#password').val() != $('#confirm_password').val()){
	alert('Password could not be confirmed');
	return false;
    }
    
    return true;
   
}

function validateUserEmail(){
    if($('#email').val().length== 0)
    {
	alert('Email cannot be empty');
	return false;
	
    }
/*
    if ($('#confirm_email').val() != $('#email').val()) {
	alert('Email does not match the confirm email');
	return false;
    }
  */  
    return true;
}



$(function(){
    $("form").on("submit", function(){
	if (validateUsername() && validateUserPassword()) {
	    // Create our XMLHttpRequest object
	    var hr = new XMLHttpRequest();
	    var url = "https://prodevdz.tech/SmartCarMaintenance/php/login_user.php";
	    // Create some variables we need to send to our PHP file
	    var username = document.getElementById("username").value;
	    var password = document.getElementById("password").value;
	    var vars = "username="+username+"&password="+password;
	    hr.open("POST", url, true);
	    // Set content type header information for sending url encoded variables in the request
	    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    // Access the onreadystatechange event for the XMLHttpRequest object
	    hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
		    if (return_data != 'Login failed') {
			sessionStorage.setItem('username', username);
			sessionStorage.setItem('password', password);
			sessionStorage.setItem('email', return_data);
			sessionStorage.setItem('status', 'Logged_in');
			window.location = 'index.html';
		    }
		    else {
			alert('Invalid username or password! Try again.');
			window.location = 'login.html';
		    }
		}
	    }
	    // Send the data to PHP now... and wait for response to update the status div
	    hr.send(vars); // Actually execute the request
	    
	}
	else {
	    window.location.href = 'login.html';
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
    else {
	return true;
    }
}

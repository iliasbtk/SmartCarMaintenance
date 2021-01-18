function check_email(){
    return true;
}

function email_password(){
    if (check_email()) {
	let hr = new XMLHttpRequest();
	let url = "https://prodevdz.tech/SmartCarMaintenance/php/email_password.php";
	let email = document.getElementById("recover_email").value;
	let vars = "email="+email;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		var return_data = hr.responseText;
		if (return_data == 'success') {
		    alert("Your password has been emailed to " + email);
		    window.location.href = 'login.html';
		    return true;
		}
		else if (return_data == 'email_not_found'){
		    alert('This email address does not exist, try again please');
		    return false;
		}
		else{
		    alert('Unexpected error!');
		    return false;
		}
		
		
	    }
	}
	hr.send(vars);
	
    }
    else {
	
	return false;
    }
}

function check_password_form(){
    if (document.getElementById("old_pass").value != sessionStorage['password']) { 
	alert('Your old password is incorrect');
	document.getElementById('old_pass').focus;
	document.getElementById('change_password_form').reset();
	return false;
    }

    if (document.getElementById("new_pass").value == '') {
	alert('Your new password cannot be empty');
	document.getElementById('new_pass').focus;
	return false;
    }

    if (document.getElementById("new_pass").value != document.getElementById("confirm_new_pass").value){
	alert('Your new password mismatches with the confirm new password');
	document.getElementById('confirm_new_pass').focus;
	return false
    }
	

    return true;
}


function check_email_form(){
    if (document.getElementById("new_email").value == '') {
	new_email_is_empty = true;
    }

    if (document.getElementById("new_email").value == ''){
    	alert('Error : New email cannot be empty!');
	document.getElementById("new_email").focus();
	return false;
    }

    if (document.getElementById("confirm_new_email").value !=
	document.getElementById("new_email").value) {
	alert('The New email and the confirm email do not match!');
	document.getElementById("confirm_new_email").focus();
	return false;
    }

    return true;
}


function reset_email_form(){
    document.getElementById('change_email_form').reset();
    //location.reload();
}

function reset_password_form(){
    document.getElementById('change_password_form').reset();
}

function change_email(){
    if (check_email_form()){
	
	let hr = new XMLHttpRequest();
	let url = "https://prodevdz.tech/SmartCarMaintenance/php/change_email.php";
	let username = sessionStorage['username'];
	let email = document.getElementById("new_email").value;
	let confirm_email = document.getElementById("confirm_new_email").value;
	
	let vars ="username="+username+"&email="+email;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		var return_data = hr.responseText;
		if (return_data == 'true') {
		    alert("Your email has been changed. Check your new email address inbox. You should have received an email.");
		}
		else {
		    alert('Password change failed. Try again :-(');
		}
		//reset_email_form();
		sessionStorage.setItem('email', email);
		document.getElementById('change_email_form').reset();
		sessionStorage.setItem('email', email);
		location.reload();
	    }
	}
	// Send the data to PHP now... and wait for response to update the status div
	hr.send(vars); // Actually execute the request
    }
    else
    {
	return false;
    }
	
}

function change_password(){

    if (check_password_form()) {
	let hr = new XMLHttpRequest();
	let url = "https://prodevdz.tech/SmartCarMaintenance/php/change_password.php";
	let username = sessionStorage['username'];
	let password = document.getElementById("new_pass").value;
	//alert('New password = ' + password);
	let vars ="username="+username+"&password="+password;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		var return_data = hr.responseText;
		if (return_data == 'true') {
		    alert("Your password has been changed. You're being logged out");
		    sessionStorage.setItem('status', 'Logged_out');
		    sessionStorage.clear();
		    window.location = 'login.html';
		}
		else {
		    alert('Password change failed. Try again :-(');
		    location.reload();
		}
	    }
	}
	// Send the data to PHP now... and wait for response to update the status div
	hr.send(vars); // Actually execute the request
    }
    else
    {
	return false;
    }

}

function delete_account(user_name){
    alert("Your account has been removed and all the data associated with this account has been permenantly deleted.");
    
    let hr = new XMLHttpRequest();
    let url = "https://prodevdz.tech/SmartCarMaintenance/php/delete_account.php";
    let vars ="username="+user_name;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	if(hr.readyState == 4 && hr.status == 200) {
	    var return_data = hr.responseText;
	    if (return_data == 'true') {
		alert("Your account has been removed and all the data associated with this account has been permenantly deleted.");
		window.location = 'login.html';
	    }
	    else {
		alert('Deleting account failed');
		location.reload();
	    }
	}
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}

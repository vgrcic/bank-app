$(document).ready(function () {

	$("input").focus(function() {
		$(this).next(".error").text("");
	});

});



function validateLoginForm() {

	if ($("#email").val().trim() == "") {
		$("#email").next(".error").text("Enter your email address");
		return false;
	}

	if ($("#password").val().trim() == "") {
		$("#password").next(".error").text("Enter your password");
		return false;
	}

	return true;

}



function validateRegistrationForm() {
	
	var fields = ['first_name', 'last_name', 'email', 'password', 'password_confirmation'];

	var errors = {
		first_name : 'Enter your first name',
		last_name : 'Enter your last name',
		email : 'Enter your e-mail address',
		password : 'Enter your password',
		password_confirmation : 'Enter your password again'
	}

	for (i = 0; i < fields.length; i++) {
		if ($("#" + fields[i]).val().trim() == "") {
			$("#" + fields[i]).next(".error").text(errors[fields[i]]);
			return false;
		}
	}
	
	if ($("#password").val() != $("#password_confirmation").val()) {
		$("#password_confirmation").next(".error").text("Your password and confirmation do not match");
		return false;
	}

	return true;

}



function validateBankCreationForm() {

	if ($("#name").val().trim() == "") {
		$("#name").next(".error").text("Enter the name of the bank");
		return false;
	} return true;

}
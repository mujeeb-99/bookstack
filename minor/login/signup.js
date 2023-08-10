function validateForm() {
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var confirm_password = document.getElementById("confirm_password").value;
	var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").value;
  
	if (password != confirm_password) {
	  alert("Passwords do not match");
	  return false;
	}
  
	if (!/^\w{10}$/.test(username)) {
	  alert("Username must be 10 characters long and contain only alphanumeric characters and underscore");
	  return false;
	}
  
	if (!/^\w{10}$/.test(password)) {
	  alert("Password must be 10 characters long and contain only alphanumeric characters");
	  return false;
	}
  
	if (!/^\d{10}$/.test(phone)) {
	  alert("Invalid phone number");
	  return false;
	}
  
	if (!/\S+@\S+\.\S+/.test(email)) {
	  alert("Invalid email address");
	  return false;
	}
  
	return true;
  }
  

function validateForm() {
	var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (!/^\w{10}$/.test(username)) {
        alert("Username must be 10 characters long and contain only alphanumeric characters and underscore");
        return false;
      }
    
      if (!/^\w{10}$/.test(password)) {
        alert("Password must be 10 characters long and contain only alphanumeric characters");
        return false;
      }
      return true;
  }
  
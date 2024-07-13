function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    
    var usernameRegex = /^[a-zA-Z0-9_]{3,15}$/;
    var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

    if (username.trim() === '' || email.trim() === '' || password.trim() === '') {
        alert("All fields are required");
        return false;
    }
    if (!usernameRegex.test(username)) {
        alert("Username must be 3-15 characters long and can contain letters, numbers, and underscores only");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (!passwordRegex.test(password)) {
        alert("Password must contain at least 8 characters, including uppercase, lowercase letters, and numbers");
        return false;
    }

    return true; 
}
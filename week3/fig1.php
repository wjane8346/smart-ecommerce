<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>

<h2>Login Form</h2>

<form>
    Email: <input type="text" id="email"><br><br>
    Password: <input type="password" id="password"><br><br>
    <button type="button" onclick="checkForm()">Login</button>
</form>

<p id="message"></p>

<script>
function checkForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var msg = document.getElementById('message');
    
    if (email === "") {
        msg.innerHTML = "Email is required";
        msg.style.color = "red";
    }
    else if (password === "") {
        msg.innerHTML = "Password is required";
        msg.style.color = "red";
    }
    else if (password.length < 4) {
        msg.innerHTML = "Password must be at least 4 characters";
        msg.style.color = "red";
    }
    else {
        msg.innerHTML = "Success! Form is valid";
        msg.style.color = "green";
    }
}
</script>

</body>
</html>
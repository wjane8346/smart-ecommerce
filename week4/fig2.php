<!DOCTYPE html>
<html>
<head>
    <title>Registration, Login & Contact Forms - Smart E-Commerce</title>
    <style>
        body {
            font-family: Arial;
            background: #F5F5F5;
            margin: 50px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .tabs {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background: #f0f0f0;
            margin-right: 5px;
            border-radius: 5px 5px 0 0;
        }
        .tab.active {
            background: #2C3E66;
            color: white;
        }
        .form-content {
            display: none;
        }
        .form-content.active-form {
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #2C3E66;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #1a2a4a;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            display: none;
        }
        .result-success {
            background: #e8f8e8;
            color: #27AE60;
            border: 1px solid #27AE60;
        }
        .result-error {
            background: #ffe8e8;
            color: #E67E22;
            border: 1px solid #E67E22;
        }
        h2 {
            color: #2C3E66;
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Smart E-Commerce Account</h2>
    
    <div class="tabs">
        <div class="tab active" onclick="showForm('register')">Register</div>
        <div class="tab" onclick="showForm('login')">Login</div>
        <div class="tab" onclick="showForm('contact')">Contact</div>
    </div>
    
    <!-- REGISTRATION FORM -->
    <div id="registerForm" class="form-content active-form">
        <h3>Create New Account</h3>
        <form id="registerFormElement">
            <input type="text" id="regName" placeholder="Full Name" required>
            <input type="email" id="regEmail" placeholder="Email Address" required>
            <input type="password" id="regPassword" placeholder="Password (min 4 characters)" required>
            <input type="password" id="regConfirm" placeholder="Confirm Password" required>
            <button type="button" onclick="submitRegister()">Register</button>
        </form>
    </div>
    
    <!-- LOGIN FORM -->
    <div id="loginForm" class="form-content">
        <h3>Login to Your Account</h3>
        <form id="loginFormElement">
            <input type="email" id="loginEmail" placeholder="Email Address" required>
            <input type="password" id="loginPassword" placeholder="Password" required>
            <button type="button" onclick="submitLogin()">Login</button>
        </form>
        <p style="margin-top: 15px; font-size: 12px; color: #666;">
            Demo credentials: user@email.com / password123
        </p>
    </div>
    
    <!-- CONTACT FORM -->
    <div id="contactForm" class="form-content">
        <h3>Contact Us</h3>
        <form id="contactFormElement">
            <input type="text" id="contactName" placeholder="Your Name" required>
            <input type="email" id="contactEmail" placeholder="Your Email" required>
            <input type="text" id="contactSubject" placeholder="Subject" required>
            <textarea id="contactMessage" rows="4" placeholder="Your Message" required></textarea>
            <button type="button" onclick="submitContact()">Send Message</button>
        </form>
    </div>
    
    <!-- RESULT MESSAGE -->
    <div id="result" class="result"></div>
</div>

<script>
// Tab switching function
function showForm(formName) {
    // Hide all forms
    document.getElementById('registerForm').classList.remove('active-form');
    document.getElementById('loginForm').classList.remove('active-form');
    document.getElementById('contactForm').classList.remove('active-form');
    
    // Remove active class from all tabs
    var tabs = document.getElementsByClassName('tab');
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].classList.remove('active');
    }
    
    // Show selected form
    document.getElementById(formName + 'Form').classList.add('active-form');
    
    // Add active class to clicked tab
    event.target.classList.add('active');
    
    // Hide result
    document.getElementById('result').style.display = 'none';
}

// REGISTRATION FUNCTION
function submitRegister() {
    var name = document.getElementById('regName').value;
    var email = document.getElementById('regEmail').value;
    var password = document.getElementById('regPassword').value;
    var confirm = document.getElementById('regConfirm').value;
    var resultDiv = document.getElementById('result');
    var errorMsg = "";
    var isValid = true;
    
    if (name === "") {
        errorMsg += "• Name is required<br>";
        isValid = false;
    }
    if (email === "") {
        errorMsg += "• Email is required<br>";
        isValid = false;
    } else if (email.indexOf('@') === -1 || email.indexOf('.') === -1) {
        errorMsg += "• Enter a valid email address<br>";
        isValid = false;
    }
    if (password === "") {
        errorMsg += "• Password is required<br>";
        isValid = false;
    } else if (password.length < 4) {
        errorMsg += "• Password must be at least 4 characters<br>";
        isValid = false;
    }
    if (password !== confirm) {
        errorMsg += "• Passwords do not match<br>";
        isValid = false;
    }
    
    if (!isValid) {
        resultDiv.innerHTML = "<strong>❌ Registration Failed:</strong><br>" + errorMsg;
        resultDiv.className = "result result-error";
        resultDiv.style.display = "block";
    } else {
        resultDiv.innerHTML = "<strong>✅ Registration Successful!</strong><br><br>" +
            "Welcome " + name + "!<br>" +
            "A confirmation email has been sent to " + email + "<br>" +
            "You can now login to your account.";
        resultDiv.className = "result result-success";
        resultDiv.style.display = "block";
        
        // Clear form
        document.getElementById('regName').value = "";
        document.getElementById('regEmail').value = "";
        document.getElementById('regPassword').value = "";
        document.getElementById('regConfirm').value = "";
    }
}

// LOGIN FUNCTION
function submitLogin() {
    var email = document.getElementById('loginEmail').value;
    var password = document.getElementById('loginPassword').value;
    var resultDiv = document.getElementById('result');
    
    if (email === "" || password === "") {
        resultDiv.innerHTML = "<strong>❌ Login Failed:</strong><br>Please enter both email and password";
        resultDiv.className = "result result-error";
        resultDiv.style.display = "block";
    } else if (email === "user@email.com" && password === "password123") {
        resultDiv.innerHTML = "<strong>✅ Login Successful!</strong><br><br>" +
            "Welcome back!<br>" +
            "You are now logged into Smart E-Commerce.<br>" +
            "Redirecting to dashboard...";
        resultDiv.className = "result result-success";
        resultDiv.style.display = "block";
    } else {
        resultDiv.innerHTML = "<strong>❌ Login Failed:</strong><br>Invalid email or password.<br><br>" +
            "Demo: user@email.com / password123";
        resultDiv.className = "result result-error";
        resultDiv.style.display = "block";
    }
}

// CONTACT FUNCTION
function submitContact() {
    var name = document.getElementById('contactName').value;
    var email = document.getElementById('contactEmail').value;
    var subject = document.getElementById('contactSubject').value;
    var message = document.getElementById('contactMessage').value;
    var resultDiv = document.getElementById('result');
    var errorMsg = "";
    var isValid = true;
    
    if (name === "") {
        errorMsg += "• Name is required<br>";
        isValid = false;
    }
    if (email === "") {
        errorMsg += "• Email is required<br>";
        isValid = false;
    } else if (email.indexOf('@') === -1 || email.indexOf('.') === -1) {
        errorMsg += "• Enter a valid email address<br>";
        isValid = false;
    }
    if (subject === "") {
        errorMsg += "• Subject is required<br>";
        isValid = false;
    }
    if (message === "") {
        errorMsg += "• Message is required<br>";
        isValid = false;
    }
    
    if (!isValid) {
        resultDiv.innerHTML = "<strong>❌ Message Not Sent:</strong><br>" + errorMsg;
        resultDiv.className = "result result-error";
        resultDiv.style.display = "block";
    } else {
        resultDiv.innerHTML = "<strong>✅ Message Sent Successfully!</strong><br><br>" +
            "Thank you " + name + "!<br>" +
            "We have received your message about '" + subject + "'<br>" +
            "We will reply to " + email + " within 24 hours.";
        resultDiv.className = "result result-success";
        resultDiv.style.display = "block";
        
        // Clear form
        document.getElementById('contactName').value = "";
        document.getElementById('contactEmail').value = "";
        document.getElementById('contactSubject').value = "";
        document.getElementById('contactMessage').value = "";
    }
}
</script>

<?php
// PHP backend processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // In a real system, save to database here
    // This is just a placeholder for backend demonstration
    error_log("Form submitted at: " . date('Y-m-d H:i:s'));
}
?>

</body>
</html>
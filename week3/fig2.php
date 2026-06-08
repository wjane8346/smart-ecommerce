<!DOCTYPE html>
<html>
<head>
    <title>Password Strength Checker</title>
    <style>
        body {
            font-family: Arial;
            background: #F5F5F5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2C3E66;
            margin-top: 0;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .meter {
            height: 10px;
            background: #ddd;
            border-radius: 5px;
            margin: 10px 0;
            overflow: hidden;
        }
        .bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s;
        }
        .weak {
            background: #E67E22;
            width: 33%;
        }
        .medium {
            background: #F1C40F;
            width: 66%;
        }
        .strong {
            background: #27AE60;
            width: 100%;
        }
        .weak-text {
            color: #E67E22;
        }
        .medium-text {
            color: #F1C40F;
        }
        .strong-text {
            color: #27AE60;
        }
        .requirements {
            font-size: 12px;
            color: #666;
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        .requirements li {
            margin: 5px 0;
        }
        .check {
            color: green;
        }
        .cross {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Password Strength Checker</h2>
    
    <input type="password" id="password" placeholder="Enter your password" onkeyup="checkStrength()">
    
    <div class="meter">
        <div id="strengthBar" class="bar"></div>
    </div>
    
    <p id="strengthText" style="font-weight: bold;"></p>
    
    <div class="requirements">
        <strong>Password Requirements:</strong>
        <ul>
            <li id="reqLength">✗ At least 6 characters</li>
            <li id="reqNumber">✗ Contains a number</li>
            <li id="reqLetter">✗ Contains a letter</li>
            <li id="reqUpper">✗ Contains uppercase letter</li>
        </ul>
    </div>
</div>

<script>
function checkStrength() {
    var password = document.getElementById('password').value;
    var strengthBar = document.getElementById('strengthBar');
    var strengthText = document.getElementById('strengthText');
    
    // Check requirements
    var hasLength = password.length >= 6;
    var hasNumber = /[0-9]/.test(password);
    var hasLetter = /[a-zA-Z]/.test(password);
    var hasUpper = /[A-Z]/.test(password);
    
    // Update requirement list with checkmarks
    document.getElementById('reqLength').innerHTML = (hasLength ? '✓' : '✗') + ' At least 6 characters';
    document.getElementById('reqNumber').innerHTML = (hasNumber ? '✓' : '✗') + ' Contains a number';
    document.getElementById('reqLetter').innerHTML = (hasLetter ? '✓' : '✗') + ' Contains a letter';
    document.getElementById('reqUpper').innerHTML = (hasUpper ? '✓' : '✗') + ' Contains uppercase letter';
    
    // Change colors of requirements
    document.getElementById('reqLength').style.color = hasLength ? 'green' : 'red';
    document.getElementById('reqNumber').style.color = hasNumber ? 'green' : 'red';
    document.getElementById('reqLetter').style.color = hasLetter ? 'green' : 'red';
    document.getElementById('reqUpper').style.color = hasUpper ? 'green' : 'red';
    
    // Calculate strength score
    var score = 0;
    if (hasLength) score++;
    if (hasNumber) score++;
    if (hasLetter) score++;
    if (hasUpper) score++;
    
    // Update meter and text based on score
    if (password.length === 0) {
        strengthBar.className = 'bar';
        strengthBar.style.width = '0%';
        strengthText.innerHTML = '';
        strengthText.className = '';
    }
    else if (score <= 2) {
        strengthBar.className = 'bar weak';
        strengthBar.style.width = '33%';
        strengthText.innerHTML = 'Weak Password - Try adding numbers and uppercase letters';
        strengthText.className = 'weak-text';
    }
    else if (score <= 3) {
        strengthBar.className = 'bar medium';
        strengthBar.style.width = '66%';
        strengthText.innerHTML = 'Medium Password - Add uppercase letters to strengthen';
        strengthText.className = 'medium-text';
    }
    else {
        strengthBar.className = 'bar strong';
        strengthBar.style.width = '100%';
        strengthText.innerHTML = 'Strong Password! Good work!';
        strengthText.className = 'strong-text';
    }
}
</script>

</body>
</html>
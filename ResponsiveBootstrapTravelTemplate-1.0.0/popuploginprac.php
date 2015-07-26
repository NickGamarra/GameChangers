<?php
echo '
<!doctype html>
<html>
<head>
    <link href="http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href="popup.css" rel="stylesheet">
    <script src="popup.js"></script>
</head>

<body>
<div class="test"></div>
<a href="login.php" id="loginLink">Register</a>

<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content" id="loginTarget">
            <a class="close">x</a>
            <h3>Sign in</h3>
            <form method="post" action="USA2S_registerlogin.php">
                <label for="e-mail">
                     E-mail:
                    <input type="email" name="e-mail" id="e-mail" placeholder="Enter e-mail address"  required />
                    <span class="bspan" id="mailinfo"></span>
                </label>
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Enter Username Here" onkeyup="checkUserLength(this)" pattern=".{6,}" required />
                    <span class="bspan" id="userinfo">6 chars req.</span>
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="Passowrd must be 6 or more characters" pattern=".{6,}"  required />
                </label>
                <label for="password2">
                    confirm password:
                    <input type="password" name="password2" id="password2" onkeyup="checkPassLength(this)" placeholder="re-enter passowrd" pattern=".{6,}" required />
                    <span class="bspan" id="passinfo">6 chars req.</span>
                </label>
                <button type="submit" id= "register-submit">Sign in</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
'
?>
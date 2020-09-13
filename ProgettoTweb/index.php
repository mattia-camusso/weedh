<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>weEDH homepage</title>
    <!-- Mattia Camusso, sito dedicato alla creazione di mazzi per il popolare
    gioco di carte collezionabili Magic: The Gathering, login page -->
    <link rel="icon" href="img/logo1.svg">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div id="flash" hidden="hidden"></div>
<div id="container" class="container">
    <div class="form-container sign-up-container">
        <form id="sign-up" action="checkSignUp.php" method="post">
            <img src="img/logo.svg" alt="W">
            <h1>Create Account</h1>
            <label>
                <input type="text" placeholder="Name" name="username" required="required">
            </label>
            <label>
                <input type="email" placeholder="Email" name="email" required="required">
            </label>
            <label>
                <input type="password" placeholder="Password" name="password" required="required">
            </label>
            <button type="submit" name="button">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form id="sign-in" action="checkSignIn.php" method="post">
            <img src="img/logo.svg" alt="W">
            <h1>Sign In</h1>
            <label>
                <input type="text" placeholder="Username" name="username" required="required">
            </label>
            <label>
                <input type="password" placeholder="Password" name="password" required="required">
            </label>

            <button type="submit" name="button">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Hello Planeswalker</h1>
                <p>Are you new? <br> Register in here</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
            <div class="overlay-panel overlay-right">
                <div class="panel-1">
                    <h1>Hello Planeswalker</h1>
                    <p>Do you already have an account? <br> Log in here</p>
                </div>
                <div class="panel-2" hidden="hidden">

                    <h1>Validation Meter</h1>
                    <ul>
                        <li>Password must be at least 4 characters</li>
                        <li>Password must contain a lowercase letter</li>
                        <li>Password must contain a capital letter</li>
                        <li>Password must contain a number</li>
                    </ul>
                    <div class="strength">
                        <span class="bar bar-1"></span>
                        <span class="bar bar-2"></span>
                        <span class="bar bar-3"></span>
                        <span class="bar bar-4"></span>
                    </div>

                </div>
                <button class="ghost panel-1" id="signIn">Sign In</button>
            </div>
        </div>
    </div>
</div>
<div id="w3c">
    <a href="http://validator.w3.org/check/referer">
        <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/w3c-html.png"
             alt="Valid HTML"/>
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS"/>
    </a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/index.js" type="text/javascript"></script>
</body>
</html>

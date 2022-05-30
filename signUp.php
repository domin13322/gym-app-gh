<?php
session_start();

?>
<!DOCTYPE html>

<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Track Your progress</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="mainContainer">
<div id="logo">Track Your progress</div>
<div id="menu"><ul id="menuList">    
    <li class="menuItem"><a href="index.php">Main Page</a></li>
    <li class="menuItem"><a href="addTraining.php">Add practice</a></li>
    <li class="menuItem"><a href="stats.php">Your results</a></li>
    <li class="menuItem"><a href="acomplishments.php">Acomplishments</a></li>
    <li class="sign"><a href="signIn.php">Sign in</a></li>
    <li class="sign"><a href="signUp.php">Sign up</a></li>
</ul>
</div>
<form id="register" action="includes/signup.php" method="POST", enctype="multipart/form-data">
<h2>Create Account on our website to use all features</h2>    
Login
<br>
<input type="text" name="login" id="loginR" class="signInInput" required>
<br>
e-mail
<br>
<input type="mail" name="email" id="email" class="signInInput" required>
<br>
Password
<br>
<input type="password" name="password" id="passwordR" class="signInInput" required>
<br>
Repeat password
<br>
<input type="password" name="passwordRepeat" id="passwordR2" class="signInInput" required>
<br>
<input type="checkbox" name="statue" id="statue">
<label for="statue">
I accept the statue
</label> 
<!--thanks to label after clicking the text inside checkbox will change it's value
-->
<br>
<button class="logIn" name="submit" type="submit">Create account</button>
<br>
<?php 
if(isset($_SESSION['errorMessage'])){
    if($_SESSION['errorMessage']=="Registration went well")
        echo "<p style='color:green;'>".$_SESSION['errorMessage']."</p>";
    else{
        echo "<p style='color:red;'>".$_SESSION['errorMessage']."</p>";
    }
} 

?>
</form>
</div>
<footer id="footer">
   Copyright 2022 &copy
</footer>
</body>
</html>
<?php
session_start();

?>
<!DOCTYPE html>

<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Measure your progress</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="mainContainer">
<div id="logo">Zmierz swój progress</div>
<div id="menu"><ul id="menuList">    
    <li class="menuItem"><a href="index.php">Main Page</a></li>
    <li class="menuItem"><a href="addTraining.php">Add practice</a></li>
    <li class="menuItem"><a href="stats.php">Your results</a></li>
    <li class="menuItem"><a href="acomplishments.php">Acomplishments</a></li>
    <li class="sign"><a href="signIn.php">Sign in</a></li>
    <li class="sign"><a href="signUp.php">Sign up</a></li>
</ul>
</div>
<?php
    if(isset($_SESSION['justRegisterd'])){
        echo <<<END
        <p style="color:green;">
        Thank You so much for your registration. You can sign in now:)
        </p>
END;
        unset($_SESSION['justRegisterd']);
    }
?>
<fieldset id="signInFieldset">
<legend>Sign in to use all of our features</legend>
<form action="login.php" method="POST" enctype="multipart/form-data">
Username
<br>
<input type="text" name="login" placeholder="eg. user123" class="signInInput" required>
<br>
Password
<br>
<input type="password" name="password" class="signInInput" required>
<br>
<button class="logIn" type="submit">Sign in</button>
<?php
    if(isset($_SESSION['noSuchUser'])){
        echo "<p class='error'>".$_SESSION['noSuchUser']."</p>\n";
    }
?>
</form>
</fieldset>
</div>
<footer id="footer">
   Copyright 2022 &copy
</footer>
</body>
</html>
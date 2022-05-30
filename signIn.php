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
        <fieldset id="signInFieldset">
        <legend>Sign in to use all of our features</legend>
            <form action="includes/login.php" method="POST" enctype="multipart/form-data">
            Username
            <br>
            <input type="text" name="loginLog" placeholder="eg. user123" class="signInInput" required>
            <br>
            Password
            <br>
            <input type="password" name="passwordLog" class="signInInput" required>
            <br>
            <button class="logIn" type="submit" name="submitBtn">Sign in</button>
            <?php
                if(isset($_SESSION['loginError'])){
                    echo "<p class='error'>".$_SESSION['loginError']."</p>\n";
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
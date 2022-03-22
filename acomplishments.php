<?php
session_start();
if(!isset($_SESSION['isLogged'])){
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Measure your progress</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="mainContainer">
<div id="logo">Zmierz swój progress</div>
<div id="menu"><ul id="menuList">    
    <li class="menuItem"><a href="index.php">Main Page</a></li>
    <li class="menuItem"><a href="addTraining.php">Add practice</a></li>
    <li class="menuItem"><a href="stats.php">Your results</a></li>
    <li class="menuItem"><a href="acomplishments.php">Acomplishments</a></li>
    <li class="sign"><a href="logout.php">Log out</a></li>
</ul>
</div>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submitBtn">
        Upload
    </button>
</form>

</div>
<footer id="footer">
   Copyright 2022 &copy
</footer>
</body>
</html>
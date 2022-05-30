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
        <title>Track Your progress</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body background="img/pexels-victor-freitas-685530.jpg">
        <div id="mainContainer">
            <div id="logo">Track Your progress</div>
            <?php 
                require "menu.php";
            ?>
        </div>
        <footer id="footer">
            Copyright 2022 &copy
        </footer>
    </body>
</html>
<?php
session_start();
require_once "connectToDb.php";
$connect=@new mysqli($host,$user,$password,$dbName);
if($connect->connect_errno!=0){
    echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
}
?>
<!DOCTYPE html>

<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Track your progress</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="mainContainer">
<div id="logo">Zmierz swój progress</div>
<?php require_once "menu.php";
?>
<br>
</div>
<footer id="footer">
   Copyright 2022 &copy
</footer>
</body>
</html>
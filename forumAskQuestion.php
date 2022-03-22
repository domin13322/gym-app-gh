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
    <title>Measure your progress</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="changeText.js" defer></script>
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="forumContainer">
    <div id="logo">Track your progress</div>
    <?php require_once "menu.php";?>
    <br>
    <div class="content">
        <h2 style="color:darkred;">This is the place where You can ask your question</h2>
        <br>
        <fieldset id="question">
            <legend>Question</legend>
            <?php
                if( isset($_SESSION['isLogged'])==false || $_SESSION['isLogged']==false){
                    echo "<p style='color:red;'>You have to be logged in to ask questions<br/></p>";
                }
            ?>
            <form action="askQuestion.php" method="post" enctype="multipart-form-data">
            <h4>Enter title:</h4>
            <input type="text" class="titleInput" name="questionTitle" required/>
               
            <div id="textFeatures">
                <button type="button" onclick="fontItalics()" class="textFeature" style="font-style:italic;" name="italics" title="Italics">I</button>    
                <button type="button" onclick="fontBold()" class="textFeature" style="font-weight:bold;" name="bold" title="Bold">B</button>
                <button type="button" onclick="fontUnderline()" class="textFeature" name="underline" title="Underline">U</button>
                <input onchange="changeColor()" type="color" style="margin-top:5px;" id="colorPicker" value="black" name="colorPicker" title="choose the text color">
            </div>
               <textarea name="questionText" class="questionText" required></textarea>
                <br>
                <button type="submit" <?php 
                    if( !isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
                    echo "disabled";
                }
                ?>>confirm</button>
            </form>
        </fieldset>
    </div>
    <nav class="forumMenu">
        <?php require_once "forumMenu.php" ?>
    </nav>
</div>
<footer id="footer">
   Copyright 2022 &copy
</footer>
</body>
</html>
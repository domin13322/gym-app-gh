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
        <title>Track Your progress</title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
    </head>
    <body background="img/pexels-victor-freitas-685530.jpg">
    <div id="mainContainer">
    <div id="logo">Track Your progress</div>
        <?php require_once "menu.php"; ?>
        <br>
        <div class="main">
            <h1>
                <?php
                    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'])
                        echo "Hello ".$_SESSION['login'];
                ?>
            </h1>
            <h2 class="indexh2">
                If You want to know how much progress are You making in case of working out... This is the place for You!!</h2>
            <br>
            <p class="indexParagraph">
                Add info about your workout: <br>
                <img class="indexPhoto" src="img/exAdding.png" alt="no such photo"/>
            </p>
            <br>
            <p class="indexParagraph">
                View your stats(total reps you made, charts etc.): <br>
                <img class="indexPhoto" src="img/exProgress.png" alt="no such photo"/>
            </p>
            <br>
            <p class="indexParagraph">
                Ask questions on forum: <br>
                <img class="indexPhoto" src="img/forumQuestion.png" alt="no such photo"/>
                <img class="indexPhoto" src="img/forumAnswer.png" alt="no such photo"/>
            </p>
        </div>
    <br>
    </div>
    <footer id="footer">
    Copyright 2022 &copy
    </footer>
    </body>
</html>
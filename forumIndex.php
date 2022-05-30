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
    <title>Track Your progress(forum)</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
    <link rel="stylesheet" href="img/fontello/css/fontello.css?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="img/fontello2/css/fontello.css?v=<?php echo time(); ?>" type="text/css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="changeText.js" defer></script>
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
    <div id="forumContainer">
        <div id="logo">Track your progress</div>
        <?php require_once "menu.php";?>
        <br>
        <div class="content">
            <h2 style="color:darkred;">Last added qestions</h2>
            <form class="searchForm" action="searchQuestion.php" method="post">
                <button class="searchBtn"><i class="icon-search"></i></button>
                <input type="text" name="searchQuestion" class="searchQuestion" placeholder="Search for questions" required>
            </form>
            <br>
            <br>
            <br>
            <div class="infoSquare">
                <?php
                     $result=$connect->query("SELECT COUNT(user) AS usersNumber FROM users");
                     $record=$result->fetch_assoc();
                     $users=$record['usersNumber'];
                     $result=$connect->query("SELECT COUNT(questionId) AS id FROM forum");
                     $record2=$result->fetch_assoc();
                     $questions=$record2['id'];
                     $result=$connect->query("SELECT COUNT(answerId) AS ansId FROM forum_answers");
                     $record3=$result->fetch_assoc();
                     $answers=$record3['ansId'];
                     $result=$connect->query("SELECT COUNT(likeId) AS ls FROM likes");
                     $record4=$result->fetch_assoc();
                     $likes=$record4['ls'];

                ?>
                <div class="infoSquareTile"><?= $record['usersNumber'] ?>
                    <br>
                    Users
                </div>
                <div style="background-color:rgb(230, 76, 20);" class="infoSquareTile"><?= $record2['id'] ?>
                    <br>
                    Questions
                </div>
                <div style="clear:both"></div>
                <div style="background-color:rgb(12, 170, 20);" class="infoSquareTile"><?= $record3['ansId'] ?>
                    <br>
                    Answers
                </div>
                <div style="background-color:rgb(71, 71, 223);" class="infoSquareTile"><?= $record4['ls'] ?>
                    <br>
                    Likes
                </div>
            </div>
            <?php 
                if($result=$connect->query("SELECT title,questionDate,questionId, answers ,user, raiting FROM forum ORDER BY questionDate DESC")){
                require "askedQuestion.php";
                }
            ?>
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
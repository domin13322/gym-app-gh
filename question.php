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
    <title>Track your progress(forum)</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
    <link rel="stylesheet" href="img/fontello/css/fontello.css?v=<?php echo time(); ?>" type="text/css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="changeText.js" defer></script>
    <script>
        
        function showTextarea(){
            var answer=document.getElementById("answerTextField");
            var cancelBtn=document.getElementById("cancelBtn");
            answer.style.display="initial";
            cancelBtn.style.display="initial";
        }
        function hideTextarea(){
            var answer=document.getElementById("answerTextField");
            var cancelBtn=document.getElementById("cancelBtn");
            answer.style.display="none";
            cancelBtn.style.display="none";
        }
    </script>
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
    <div id="forumContainer">
        <div id="logo">Track your progress</div>
        <?php require_once "menu.php";?>
        <br>
        <div class="content">
            <?php
                $login=$_SESSION['login'];
                $id=$_GET['n'];
                $_SESSION['questionId']=$id;
                if($result=$connect->query("SELECT questionText,title,user,questionDate
                FROM forum WHERE questionId=$id
                ")){
                    $record=$result->fetch_assoc();
                    ?>
                    <div id="wholeQuestion">
                        <div class="bigQuestionTitle">
                            <h3 class="bigTitle"> <?= $record['title'] ?> </h3>
                        </div>
                        Asked by <?= $record['user']?> on:<?=$record['questionDate'] ?>
                        <br>
                        <div class="questionContent">
                            <p>
                                <?= $record['questionText']?>
                            </p>
                        </div>
                        <?php
                              $result=$connect->query("SELECT * FROM likes WHERE questionId=$id AND user='$login' AND likeInfo=0");
                              $allResults=$result->num_rows;
                              if($allResults>0) {
                                  $titleDislike="dislike already pressed";
                              }
                              else {
                                  $titleDislike="I don't like it :(";
                              }
                              $result=$connect->query("SELECT * FROM likes WHERE questionId=$id AND user='$login' AND likeInfo=1");
                              $allResults=$result->num_rows;
                              if($allResults>0) {
                                  $titleLike="like already pressed";
                              }
                              else {
                                  $titleLike="I like it :)";
                              }
                        ?>
                        <form action="giveFeedback.php" method="post">
                           
                        <button name="likeBtn" class="like" value="like" title="<?= $titleLike ?>"> <i class="icon-thumbs-up-alt"></i> </button> 
                            <button class="like" name="dislikeBtn" value="dislike" title="<?= $titleDislike ?>"><i class="icon-thumbs-down-alt"></i></button>
                        </form>
                        <br>
                        <button onclick="showTextarea()" type="button" id="answerBtn">Answer</button>
                        <div id="answerTextField">
                            Your answer:
                            <br>
                            <form action="addAnswer.php" method="post" enctype="multipart-form-data">
                            <div id="textFeatures">
                                <button type="button" onclick="fontItalics()" class="textFeature" style="font-style:italic;" name="italics" title="Italics">I</button>    
                                <button type="button" onclick="fontBold()" class="textFeature" style="font-weight:bold;" name="bold" title="Bold">B</button>
                                <button type="button" onclick="fontUnderline()" class="textFeature" name="underline" title="Underline">U</button>
                                <input onchange="changeColor()" type="color" style="margin-top:5px;" id="colorPicker" value="black" name="colorPicker" title="choose the text color">
                            </div>
                            <textarea name="answerText" class="questionText" required></textarea>
                                <br>
                                <button class="confirmBtn" type="submit" <?php 
                                    if( !isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
                                    echo "disabled";
                                }
                                ?>>Confirm</button>
                                <button onclick="hideTextarea()" type="reset" id="cancelBtn">Cancel</button>
                            </form>
                        </div>
                        <br>
                        <h3 id="AnswersTile">Answers:</h3>
                        <?php
                            if($result=$connect->query("SELECT answerText,user,answerDate
                            FROM forum_answers WHERE questionId=$id
                        ")){
                            $allAnswers=$result->num_rows;
                            $updateAnswers=$connect->query("UPDATE `forum` SET `answers` = '$allAnswers' WHERE `forum`.`questionId` = $id");
                            for($i=0;$i<$allAnswers;$i++){
                                $record=$result->fetch_assoc(); 
                        ?>
                                <div class="answer">
                                    <p class="userInfo"> Answer by: <?=$record['user'] ?> on: <?= $record['answerDate']?> </p>
                                    <?= $record['answerText'] ?>
                                </div>
                       <?php }}?>
                    </div>
                    <?php
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
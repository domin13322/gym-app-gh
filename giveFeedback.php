<?php
    session_start();
    require_once "connectToDb.php";
    unset($_SESSION['likeFeedback']);
    $connect=@new mysqli($host,$user,$password,$dbName);
    $id=$_SESSION['questionId'];
    $login=$_SESSION['login'];
    if(isset($_POST['likeBtn'])){
        $like=1;
    }
    else if(isset($_POST['dislikeBtn'])){
        $like=0;
    }
    $result=$connect->query("SELECT * FROM likes WHERE questionId=$id AND user='$login' AND likeInfo=$like");
    $allResults=$result->num_rows;
    if($allResults>0){
        header("Location:question.php?n=$id");
        exit();
    }
    $result=$connect->query("DELETE FROM likes WHERE questionId=$id AND user='$login'");
    $result=$connect->query("INSERT INTO likes VALUES(NULL,'$login','$id','$like')");
    $result=$connect->query("SELECT raiting FROM forum WHERE questionId=$id");
    $record=$result->fetch_assoc();
    $raiting=$record['raiting'];
    if(isset($_POST['likeBtn'])){
        $raiting++;
    }
    else if(isset($_POST['dislikeBtn'])){
        $raiting--;
    }
    $result=$connect->query("UPDATE forum SET raiting=$raiting WHERE questionId=$id");
    header("Location:question.php?n=$id");
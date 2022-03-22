<?php
    session_start();
    require_once "connectToDb.php";
    $connect=new mysqli($host,$user,$password,$dbName);
    if($connect->connect_errno!=0){
        echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
    }
    $login=$_SESSION['login'];
    $answerText=$_POST['answerText'];
    $questionId=$_SESSION['questionId'];
    if($result=$connect->query("INSERT INTO forum_answers VALUES(NULL,'$questionId','$answerText','$login',now())")
    ){
        $connect->close();
        header("Location:question.php?n=$questionId");
        exit();
    }
    else {
        echo "error";
    }
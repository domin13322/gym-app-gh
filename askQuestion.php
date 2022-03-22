<?php
    session_start();
    require_once "connectToDb.php";
    $connect=new mysqli($host,$user,$password,$dbName);
    if($connect->connect_errno!=0){
        echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
    }
    $login=$_SESSION['login'];
    $question=$_POST['questionText'];
    $title=$_POST['questionTitle'];
    if($result=$connect->query("INSERT INTO forum VALUES(NULL,'$question','$login','$title',now())")
    ){
        $connect->close();
        header("Location:yourQuestions.php");
        exit();
    }
    else {
        echo "error";
    }

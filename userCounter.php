<?php
    session_start();
    require_once "connectToDb.php";
    $connect=@new mysqli($host,$user,$password,$dbName);
    if($connect->connect_errno!=0){
        echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
    }
    $result=$connect->query("SELECT COUNT(user) AS usersNumber FROM users");
        $record=$result->fetch_assoc();
        $_SESSION['usersNumber']=$record['usersNumber'];
    
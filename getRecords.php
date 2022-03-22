<?php
session_start();
if(!isset($_SESSION['isLogged'])){
    header("Location:index.php");
    exit();
}
require_once "connectToDb.php";
$connect=@new mysqli($host,$user,$password,$dbName);
if($connect->connect_errno!=0){
    echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
}
?>
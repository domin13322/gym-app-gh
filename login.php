<?php
session_start();
if(!isset($_POST['login']) || !isset($_POST['password'])){
    header("Location:index.php");
    exit();
}
require_once "connectToDb.php";
$connect=@new mysqli($host,$user,$basepassword,$dbName);
//@ wyciszanie problemów
if($connect->connect_errno!=0){
    echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
}
else {
    $login=$_POST['login'];
    
    $password=$_POST['password'];
    
    $login=htmlentities($login,ENT_QUOTES,"UTF-8"); //zamienia kod sql na encje i kod html
    
    
    if ($result=@$connect->query(sprintf(
    "SELECT*FROM users WHERE user='%s'",
    mysqli_real_escape_string($connect,$login)   
   )
   )){
        $LoginSuccessful=$result->num_rows; //ile wierszy wyszło z naszego
        //zapytania. Jeśli więcej niż 0 to lecimy z kodem below
        if($LoginSuccessful>0){
            $record=$result->fetch_assoc(); //tablica-1 rząd konkretny 

            if(password_verify($password,$record['pass'])){

            $_SESSION['isLogged']=true;
            $_SESSION['id']=$record['id'];
            $user=$record['user'];
            $_SESSION['login']=$login;
            unset($_SESSION['noSuchUser']);
            $result->free_result(); //usuwamy niepotrzebne rezultaty,zwalniamy pamięć
            $connect->close();
            header("Location:index.php");
            exit();
        }
        else {
            $_SESSION['noSuchUser']="wrong password,try again\n";
        }

        }
        else {
            $_SESSION['noSuchUser']="wrong login,try again\n";
        }
    }
    header("Location:signIn.php");
}
?>
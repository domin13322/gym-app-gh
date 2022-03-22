<?php
session_start();
$isFine=true;

$login=$_POST['loginR'];
$password=$_POST['passwordR'];
$email=$_POST['email'];
$passwordRepeated=$_POST['passwordR2'];
$statue=$_POST['statue'];
    unset($_SESSION['errorMail']);
    unset($_SESSION['loginError']);
    unset($_SESSION['passwordError']);
    unset($_SESSION['statueError']);
    if(strlen($login)<3 || strlen($login)>20){
        $isFine=false;
        $_SESSION['loginError']="Login may contain between 3 to 20 characters";
    }
    //good password
    if(strlen($password)<8 || strlen($password)>25){

        $isFine=false;
        $_SESSION['passwordError']="Password may contain between 8 to 25 characters";
    }
    if($password!==$passwordRepeated){
        $isFine=false;
        $_SESSION['passwordError']="Passwords are different!";
    }   
    
    if(ctype_alnum($login)==false){// all chars are letters and nubers
        $isFine=false;
        $_SESSION['loginError']="login can contain only letters and numbers";
    }
    //check email
    $safeMail=filter_var($email,FILTER_SANITIZE_EMAIL);
    if(filter_var($safeMail,FILTER_VALIDATE_EMAIL)==false || $safeMail!=$email){
        $isFine=false;
        $_SESSION['errorMail']="Wrong e-mail adress!";
    }
    if(isset($_POST['statue'])==false){
        $isFine=false;
        $_SESSION['statueError']="You didn't accept the statue!";
    }
    
    
    require_once "connectToDb.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try{
    $connect=new mysqli($host,$user,$basepassword,$dbName);
    
    if($connect->connect_errno!=0){
    throw new Exeption(mysqli_connect_errno());
    echo "coś z bazą";
    }
    else{
        $result= $connect->query("SELECT id FROM users WHERE email='$email'");
        $sameMail=$result->num_rows;
        if($sameMail>0){
            $isFine=false;
            $_SESSION['errorMail']="This mail adress is already taken!";
        }
        
        $result= $connect->query("SELECT id FROM users WHERE user='$login'");
        $sameLogin=$result->num_rows;
        if($sameLogin){
            $isFine=false;
            $_SESSION['loginError']="This login is already taken!";
        }

        $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
        $datetime=new DateTime();
        $time=$datetime->format("Y-m-d H:i:s");
        if($isFine){
            if($connect->query("INSERT INTO users VALUES(NULL,'$login','$hashedPassword','$email',now()+INTERVAL 14 DAY)")){
                $_SESSION['justRegisterd']=true;
                $_SESSION['isLogged']=true;
                $connect->close();// Bardzo ważne!!!!
                header("Location:signIn.php");
                exit();
            }
        }
    }
    
    }
    catch(Exeption $e){
        echo '<p calss="error">Server error! We deeply apologize
        for this unpleasent situation. Please try again later.
        </p>';

    }
    header("Location:signUp.php");
?>
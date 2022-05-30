<?php
session_start();
include "../classes/db.php";
include "../classes/signupModel.php";
class LoginController extends SignUpModel{
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }
    public function logUser(){
       // unset($_SESSION['login']);
        if($this->checkUserLogin($this->username,$this->password)){
            $_SESSION['login'] = $this->username;
            $_SESSION['isLogged'] = true;
            header("Location:../index.php");
            return;
        }
        $_SESSION['isLogged'] = false;
    }
}
if(isset($_POST['submitBtn'])){
    $login=$_POST['loginLog'];
    $password=$_POST['passwordLog'];
    $log=new LoginController($login,$password);
    $log->logUser();
    header("Location:../signIn.php");
    exit();
}
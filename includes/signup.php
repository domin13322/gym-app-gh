<?php
session_start();
 include "../classes/db.php";
 include "../classes/signupModel.php";
class SignUpController extends SignUpModel{
    private $login;
    private $password;
    private $passwordRepeat;
    private $email;
    private $loginLength=4;
    private $errorMessage="Registration went well";
    
    public function __construct($login, $password,$email, $passwordRepeat){
        $this->login = $login;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }
    
    public function signUpUser(){
        unset($_SESSION['errorMessage']);
        if($this->checkLogin() && $this->checkPassword() && $this->checkEmail()){
            $_SESSION['errorMessage']="Registration went well";
            $this->addUser($this->login,$this->password,$this->email);
        }
    }

    private function checkLogin(){
        $success=true;
        if(strlen($this->login) < $this->loginLength){
           $_SESSION['errorMessage']="Login must be at least $this->loginLength characters";
            $success=false;
        }
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->login)){
            // function that checks if the characters inside login are difrrent
           $_SESSION['errorMessage'] ="You can't use special characters in loign";
            $success=false;
        }
        if(!$this->checkUser($this->login,$this->email)){
           $_SESSION['errorMessage']="This email adress or login is already taken";
            $success=false;
        }

        return $success;
    }

    private function checkEmail(){
        $success;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $success=false;
           $_SESSION['errorMessage']="Invalid email address";
        }
        else{
            $success=true;
        }
        return $success;
    }

    private function checkPassword(){
        $success;
        if($this->password==$this->passwordRepeat){
            $success=true;
        }
        else{
            $success=false;
            $_SESSION['errorMessage']="Both passwords must be the same";
        }
        return $success;
    }

}
if(isset($_POST['submit'])){
    $login=$_POST['login'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $passwordRepeat=$_POST['passwordRepeat'];
    $sign=new SignUpController($login,$password,$email,$passwordRepeat);
    $sign->signUpUser();
    header("Location:../signUp.php");
    //exit();
}
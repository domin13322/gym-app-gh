<?php
    class SignUpModel extends Db{
        
        protected function checkUser($login,$email){
            $stmt = $this->connect()->prepare("SELECT user FROM users WHERE user=? OR email=?");

            if(!$stmt->execute(array($login,$email))){
                $stmt=null;
                header("Location:../index.php");
                exit();
            }

            $success;
            if($stmt->rowCount()>0){
                $success=false;
            }
            else {
                $success=true;
            }
            return $success;
        }

        protected function addUser($login,$password,$email){
            $stmt=$this->connect()->prepare("INSERT INTO users (user, pass,email) VALUES (?,?,?)");
            
            $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
            
            if(!$stmt->execute(array($login,$hashedPassword,$email))) {
                $stmt=null;
                header("Location:../index.php");
                exit();
            }
            $stmt=null;
        }
        protected function checkUserLogin($login,$password){
            
            $stmt = $this->connect()->prepare("SELECT pass FROM users WHERE user=?");

            if(!$stmt->execute(array($login))){
                $stmt=null;
                header("Location:../index.php");
                exit();
            }

            $success;
            if($stmt->rowCount()<0){
                $_SESSION['loginError'] ="No such user in base";
                $success=false;
            }
            else {
                $pass=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if(password_verify($password,$pass[0]['pass'])==true){
                    $success=true;
                    $_SESSION['loginError']="login successfull";
                }
                else{
                    $success=false;
                    $_SESSION['loginError']="wrong password";
                }
            }
            return $success;
        }
    }
<?php
    session_start();
    if(isset($_POST['italics']) && $_SESSION['italics']==false){
        $_SESSION['italics']=true;
    }
    else if(isset($_POST['italics']) && $_SESSION['italics']==true){
        $_SESSION['italics']=false;
    }
    if(isset($_POST['bold']) && $_SESSION['bold']=="0"){
        $_SESSION['bold']="1";
    }
    else if(isset($_POST['bold']) && $_SESSION['bold']=="1"){
        $_SESSION['bold']="0";
    }
    if(isset($_POST['underline']) && $_SESSION['underline']==false){
        $_SESSION['underline']=true;
    }
    else if(isset($_POST['underline']) && $_SESSION['underline']==true){
        $_SESSION['underline']=false;
    }
    if(isset($_POST['color'])){
        $_SESSION['color']=$_POST['color'];
    }

    header("Location:forum.php");

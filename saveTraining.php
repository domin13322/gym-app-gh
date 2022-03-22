<?php
session_start();

require_once "connectToDb.php";

$connect=@new mysqli($host,$user,$password,$dbName);
if($connect->connect_errno!=0){
    echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;

}
else {
    for($i=0;$i<7;$i++){
        if(isset($_POST["exName$i"]) && strlen($_POST["exName$i"])>0 ){
            $exName=$_POST["exName$i"];
            $sets=$_POST["setsNumber$i"];
            for($j=0;$j<5;$j++){
                if(isset($_POST["reps$i$j"]) && $_POST["reps$i$j"]>0)
                $reps["$j"]=$_POST["reps$i$j"];
                else 
                $reps["$j"]=0;
            }
            $reps0=$reps['0'];
            $reps1=$reps['1'];
            $reps2=$reps['2'];
            $reps3=$reps['3'];
            $reps4=$reps['4'];
            $allReps=$reps0+$reps1+$reps2+$reps3+$reps4;
            $login=$_SESSION['login'];
            $date=$_POST['trainingDate'];
            $_SESSION['lastWorkout']=$date;
           $connect->query("INSERT INTO exercises VALUES(NULL,'$exName','$sets','$reps0','$reps1','$reps2','$reps3','$reps4','$allReps','$date','$login')"); 
        }
        else break;
    }
    $connect->close();
}
header("Location:lastWorkout.php");
?>
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
<!DOCTYPE html>

<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Measure your progress</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="mainContainer">
<div id="logo">Zmierz swój progress</div>
<?php   require_once "menu.php"; 
?>
<br>
    <h1>Chose the date to find your workout</h1>
    <form action="" method="post">
        <input type="date" name="workoutDate" required>
        <br>
        <button type="submit" class="findBtn">Find Workout</button>
    </form>
    <br>
    <?php if(isset($_POST['workoutDate'])){
        $data=$_POST['workoutDate'];
        echo "<h2>Your workout:</h2>";
        }
        else{
        echo "<h2>Your last workout</h2>";
        if(isset($_SESSION['lastWorkout'])){
        echo "Your last workout was on:".$_SESSION['lastWorkout'];
        $data=$_SESSION['lastWorkout'];
        }
        else {
        echo "You haven't added any workouts yet";
        }
        }
        $login=$_SESSION['login'];
        if($result=@$connect->query(
            "SELECT*FROM exercises
            WHERE user='$login' AND exDate='$data'
            "
        )){
            $success=$result->num_rows;
            if($success>0){
                ?>
                <table>
                    <tr>
                        <td class="exName">Exercise name</td>
                        <td class="sets">sets number</td>
                        <td class="reps">set 1</td>
                        <td class="reps">set 2</td>
                        <td class="reps">set 3</td>
                        <td class="reps">set 4</td>
                        <td class="reps">set 5</td>
                    </tr>
                        <?php
                        for($i=0;$i<$success;$i++){
                            $record=$result->fetch_assoc();
                            $exName=$record['exName'];
                            $sets=$record['setsNumber'];
                            $reps1=$record['reps1'];
                            $reps2=$record['reps2'];
                            $reps3=$record['reps3'];
                            $reps4=$record['reps4'];
                            $reps5=$record['reps5'];
                        ?>
                    <tr>
                        <td class="exName"><?=$exName ?></td>
                        <td class="sets"><?=$sets ?></td>
                        <td class="reps"><?=$reps1 ?></td>
                        <td class="reps"><?=$reps2 ?></td>
                        <td class="reps"><?=$reps3 ?></td>
                        <td class="reps"><?=$reps4 ?></td>
                        <td class="reps"><?=$reps5 ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <?php
                $result->free_result();
                $connect->close();
            }
        }
        
    ?>
  	
</div>
<footer id="footer">
    Dominik Noga All rights reserved &copy
</footer>
	
<script src="jquery-1.11.3.min.js"></script>
	
	<script>

	$(document).ready(function() {
	var NavY = $('.nav').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.nav').addClass('sticky');
	} else {
		$('.nav').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>

</body>
</html>
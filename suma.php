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
    <title>Track Your progress</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body background="img/pexels-victor-freitas-685530.jpg">
<div id="mainContainer">
<div id="logo">Track Your progress</div>
<?php require_once "menu.php";
    
    $login=$_SESSION['login'];
    if($result=@$connect->query(
        "SELECT exName FROM exercises
        WHERE user='$login'"
    )){
        $success=$result->num_rows;
?>
<br>
<div id="exInfo">
    <div id="exData">
    <h1 class="title">All informations about chosen exercise</h1>
    <form method="POST" enctype="multipart/form-data">
        <select name="exInputName">
            <option>Chose exercise name</option>
            <?php 
                $inBase=array();
            if($success>0){
                for($i=0;$i<$success;$i++){
                    $record=$result->fetch_assoc();
                    $exName=$record['exName'];
                    array_push($inBase,$exName);
                    $arrayQuantity=array_count_values($inBase);
                    if($arrayQuantity["$exName"]==1)
                    echo "<option >$exName</option>";
                }
            }
            ?>
        </select>
        <button type="submit">Search</button>
    </form>
    <?php
    }
    if(isset($_POST['exInputName'])){
        $exName=$_POST['exInputName'];
    }
    else {
        $exName=" ";
    }
   
        if($result=@$connect->query(
            "SELECT allReps FROM exercises
            WHERE user='$login' AND exName='$exName'
            "
        )){
            $success=$result->num_rows;
            $sum=0;
            if($success>0){
                for($i=0;$i<$success;$i++){
                    $record=$result->fetch_assoc();
                    $allReps=$record['allReps'];
                    $sum+=$allReps;
                }
                
                echo "<p class='text'>You made: ".$sum." ".$exName."</p>";
                $result->free_result();
                if($result=@$connect->query(
                    "SELECT exDate,setsNumber,reps1,reps2,reps3,reps4,reps5,allReps FROM exercises
                    WHERE user='$login' AND exName='$exName' ORDER BY exDate ASC 
                    "
                )){
                    $success=$result->num_rows;
                    $totalSets=0;
                    $totalReps1=0;
                    $totalReps2=0;
                    $totalReps3=0;
                    $totalReps4=0;
                    $totalReps5=0;
                    $allReps=0;

                    ?>
                    <table id="exerciseTable">
                       <tr class="head">
                            <td>Date</td>
                            <td>Sets</td>
                            <td>Set 1</td>
                            <td>Set 2</td>
                            <td>Set 3</td>
                            <td>Set 4</td>
                            <td>Set 5</td>
                            <td>Sum</td>
                       </tr>
                    <?php
                        for($i=0;$i<($success);$i++){
                            $record=$result->fetch_assoc();
                            $firstTime=$record["exDate"];
                            if($i==0)    
                                echo "<br/><p class='text'>For the first time You did this exercise on:".$firstTime."</p><br/>";
                            
                        ?>
                           
                                <td><?=$record['exDate']?></td>
                                <td><?=$record['setsNumber']?></td>
                                <td><?=$record['reps1']?></td>
                                <td><?=$record['reps2']?></td>
                                <td><?=$record['reps3']?></td>
                                <td><?=$record['reps4']?></td>
                                <td><?=$record['reps5']?></td>
                                <td><?=$record['allReps']?></td>
                            </tr>
                        <?php 
                                $totalSets+=$record['setsNumber'];
                                $totalReps1+=$record['reps1'];
                                $totalReps2+=$record['reps2'];
                                $totalReps3+=$record['reps3'];
                                $totalReps4+=$record['reps4'];
                                $totalReps5+=$record['reps5'];
                                $allReps+=$record['allReps'];
                    
                            }?>
                                <tr class="head">
                                   
                                    <td>Totals</td>
                                    <td><?=$totalSets?></td>
                                    <td><?=$totalReps1?></td>
                                    <td><?=$totalReps2?></td>
                                    <td><?=$totalReps3?></td>
                                    <td><?=$totalReps4?></td>
                                    <td><?=$totalReps5?></td>
                                    <td><?=$allReps?></td>
                                </tr>
                    </table>
                    <h3>Chart presenting all your progress</h3>
                    <br> 
                    <script>
                    google.charts.load('current', {packages: ['corechart', 'line']});
                    google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = new google.visualization.DataTable();
                data.addColumn('date', 'Date');
                data.addColumn('number', 'Reps');
                <?php
                     if($result=@$connect->query(
                        "SELECT allReps, DAY(exDate) as 'day', MONTH(exDate) as 'month',
                        YEAR(exDate) as 'year'
                        FROM exercises
                        WHERE user='$login' AND exName='$exName'
                        "
                    )){
                        $success=$result->num_rows;
                        
                    }
                ?>
                data.addRows([
                    <?php 
                        for($i=0;$i<$success;$i++){
                            $record=$result->fetch_assoc();
                            $day=$record['day'];
                            $month=$record['month']-1;
                            $year=$record['year'];
                            echo "["."new Date($year,$month,$day)".', '.$record['allReps'].'],';
                        }
                    
                    ?>
                ]);

                var options = {
                    hAxis: {
                    title: 'Date'
                    },
                    vAxis: {
                    title: 'Reps'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                chart.draw(data, options);
                }
            </script>

                    <div id="chart_div"></div>
                            
                    <?php
                    $result->free_result();
                }
                $connect->close();
            }
            else {
                echo "<p style='color:darkred'>You haven't chosen any exercise</p>";
            }
        }
    
    ?>
    </div>
    </div>
</div>
<footer id="footer">
    Dominik Noga All rights reserved &copy
</footer>
</body>
</html>
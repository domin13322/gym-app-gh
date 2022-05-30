<?php
session_start();
if(!isset($_SESSION['isLogged'])){
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>

<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>Measure your progress</title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
        <script src="addNewExercise.js" defer></script>
    </head>
    <body background="img/pexels-victor-freitas-685530.jpg">
        <div id="mainContainer">
        <div id="logo">Zmierz swój progress</div>
        <?php require_once "menu.php";?>
        <br>
        <form action="saveTraining.php" method="post" enctype="multipart/form-data">
            Practice date:
            <input type="date" name="trainingDate" id="date" required>
            <br>
            <div class="nameTile">
                Exercise name
            </div>
            <div class="setsTile">
                Number of sets
            </div>
            <?php for($i=0; $i<5; $i++){  ?>
                <div class="repsTile">
                    reps
                </div> 
            <?php } ?>
            <div style="clear:both"></div>
            <?php
                for($i=0;$i<7;$i++){?>
                    <input type="text" class="exName" name="<?php echo "exName$i"?>"/>
                    <input type="number" name="<?php echo "setsNumber$i"?>" class="sets">
                    <?php for($j=0;$j<5;$j++){?>
                        <input type="number" class="reps"  name="<?php echo "reps$i$j"?>"/>
                    <?php }?>
                    <input type="radio" name="type" id="">
                    <div style="clear:both"></div>
            <?php }?>
            <br>
            <button type="submit" name="saveTrainingBtn" id="saveTrainingBtn">Save</button>
        </form>
        <button onclick="addNewRow.js">+</button> 
        <span style="font-weight:bold;"> Add more exercises</span>
        </div>
        </div>
        <footer id="footer">
        Copyright 2022 &copy
        </footer>
    </body>
</html>
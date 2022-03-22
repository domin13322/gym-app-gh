<?php
if(isset($_POST['sets0'])){
    $sets=$_POST['sets0'];
    for($i=0;$i<$sets;$i++){
        ?>
    <input type="number" name="reps0" class="reps">
<?php
    }
}
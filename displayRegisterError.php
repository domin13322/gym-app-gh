<?php
if(isset($_SESSION['loginError'])){
?>
   <p class="error">
    <?php echo $_SESSION['loginError'];
?>
   </p>

   <?php
}
else if(isset($_SESSION['passwordError'])){
?>
   <p class="error">
    <?php echo $_SESSION['passwordError'];
?>
   </p>

   <?php
}
else if(isset($_SESSION['errorMail'])){
?>
   <p class="error">
    <?php echo $_SESSION['errorMail'];
?>
   </p>

<?php
}

else if(isset($_SESSION['statueError'])){
?>
   <p class="error">
    <?php echo $_SESSION['statueError'];
?>
   </p>

   <?php
}
?>

<div id="menu">
    <ul id="menuList">    
    <li class="menuItem"><a href="index.php">Main Page</a></li>
    <li class="menuItem"><a href="addTraining.php">Add practice</a></li>
    <li class="menuItem"><a href=#>Your results</a>
    <ul class="subMenu">
        <li class="subItem"><a href="lastWorkout.php">Workouts by date</a></li>
        <li class="subItem"><a href="suma.php">exercise progress</a></li>
    </ul>
    </li>
    <li class="menuItem"><a href="forumIndex.php">Forum</a></li>
    <li class="menuItem"><a href="acomplishments.php">Your Profile</a></li>
    <?php if(!isset($_SESSION['isLogged'])){?>
    <li class="sign"><a href="signIn.php">Sign in</a></li>
    <li class="sign"><a href="signUp.php">Sign up</a></li>
    <?php
    }
    else if($_SESSION['isLogged']==true){?>
    <li class="sign"><a href="logout.php">Log out</a></li>
    <?php }?>
</div>
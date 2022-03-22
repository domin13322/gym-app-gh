<?php
    session_start();
?>
    <!DOCTYPE html>

    <html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>Track your progress(forum)</title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"> 
        <link rel="stylesheet" href="img/fontello/css/fontello.css?v=<?php echo time(); ?>" type="text/css" />
        <link rel="stylesheet" href="img/fontello2/css/fontello.css?v=<?php echo time(); ?>" type="text/css" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="changeText.js" defer></script>
    </head>
    <body background="img/pexels-victor-freitas-685530.jpg">
    <div id="forumContainer">
        <div id="logo">Track your progress</div>
        <?php require_once "menu.php";?>
        <br>
        <div class="content">
            <h2 style="color:darkred;">Last added qestions</h2>
            <form class="searchForm" action="searchQuestion.php" method="post">
                <button class="searchBtn"><i class="icon-search"></i></button>
                <input type="text" name="searchQuestion" class="searchQuestion" placeholder="Search for questions" required>
            </form>
            <br>
            <br>
            <br>
            <?php
                require_once "connectToDb.php";
                $connect=new mysqli($host,$user,$password,$dbName);
                if($connect->connect_errno!=0){
                    echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
                }
                $search=$_POST['searchQuestion'];
                $result=$connect->query("SELECT * FROM forum WHERE title LIKE '%$search%'");

                require "askedQuestion.php";
            ?>
        </div>
        <nav class="forumMenu">
            <?php require_once "forumMenu.php" ?>
        </nav>
    </div>
    <footer id="footer">
        Copyright 2022 &copy
    </footer>
</body>
</html>
<?php
        $allResults=$result->num_rows;
        for($i=0; $i<$allResults;$i++){
            $record=$result->fetch_assoc();
            $title=$record['title'];
            $date=$record['questionDate'];
            $id=$record['questionId'];
            $answers=$record['answers'];
            $raiting=$record['raiting'];
?>
    <div class="askedQuestion">
        <div class="answersNumber" style="background-color:<?php
        if($answers>0) echo "rgb(78, 74, 74)"
        ?>;" >
            <br>
            <?= $answers ?> <br> answers
        </div>
        <div class="raiting">
            <br>
            <?= $raiting ?> <br> <i class="icon-thumbs-up-alt"></i>
        </div>
            <a href="question.php?n=<?= $id ?>"><h3 class="questionTitle"><?= $title ?></h3></a>
            added by <?= $record['user'] ?> on:<?= $date ?>    
    </div>
    <?php }
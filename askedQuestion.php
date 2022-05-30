<?php
        class Question{
            protected $title;
            protected $likes;
            protected $answerNumber;
            protected $date;
            protected $user;

            public function __construct($title,$likes,$answerNumber,$date,$user){
                $this->title=$title;
                $this->likes=$likes;
                $this->answerNumber=$answerNumber;
                $this->date=$date;
                $this->user=$user;
            }
            public function showQuestion($title,$likes,$answerNumber,$date,$user,$id){
                ?>
                    <div class="askedQuestion">
                        <div class="answersNumber" style="background-color:<?php
                        if($answerNumber>0) echo "rgb(78, 74, 74)"
                        ?>;" >
                            <br>
                            <?= $answerNumber ?> <br> answers
                        </div>
                        <div class="raiting">
                            <br>
                            <?= $likes ?> <br> <i class="icon-thumbs-up-alt"></i>
                        </div>
                            <a href="question.php?n=<?= $id ?>"><h3 class="questionTitle"><?= $title ?></h3></a>
                            added by <?= $user ?> on:<?= $date ?>    
                    </div>

                <?php
            }

        }
        $allResults=$result->num_rows;
        for($i=0; $i<$allResults;$i++){
            $record=$result->fetch_assoc();
            $title=$record['title'];
            $date=$record['questionDate'];
            $id=$record['questionId'];
            $answers=$record['answers'];
            $raiting=$record['raiting'];
            $user=$record['user'];
            $q=new Question($title,$raiting,$answers,$date,$user);
            $q->showQuestion($title,$raiting,$answers,$date,$user,$id)
?>
        
    <?php }
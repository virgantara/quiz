<?php include 'database.php'; ?>
<?php


if (isset($_POST['answers'])){


include_once "list_soal.php";

$Questions = getListSoal();



    $Answers = $_POST['answers']; // Get submitted answers.

    // Now this is fun, automated question checking! ;)
    $score = 0;
    foreach ($Questions as $QuestionNo => $Value){
        // Echo the question
        echo $Value['Question'].'<br />';

        if ($Answers[$QuestionNo] != $Value['CorrectAnswer']){
            echo '<span style="color: red;">'.$Value['Answers'][$Answers[$QuestionNo]].'</span>'; // Replace style with a class
        } else {
        	$score++;
            echo '<span style="color: green;">'.$Value['Answers'][$Answers[$QuestionNo]].'</span>'; // Replace style with a class
        }
        echo '<br /><hr>';
    }

    echo '<h1>Your Score : '.$score.'</h1>';
} 
?>

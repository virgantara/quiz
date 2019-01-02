<?php 

function getListSoal(){

include "database.php";

  $query = "select * from `quizes` where is_active = 1";

    //Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $quiz = $result->fetch_assoc();

  $qid = $quiz['id'];



  $query = "select * from `questions` where quiz_id = ".$qid;

    //Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

  $Questions = [];

  foreach($result as $item)
  {

    $subquery = "select * from `choices` where question_id = ".$item['id'];

    //Get result
    $subresult = $mysqli->query($subquery) or die($mysqli->error.__LINE__);
    $answer = $subresult->fetch_assoc();

    $answers = [];
    foreach($subresult as $subitem)
    {
      $answers[$subitem['alphabet']] = $subitem['choice'];
    }

    $subquery = "select * from `choices` where question_id = ".$item['id']." and is_correct = 1";

    //Get result
    $subresult = $mysqli->query($subquery) or die($mysqli->error.__LINE__);
    $answer = $subresult->fetch_assoc();

    $jawaban = '';
    foreach($subresult as $subitem)
    {
      $jawaban = $subitem['alphabet'];
    }

    $Questions[] = [
        'Question' => $item['question'],
        'Number' => $item['question_number'],
        'Answers' => $answers,
        'CorrectAnswer' => $jawaban
    ];   
  }

return $Questions;
}
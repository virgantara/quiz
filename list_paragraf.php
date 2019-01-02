<?php 

function getListSoal(){

include "database.php";

  $query = "select * from `quizes` where is_active = 1";

    //Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $quiz = $result->fetch_assoc();

  $qid = $quiz['id'];



  $query = "select * from `paragraphs` where quiz_id = ".$qid;

    //Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

  $Questions = [];

  foreach($result as $item)
  {

    
    //Get result
    
    
    $Questions[] = [
        'firstq' => $item['first_sentence'],
        'lastq' => $item['last_sentence'],
        'number' => $item['number'],
        'answer' => $item['answer'],
        
    ];   
  }

return $Questions;
}
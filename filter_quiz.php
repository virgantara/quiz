
<?php
session_start();

include_once "config.php";
include "database.php";

  $query = "select * from `quizes` where is_active = 1";

    //Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $quiz = $result->fetch_assoc();
  

    $query = "INSERT INTO participants (name, sid, email,quiz_id) VALUES ('".$_GET['name']."','".$_GET['sid']."','".$_GET['email']."',".$quiz['id'].");";
    $mysqli->query($query);

  $_SESSION['email'] = $_GET['email'];
  $_SESSION['name'] = $_GET['name'];
  $_SESSION['sid'] = $_GET['sid'];
  $_SESSION['quid'] = $quiz['id'];

  if($quiz['type']=='MULTI_CHOICE'){
    header('Location: '.$base_url.'/question.php');
  }
  else if($quiz['type'] == 'PARAGRAPH'){
    header('Location: '.$base_url.'/paragraph.php');
  }

?>

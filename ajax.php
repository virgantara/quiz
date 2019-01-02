<?php 
include "database.php";

 $query = "select * from `quizes` where is_active = 1";

    //Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $quiz = $result->fetch_assoc();

 $query = "select name, email,score from `participants` where quiz_id = ".$quiz['id']." order by score desc";

    //Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  

  $results = [];

  $sum = 0;
  $counter= 0;
while($item = mysqli_fetch_array($result))
{
	$counter++;
  	$sum += (double)$item['score'];
    $results['data'][] = [
    	'name' => $item['name'],
    	'email' => $item['email'],
        'score' => $item['score'],
        
    ];   
  }


  $avg = $sum / $counter;
  $results['avg'] = $avg;
  echo json_encode($results);
?>
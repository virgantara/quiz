<?php 
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>English Listening Test (ELT)</title>
  <link rel="stylesheet" href="<?=$base_url;?>css/screen.css">
  <script src="<?=$base_url;?>/lib/jquery.js"></script>
  <script src="<?=$base_url;?>/dist/jquery.validate.js"></script>
  <script>
  $.validator.setDefaults({
    submitHandler: function(form) {
      form.submit();
    }
  });

  $().ready(function() {
    // validate the comment form when it is submitted
    $("#commentForm").validate();

    // validate signup form on keyup and submit
   
  });
  </script>
  <style>
  #commentForm {
    width: 500px;
  }
  #commentForm label {
    width: 250px;
  }
  #commentForm label.error, #commentForm input.submit {
    margin-left: 253px;
  }
  
  </style>
</head>
<body>

<?php include 'database.php'; ?>
<?php

session_start();
if (isset($_POST['answers'])){


include_once "list_paragraf.php";

$Questions = getListSoal();



    $Answers = $_POST['answers']; // Get submitted answers.
    
    // Now this is fun, automated question checking! ;)
    $score = 0;


     foreach ($Questions as $key => $item){ 
        // Echo the question


        if ($Answers[$key] != $item['answer']){
            echo '<span style="color: red;">'.$Answers[$key].'</span>'; // Replace style with a class
            echo '<span>Correct Answer: '.$item['answer'].'</span>';
        } else {
            $score++;
            echo '<span style="color: green;">'.$Answers[$key].'</span>'; // Replace style with a class
        }
        echo '<br /><hr>';
    }

    $total_score = $score / count($Questions)  * 100;
    echo '<h1>Your Score : '.($total_score).'</h1>';
    echo 'Thank you '.$_SESSION['name'].' for participating in this quiz';

    $query = "UPDATE participants SET score = ".$total_score." WHERE email = '".$_SESSION['email']."' AND quiz_id = ".$_SESSION['quid'].";";
    $mysqli->query($query) or die(mysqli_error($mysqli));

session_destroy();
} 
?>

</body>
</html>

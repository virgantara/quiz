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
<?php 
include "database.php"; 

include_once "list_soal.php";
?>
<?php 







  //Get result

$Questions = getListSoal();



?>
    <form action="process.php" method="post" id="quiz" >


    <?php 
    foreach ($Questions as $QuestionNo => $Value){ 




    	?>
        <h3 style="margin-left:50px"><?=$Value['Number']; ?>. <?=$Value['Question']; ?></h3>
        <?php 
            foreach ($Value['Answers'] as $Letter => $Answer){ 
            $Label = 'question-'.$QuestionNo.'-answers-'.$Letter;
        ?>
        <div style="margin-left:60px">
            <input type="radio" checked name="answers[<?php echo $QuestionNo; ?>]" id="<?php echo $Label; ?>" value="<?php echo $Letter; ?>" />
            <label for="<?php echo $Label; ?>"><?php echo $Letter; ?>) <?php echo $Answer; ?> </label>
        </div>
        <?php } ?>
    <?php } ?>
    <input style="margin-left:60px" type="submit" value="Submit Quiz" />
    </form>

</body>
</html>

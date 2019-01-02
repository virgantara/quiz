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

include_once "list_paragraf.php";
?>
<?php 



// $query = "INSERT INTO participants (name, sid, email) VALUES ('".$_GET['name']."','".$_GET['sid']."','".$_GET['email']."');";
// $mysqli->query($query);



  //Get result

$Questions = getListSoal();



?>    <form action="process_paragraph.php" method="post" id="quiz" >

 <p style="margin:10px;font-size: 18px;text-align: justify;">

    <?php 
    foreach ($Questions as $key => $item){ 




    	?>
     
        <?=$item['firstq'] == '-' ? '' : $item['firstq'];?>
        <sup>(<?=($key+1);?>)</sup> <input type="text" size="10" name="answers[<?=$key;?>]">
        <?=$item['lastq'] == '-' ? '' : $item['lastq'];?>
    <?php } ?>
</p><br>
    <input style="margin-left:60px;padding: 5px;font-size: 18px" type="submit" value="Submit Quiz" />
    </form>

</body>
</html>

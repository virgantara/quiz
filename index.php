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
<h1 id="banner">English Listening Test (ELT)</h1>
<div id="main">
  
  <form class="cmxform" id="commentForm" method="GET" action="<?=$base_url;?>filter_quiz.php">
    <fieldset>
      <legend>Please provide your name, email address and student ID</legend>
      <p>
        <label for="cname">Name (required, at least 2 characters)</label>
        <input id="cname" name="name" minlength="2" type="text" required>
      </p>
      <p>
        <label for="cemail">E-Mail (required)</label>
        <input id="cemail" type="email" name="email" required>
      </p>
      <p>
        <label for="csid">Student ID (required)</label>
        <input id="csid" type="text" name="sid" required>
      </p>
      <p>
        <input class="submit" type="submit" value="Submit">
      </p>
    </fieldset>
  </form>
 
  
</div>
</body>
</html>

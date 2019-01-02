<?php 
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin | English Listening Test (ELT)</title>
  <link rel="stylesheet" href="<?=$base_url;?>css/screen.css">
  
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
<h1 id="banner">Admin | English Listening Test (ELT)</h1>
<h2>Participants:</h2>
<ol style="margin-left: 50px" id="participants"></ol>
<script src="<?=$base_url;?>/lib/jquery.js"></script>
  <script src="<?=$base_url;?>/dist/jquery.validate.js"></script>
  <script>
  $.validator.setDefaults({
    submitHandler: function(form) {
      form.submit();
    }
  });

  $(document).ready(function() {
    // validate the comment form when it is submitted
    $("#commentForm").validate();
    setInterval(function() {
      $.ajax({

      type : 'POST',
      url : '<?=$base_url;?>ajax.php',
      success : function(data){

        var data = $.parseJSON(data);
        var row = '';

        $('#participants').empty();

        $.each(data.data, function(i,obj){
          row += '<li>'+obj.name+' Score: '+obj.score+'</li>';
        });        

        $('#participants').append(row);        
      }
    });
    }, 1000); 
    
    // validate signup form on keyup and submit
   
  });
  </script>
</body>
</html>

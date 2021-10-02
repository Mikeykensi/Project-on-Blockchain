<!-- PHP page for password reset -->

<?php
  
  session_start();
  $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "admin";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

  $newpass = $_POST['newp'];
  $repass = $_POST['repass'];
  $email = $_SESSION["Email"];
  $pass = $_SESSION["Pass"];
  $message = "";
  $result = "";
  if($newpass == $repass)
  {
  $sql = "UPDATE `adminlogin` SET `Password`= '$newpass' WHERE `Email` = '$email' AND `Password` = '$pass'"; 
  $result = mysqli_query($con, $sql);
  }
  else
  {
    $message= "Please enter same password!";
  }
?>

<!DOCTYPE html>
<html>
<head>
   <title>Settings</title>
   <link rel="stylesheet" type="text/css" href="css/reset.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form method="POST" action="reset.php">
  <div class="container">
    <h1 align="center"><b>Reset Password</b></h1>
    <hr>

    <label for="new"><b>Enter New Password</b></label>
    <input type="password" name="newp" id="newp" required>

    <label for="re-enter"><b>Re - Enter New Password</b></label>
    <input type="password" name="repass" id="repass" required>
    <hr>

    <button type="submit" class="save" id="save">Save</button>
    <button type="button" class="back" onclick="location.href='settings.php'">Back</button>
</div>
    <?php

       if($result)
       { 
          echo "Password Successfully Updated";
          $_SESSION["Pass"] = $newpass;
       }
       else
       {?>
        <script type="text/javascript">
         alert($message);
         window.location.href = "reset.html";
       </script>
       <?php
       }
    ?>
</form>
</body>
</html>
<!-- Settings page for admin -->

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

    $email = $_SESSION["Email"];
    $pass = $_SESSION["Pass"];

    $sql = "SELECT * from `adminlogin` WHERE `Email` = '$email' AND `Password` = '$pass'"; 
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
   <title>Settings</title>
   <link rel="stylesheet" type="text/css" href="css/settings.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
       <form>
  <div class="container">
    <h1 align="center"><b>Settings</b></h1>
    <hr>

    <label for="fname"><b>Name</b></label>
    <input type="text" value="<?php echo $row["Name"]?>" name="fname" id="fname" readonly>

    
    <label for="email"><b>Email Id</b></label>
    <input type="email" value="<?php echo $row["Email"]?>" name="email" id="email" readonly>

    <label for="password"><b>Password</b></label>
    <input type="password" value="<?php echo $row["Password"]?>" name="passwrd" id="pass">
    <hr>

    <button type="button" class="passchange" id="changep" onclick="location.href='reset.html'">Change Password</button>
  </div>
  </form>
</body>
</html>
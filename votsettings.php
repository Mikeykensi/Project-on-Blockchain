<!-- Settings page for voters -->

<?php
session_start();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "voter";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $adhaar = $_SESSION["Adhaar"];
    $pass = $_SESSION["Password"];
    $name = $_SESSION["Name"];
    $email = $_SESSION["Emailid"];

    $sql = "SELECT * from `voterlogin` WHERE `adhaarno` = $adhaar AND `pass` = '$pass'"; 
        $result = mysqli_query($con, $sql); 
        $count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
   <title>Settings</title>
   <link rel="stylesheet" type="text/css" href="css/votsettings.css">
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
    <input type="text" value="<?php echo $name?>" name="fname" id="fname" readonly>

    <label for="email"><b>Email Id</b></label>
    <input type="email" value="<?php echo $email?>" name="email" id="email" readonly>

    <label for="adhar"><b>Adhaar Number</b></label>
    <input type="number" value="<?php echo $adhaar?>" name="adhar" id="adhar" readonly>

    <label for="password"><b>Password</b></label>
    <input type="password" value="<?php echo $pass?>" name="passwrd" id="pass" readonly>
    <hr>

    <button type="button" class="passchange" id="changep" onclick="location.href='votreset.html'">Change Password</button>
  </div>
  </form>
</body>
</html>
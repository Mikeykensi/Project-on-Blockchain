<!-- Admin Login page -->

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Admin Login</title>
   <link rel="stylesheet" type="text/css" href="css/adlogin.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form name="adlogin" action="admlogin.php" method="post">
  <div class="imgcontainer">
    <img src="/project/images/admin.jpg" alt="Voting" class="voting">
  </div>

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <button type="button" onclick="location.href='index.html'">Back to Home Page</button>
  </div>

  <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        ?>
                        <script type="text/javascript">
                          alert("Invalid Email or Password");
                        </script>
                        <?php
                    }
                ?>  
</form>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>
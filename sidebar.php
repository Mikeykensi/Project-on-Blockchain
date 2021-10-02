<!-- Sidebar for Admin Page -->

<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title>E - Voting</title>
   <link rel="stylesheet" type="text/css" href="css/sidebar.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 
	<div class="sidenav">
    <center>
      <h4>Hello! <br> <?php echo substr($_SESSION["Email"],0,strpos($_SESSION["Email"], "@")) ?></h4>
    </center>
  <a href="home.php" target="dashcontent">Dashboard</a>
  <a href="blockchain.php" target="dashcontent">Blockchain</a>
  <a href="addvoter.php" target="dashcontent">Voting</a>
  <a href="results.php" target="dashcontent">Results</a>
  <a href="settings.php" target="dashcontent">Settings</a>
  <a href="adlogin.php" target="_top">Logout</a>
</div>


</body>
</html>

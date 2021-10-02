<!-- Sidebar for Voter Page -->

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
      <h4>Hello! <br> <?php echo $_SESSION["Name"]?></h4>
    </center>
  <a href="vothome.php" target="dashcontent">Dashboard</a>
  <a href="votblockchain.php" target="dashcontent">Blockchain</a>
  <a href="votVoting.php" target="dashcontent">Voting</a>
  <a href="votResults.php" target="dashcontent">Results</a>
  <a href="votsettings.php" target="dashcontent">Settings</a>
  <a href="votlogin.php" target="_top">Logout</a>
</div>


</body>
</html>

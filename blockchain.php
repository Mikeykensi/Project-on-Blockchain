<!-- Blockchain Page for admin -->

<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Blockchain</title>
   <link rel="stylesheet" type="text/css" href="css/blockchain.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="block">
            <div class="paillier">
              <a href="paillier.php">
                <img src="/project/images/keygen.png" alt="Key" class="generate">
              </a>
              <h4 for="keygen" class="keypaill">Generate Paillier's Keys</h4>
            </div>
            
            <div class="slrs">
              <a href="slrs.php">
                <img src="/project/images/sign.jpeg" alt="para" class="parameter">
              </a>
              <h4 for="param" class="slrspara">Generate SLRS Parameters</h4>
            </div>

    </div>
</body>
</html>

   
	
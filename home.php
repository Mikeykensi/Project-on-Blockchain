<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Blockchain</title>
   <link rel="stylesheet" type="text/css" href="css/dash.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/contractmethods.js"></script>
    <script type="text/javascript" src="js/ContractABI.js"></script>

</head>
<body>
  <div class="main">
  <div class="block">
            <div class="ethereum">
                <img src="/project/images/balance.png" alt="Balance" class="bal">
              <h5 for="balance" class="ethbalan" id = "ethbalance"></h5>
              <h4>Ethereum Balance </h4>
            </div>
            
            <div class="voters">
                <img src="/project/images/voters.jpg" alt="voters" class="voter">
              <h5 for="nvoter" class="vote" id="vote"></h5>
                <h4>Total Voters </h4>
            </div>

            <div class="voted">
                <img src="/project/images/blockv.png" alt="voted" class="nvoted">
              <h5 for="nvoter" class="cvoted" id = "cvoted"></h5>
              <h4> Voted</h4>
            </div>

            
    </div>
    <br>

      <div class="startv">
            <a onclick="location.href = 'cands.php'">
                <img src="/project/images/start.jpg" alt="start" class="start">
            </a><br>
            <h3>Click on the image to view Candidates</h3>
            </div>
        <form name="vot" action="dash.php" method="post">
           <button type="submit">Start Voting</button>
        </form>
</div>

<script type="text/javascript">
          getDetails();
           
</script>
</body>
</html>
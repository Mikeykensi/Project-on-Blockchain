<?php
  session_start();
?>
<html>
  <head>
    <title>Result</title>
    <link rel="stylesheet" type="text/css" href="css/demoresults.css">
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
   <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Playfair+Display+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/contractmethods.js"></script>
    <script language="javascript" type="text/javascript" src="js/ContractABI.js"></script>

  </head>
  <body>
    <div id="container" class="container"></div>
    <div id="winner" class="winner">
       <h1 id="win" class="win"><b>Winner</b></h1>
       <h2 id="name" class="name"></h2>
       <h3 id="descrip" class="descrip"></h3>
       <h3 id="vote" class="vote"></h3>
    </div>
    <div>
      <button class="trigger" id="trigger" onclick="triggertal()"><b>Trigger</b></button>
    </div>
    <script type="text/javascript">
    	anychart.onDocumentReady(function()
    	{   
    		getVotecounts();

        getWinner();
     
    	});
      function triggertal()
      {
         triggerTally();
         calculateWinner(); 

      }
    </script>
  </body>
</html>
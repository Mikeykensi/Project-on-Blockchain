<?php
   session_start();
   $id = $_SESSION["Id"];
 ?>
<!DOCTYPE html>
<html>
<head>
   <title>Candidates</title>
   <link rel="stylesheet" type="text/css" href="css/votvoting.css">
   <meta name="viewport" content = "width=device-width, initial-scale=1.0">
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
  
	<div class="candidates" id="candidates">
		<div class="cands" id= "cands">
      <div id="cand1" class="cand1">
			   <h3 class ="name" id = "r1"></h3>
			   <h4 class = "desc" id="r2"></h4>
			   <button type="button" class="votbutton" onclick="get_id(this.id)" id="r3"><b>Vote</b></button>
      </div>
		</div><br>
		<div class="nocand" id="nocand">
			<h3>No Candidates to Display</h3>

		</div>
		</div>

    <div id="myModal" class="modal">

       <div class="modal-content">
             <div class="modal-header">
               <span class="close">&times;</span>
               <h3>Vote</h3>
           </div>
           <div class="modal-body">
              <form>
                <br>
               <label for="id"><b>ID</b></label><br>
               <input type="number" placeholder="Enter the ID of the voter" value="<?php echo $id?>" name="id" id="ID" required><br>

               <label for="name"><b>SLRS Private Key</b></label><br>
               <input type="number" placeholder="Enter SLRS Private Key" name="slrskey" id="slrskey" required><br>

               <label for="descrip"><b>Epsilon</b></label><br>
               <input type="number" placeholder="Enter Epsilon Value" name="epsilon" id="epsilon" required><br>
              </form>
           </div>
           <div class="modal-footer">
               <button type="button" name="getepsilon" id="getepsilon" class="getepsilon" onclick="Epsilon()"><b>Get Epsilon</b></button>
               <button type="button" name="candid" id="candid" class="candid" onclick="vote()"><b>Vote</b></button>
           </div>
         </div>   
       </div>

    <div class="verify" id = "authenticate">
      <input type="number" class="text" value="<?php echo $id?>" id="voterid" readonly>      
      <h2 id="displayon"> Please Authenticate Yourself First !!</h2>
      <image src = "images/authen.gif" height= "400px" width="800px">
     </image>
     </div>
    <div>   
      <button id="display" class="addcand" onclick="run()">Display</button>
    </div>
		  <script type="text/javascript">

         var candId;
         var voterid = document.getElementById("voterid").value;
         var cand1 = document.getElementById("authenticate");
         var button = document.getElementById("display");
         var CandContract = initializeContract();
         CandContract.methods.verify(voterid).call().then(function(result)
         {
              if(result)
              {
                  cand1.style.display = "none";
                  button.style.display = "inline";
              }
              else
              {
                  alert("You have not yet completed verification.");
              }
         });
        function run()
        {
          var cand = document.getElementById("candidates");
          cand.style.display = "inline";
          voterDisplay();
          button.style.display = "none";
        }

        function get_id(clicked_id)
        {
             candId = clicked_id;
             candId = candId.substr(1);
             candId = parseInt(candId);
             console.log(candId);
             var modal = document.getElementById("myModal");

             // Get the button that opens the modal
             var btn = document.getElementById(clicked_id);

             // Get the <span> element that closes the modal
             var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
             btn.onclick = function() {
             modal.style.display = "block";
             }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal) {
            modal.style.display = "none";
            }
           }
  
        }

        function Epsilon()
        {
            console.log(candId);
            getEpsilon((candId/3));
        }
        
        function vote()
        {
            console.log(candId);
            voterVote((candId/3));
        }

        

    </script>
</body>
</html>
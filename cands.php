<?php
   session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
   <title>Candidates</title>
   <link rel="stylesheet" type="text/css" href="css/cands.css">
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
	<div class="candidates">
		<div class="cands" id= "cands">
      <div id="cand1" class="cand1">
			   <h3 class ="name" id = "r1"></h3>
			   <h4 class = "desc" id="r2"></h4>
			   <button type="button" class="votbutton" id="r3"><b>Vote</b></button>
      </div>
		</div><br>
		<div class="nocand" id="nocand">
			<h3>No Candidates to Display</h3>

		</div>
		   <button type="button" class="addcand" id="add" onclick="modal()"><b>Add Candidate</b></button>
		</div>
		<div id="myModal" class="modal">

		   <div class="modal-content">
             <div class="modal-header">
               <span class="close">&times;</span>
               <h3>Add Candidate</h3>
           </div>
           <div class="modal-body">
           	  <form>
           	  	<br>
               <label for="id"><b>ID</b></label><br>
               <input type="number" placeholder="Enter the ID of the candidate" name="id" id="ID" required><br>

               <label for="name"><b>Name</b></label><br>
               <input type="text" placeholder="Enter Candidate Name" name="candname" id="candname" required><br>

               <label for="descrip"><b>Description</b></label><br>
               <input type="text" placeholder="Enter description" name="descrip" id="descrip" required><br>
              </form>
           </div>
           <div class="modal-footer">
               <button type="button" name="candid" id="candid" class="candid" onclick="add()"><b>Add</b></button>
           </div>
         </div>		
       </div>
    <script type="text/javascript">
         
         function modal()
         {
         	// Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("add");

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

         //function to add candidate

         function add() {
            
            addCandidate();
         }

         displayCandidate();
         

    </script>
</body>
</html>
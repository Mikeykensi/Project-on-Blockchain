<!-- Voting page for adding a voter -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting</title>
    <link rel="stylesheet" href="css/voting.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    
</head>

<body>
    <div class="container">
        <h2><b> Add Voter </b></h2>
        <form action="voting.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">Voter Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Voter Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email id" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Adhaar Number</label>
                <input type="text" class="form-control" id="adhaarn" name="adhaarno" placeholder="Enter Adhaar No" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" tabindex="4" required></textarea><br>
 
            </div>
            <div>
                <button type="button" onclick="generateP()" class="btnpass"> Generate Password </button><br>
                <button type="submit" class="btn">Update Database!</button><br>
                 
      
            </div>
        </form>
    </div>
   <script type="text/javascript"> 
        var el_down = document.getElementById("message"); 
        /* Function to generate combination of password */ 
        function generateP() { 
            var pass = ''; 
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +  
                    'abcdefghijklmnopqrstuvwxyz0123456789@#$'; 
              
            for (i = 1; i <= 8; i++) { 
                var char = Math.floor(Math.random() 
                            * str.length + 1); 
                  
                pass += str.charAt(char) 
            } 
              
            el_down.innerHTML = pass
        } 
 
    </script>
    
</body>

</html>

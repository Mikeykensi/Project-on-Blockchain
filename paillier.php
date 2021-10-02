<!-- Paillier key generation page -->

<?php 
  session_start();
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keys</title>
    <link rel="stylesheet" href="css/paillier.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/contractmethods.js"></script>
    <script language="javascript" type="text/javascript" src="js/ContractABI.js"></script>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="form">
            <div class="form-group">
                <label for="klen" class="form-label">Key Length</label>
                <input type="number" class="form-control" id="klen" name="klen" placeholder="Enter Key Length" tabindex="1" required>
            </div>
            <div class="form-group" style="float: left;">
                <label for="private" class="form-label">Private Key</label>
                <textarea class="form-control" rows="5" cols="50" id="private" name="private" placeholder="Private Key" tabindex="4" readonly></textarea>
                <h3 style="color: red;">Please Save your Private key.</h3>
            </div>
            <div class="form-group" style="float: left;">
                <label for="public" class="form-label">Public Key</label>
                <textarea class="form-control" rows="5" cols="50" id="public" name="public" placeholder="Public Key" tabindex="4" readonly></textarea>
            </div>
            <div>
                <button type="button" class="btn" onclick="Upload()">Upload</button>
                <button type="button" id="genkey" onclick="run()" class="btnpass"> Generate Keys </button> 
    <br> 
      
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/jsbn.js"></script>
    <script type="text/javascript" src="js/jsbn2.js"></script>
    <script type="text/javascript" src="js/prng4.js"></script>
    <script type="text/javascript" src="js/rng.js"></script>
    <script type="text/javascript" src="js/paillier.js"></script>
<script type="text/javascript">
    var keys;
    function run() {
        var len;
            var numBits = parseInt($('#klen').val());
            console.log(numBits);
            if (numBits % 2 === 0) {
                keys = paillier.generateKeys(numBits); 
                publicKey = keys.pub.n.toString();
                console.log(publicKey);
                privateKey = keys.sec.lambda.toString();
                console.log(privateKey);
                document.getElementById('private').value = privateKey;
                document.getElementById('public').value = publicKey;          
            } else {
                alert("Please enter an even number of bits :)");
            }

            len = 20;
            var zero = new Array(len).fill(0);
            var zeroEncrypt = new Array();
            for(var i=1 ; i<= zero.length ; i++)
            {
                encA = keys.pub.encrypt(nbv(zero[i]));
                encCand = keys.pub.encrypt(nbv(i));
                epsilon = keys.pub.add(encA,encCand);
                epsilon = epsilon.toString();
                epsilon = epsilon.substr(0,77);
                zeroEncrypt.push(epsilon);
            } 

            uploadEpsilon(zeroEncrypt);
        
          }
        
           function Upload()
            {
                uploadPaillier();
            }
    

</script>
</body>
</html>
   
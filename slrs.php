<!-- SLRS parameter generation page -->

<?php 
  session_start();
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLRS</title>
    <link rel="stylesheet" href="css/slrs.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/node-forge@0.7.0/dist/forge.min.js"></script>
    <script src="https://peterolson.github.io/BigInteger.js/BigInteger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/contractmethods.js"></script>
    <script language="javascript" type="text/javascript" src="js/ContractABI.js"></script>
    
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="form">
            <div class="form-group">
                <label for="klen" class="form-label">Key Length</label>
                <input type="number" class="form-control" id="klen" name="klen" placeholder="Enter Key Length" tabindex="1" required><br>

                <h4 style="color: red;">Params</h4>

                <label for="k" class="form-label">K</label>
                <textarea class="form-control" rows="5" cols="50" id="k" name="k" placeholder="Value of parameter K" tabindex="2" readonly></textarea>

                <label for="l" class="form-label">L</label>
                <textarea class="form-control" rows="5" cols="50" id="l" name="l" placeholder="Value of parameter L" tabindex="3" readonly></textarea>

                <label for="N" class="form-label">N</label>
                <textarea class="form-control" rows="5" cols="50" id="n" name="n" placeholder="Value of parameter N" tabindex="4" readonly></textarea>

                <label for="e" class="form-label">e</label>
                <textarea class="form-control" rows="5" cols="50" id="e" name="e" placeholder="Value of parameter e" tabindex="5" readonly></textarea>

                <label for="H1" class="form-label">H1</label>
                <textarea class="form-control" rows="5" cols="50" id="h1" name="h1" placeholder="Value of parameter H1" tabindex="6" readonly></textarea><br><br>
                
            </div>
            <div>
                <button type="button" class="btn" onclick="uploadpara()">Upload</button>
                <button type="button" id="genkey" onclick="run()" class="btnpass"> Generate Parameters </button> 
    <br> 
      
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/jsbn.js"></script>
    <script type="text/javascript" src="js/jsbn2.js"></script>
    <script type="text/javascript" src="js/prng4.js"></script>
    <script type="text/javascript" src="js/rng.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
    <script type="text/javascript" src="js/sha256.js"></script>
    <script type="text/javascript" src="js/slrsgen.js"></script>
<script type="text/javascript">    

function run() {
    var k,l,n,ep,H1,H2,p,q,d;
     var numBits = parseInt($('#klen').val());
     param = slrs.setup(numBits);
     k = numBits;
     l = param.l;
     n = param.N.toString();
     e = param.e;
     H1 = param.H1;
     p = param.p;
     q = param.q;
     d = param.d;
     document.getElementById('k').value = k;
     document.getElementById('l').value = l;
     document.getElementById('n').value = n;
     document.getElementById('e').value = e;
     document.getElementById('h1').value = H1;
       
}

   function uploadpara()
   {
     uploadSLRSParam();
   }
</script>
</body>
</html>
function modInverse(a, m)
{
let g = gcdLarge(a, m);
    if (g != 1)
        console.log("Inverse doesn't exist");
    else
    {
        // If a and m are relatively prime, then modulo
        // inverse is a^(m-2) mode m
        console.log("Modular multiplicative inverse is "
             + power(a, m - 2, m));
    }
}
 
// To compute x^y under modulo m
function power(x, y, m)
{
    if (y == 0)
        return 1;
    let p = power(x, parseInt(y / 2), m) % m;
    p = (p * p) % m;
 
    return (y % 2 == 0) ? p : (x * p) % m;
}
 
// Function to return gcd of a and b
function gcd(a, b)
{
    if (!a)
        return b;
    return gcd(b % a, a);
}

function reduceB( a,  b)
{
    // Initialize result
    let mod = 0;
 
    // calculating mod of b with a to make
    // b like 0 <= b < a
    for (let i=0; i<b.length-1; i++)
        mod = (mod*10 + b[i] - '0')%a;
 
    return mod; // return modulo
}
 
 function reduceA( a,  b)
{
    // Initialize result
    let mod1 = 0;
 
    // calculating mod of b with a to make
    // b like 0 <= b < a
    for (let i=0; i<a.length-1; i++)
        mod1 = (mod1*10 + a[i] - '0')%b;
 
    return mod1; // return modulo
}

function gcdLarge( a, b)
{
    let num1 = reduceA(a, b);
    let num2 = reduceB(a,b);
    // gcd of two numbers
    return gcd(num1, num2);
}

function findRandom() {
	    // Generate the random number
         let ra =
         (1 + parseInt((Math.random() * 100))) % 2;
 
         // Return the generated number
         return ra;
     }
 
     // Function to generate a random
     // binary string of length N
     function randBinary(N) {
 
         // Stores the empty string
         let S = "";
 
         // Iterate over the range [0, N - 1]
         for (let i = 0; i < N; i++) {
 
             // Store the random number
             let x = findRandom();
 
             // Append it to the string
             S += (x).toString();
         }
 
         // Print the resulting string
         return S;
     }

 

slrs = {

	setup : function(bits) {
            var e;
            const L = 200;
            let keyPair = forge.pki.rsa.generateKeyPair(bits);
            let key1 = keyPair.privateKey.p;
            let key2 = keyPair.privateKey.q;
            let p = key1.toString(10);
            let q = key2.toString(10);
            let p1 = BigInt(p) - BigInt('1');
            let q1 = BigInt(q) - BigInt('1');
            let phi = ((q1)*(p1));
            const N = (BigInt(p) * BigInt(q)).toString();
            console.log("p is " + p);
            console.log("q is " + q);
            console.log("N is "+ N);
            console.log("phi is "+ phi );
            e = keyPair.publicKey.e;
            e = e.toString();
            let d = keyPair.privateKey.d;
            d = d.toString();
            console.log("d is " + d);
            console.log("e is " + e);
            var H1 = CryptoJS.SHA256(randBinary(bits));
            H1 = H1.toString();
            var H2 = CryptoJS.SHA256(randBinary(L));
            H2 = H2.toString();
            console.log(H1);
            console.log(H2);
            var id = BigInt(5);
            console.log(id);
            var h1int = BigInt(parseInt(H1,16));
            h1int = h1int.toString();
            var len = h1int.length;
            h1int = h1int.substr(0,len-1);
            console.log(h1int);
            var h2int = BigInt(parseInt(H2,16));
            h2int = h2int.toString();
            var leng = h2int.length;
            h2int = h2int.substr(0,leng-1);
            console.log(h2int);

            this.k = bits;
            this.l = L;
            this.N = N;
            this.e = e;
            this.d = d;
            this.H1 = h1int;
            this.H2 = h2int;
            this.p = p;
            this.q = q;

          return this;
  }

}
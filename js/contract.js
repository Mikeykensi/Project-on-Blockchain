  
    // function to initiate contract
	function initializeContract() {
		 if (typeof window.web3 !== 'undefined') 
        {
         window.web3 = new Web3(window.web3.currentProvider);
         window.ethereum.enable();
         } 
        else 
        {
         // set the provider you want from Web3.providers
        web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:7545"));
         }
         return new web3.eth.Contract(CandidateABI,"0x939103f5ae8539ca38c656121db9e29b98189a5e");

	}
    
    //function to get the ethereum balance, voters voted and total voters for home page
	function getDetails(){

		var CandContract = initializeContract();
         //get balance of account
         address = "0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133";
         try {
                web3.eth.getBalance(address, function (error, wei) {
                    if (!error) {
                        var balance = web3.utils.fromWei(wei, 'ether');
                        document.getElementById("ethbalance").innerHTML = balance + " ETH";
                   
                    }
                });
            } catch (err) {
                   document.getElementById("ethbalance").innerHTML = err;
                   alert(err);
            }

          //get total number of voters
          CandContract.methods.voternum().call().then(function(result){
              document.getElementById("vote").innerHTML = result;  
          });

          //get total number of voters voted
          CandContract.methods.voterVoted().call().then(function(result){
              document.getElementById("cvoted").innerHTML = result;  
          });
	}

     // function to retrieve and display all the candidates if present
    function displayCandidate() {
    	  var totalcand;
        var cand1 = document.getElementById("cands");
        var cand2 = document.getElementById("nocand");

         // initiate contract
         var CandContract = initializeContract();
         CandContract.methods._getValues().call().then(function(result)
         	{
         		totalcand = result[0];
    
         		if (totalcand == 0)
         		{
         			// if no candidate
         			display1(totalcand);
         		}
         		else if(totalcand>0)
         		{
         			//display all candidates
         			display2(totalcand);
         		}
         	});
         
         // function to display nocand division
         function display1(tocand)
         {  
         	var cand1 = document.getElementById("cands");
            var cand2 = document.getElementById("nocand");
         	cand2.setAttribute('style','display : inline');
         	cand1.setAttribute('style','display : none');
         }
         
         // function to display all candidates
         function display2(tocand)
         {
         	var cand1 = document.getElementById("cands");
          var cand2 = document.getElementById("nocand");
          cand2.style.display = "none";
          cand1.style.display = "inline";
            
         	for (let i=1,n = 1 ; i<=tocand ; i++,n=n+3)
         	{      
         		   // calling create function
                   create(i,n);
                   CandContract.methods.cands(i).call().then(function(result)
                   {     
                 
                         document.getElementById("r"+ n).innerHTML = result[0] + " . " + result[1] + "\n";
                         document.getElementById("r" + (n+1)).innerHTML = result[2];

                   });
         	}	 
         }
         
         // function to create a division for new candidate
         function create(n,i)
         {
         	// Initialte all variables
         	      var toAdd = document.getElementById("cands");
         	  	  var add = document.querySelector(".addcand");
         	  	  var cand = document.getElementById("cand"+ n);
         	  	  var addb = document.getElementById("add");

         	  	  // Create New division
                  var newdiv = document.createElement('div');
                  newdiv.id = 'cand'+ (n+1);
                  newdiv.className = 'cand1';
                  newdiv.style.display = "none";

                  // Create new h3 element
                  var newh3 = document.createElement('h3');
                  newh3.id = 'r'+ (i+3);
                  newh3.className = 'name';

                  //create new h4 element
                  var newh4 = document.createElement('h4');
                  newh4.id = 'r' + (i+4);
                  newh4.className = 'desc';

                  // create new voter button
                  var newbutton = document.createElement('button');
                  var br = document.createElement('br');
                  newbutton.id = 'r'+ (i+5);
                  newbutton.className = 'votbutton';
                  newbutton.type = 'button';
                  newbutton.setAttribute("onClick",'get_id(this.id)');
                  newbutton.innerHTML ='Vote';

                  // styling of the vote button
                  var but = document.querySelector(".votbutton");
                  var styleb = getComputedStyle(but);
      			      var marginb = parseInt(styleb.top);
      			      marginb *= (n+1);
      			      marginb= marginb.toString();
      			      marginb = marginb + 'px';
                  newbutton.style["top"] = marginb;

                  // styling of the content border
                  var border = document.querySelector(".cand1");
                  var stylebor = getComputedStyle(border);
      			      var topbor = parseInt(stylebor.top);
      			      topbor *= (n+1) ;
      			      topbor= topbor.toString();
      			      topbor = topbor + 'px';
                  newdiv.style["top"] = topbor;

                  // append chilren to division
                  newdiv.appendChild(newh3);
                  newdiv.appendChild(newh4);
                  newdiv.appendChild(newbutton);
                  newdiv.appendChild(br);
                  newdiv.appendChild(br);

                  // styling the addcandidate button
                  var style = getComputedStyle(add);
			      var margin = parseInt(style.marginTop);
			      margin += 90;
			      margin= margin.toString();
			      margin = margin + 'px';
			      addb.style["margin-top"] = margin;

			      //append the division to parent division
                  toAdd.appendChild(newdiv);
                  cand.style.display = "inline";
               
         }

    }

    // function to add Candidate
    function addCandidate()
    {
    	    alert("Loading Please Wait...!");
    	    var id = parseInt(document.getElementById("ID").value);
            var name = document.getElementById("candname").value;
            var descr = document.getElementById("descrip").value;

            var CandContract = initializeContract();
            CandContract.methods._createCand(id,name,descr).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(err,result)
            {
       
                  alert("Candidate Successfully Created");
                  window.location.href = "cands.php";
            });
    }

    // function to upload paillier public key
    function uploadPaillier()
    {
    	    var public = document.getElementById("public").value;
    	    var CandContract = initializeContract();
            CandContract.methods._getPailKey(public).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(result)
            {
                  console.log(result);
                  if(result)
                  {
                  	alert("Upload Successfull");
                  }
                  else
                  {
                  	alert("Error Uploading Key");
                  }
            });
    }
    
    // function to upload SLRS Parameters
    function uploadSLRSParam()
    {
    	var k = document.getElementById('k').value ;
        var l = document.getElementById('l').value ;
        var N = document.getElementById('n').value ;
        var e = document.getElementById('e').value ;
        var H1 = document.getElementById('h1').value ;
        var H2 = document.getElementById('h2').value ;
        var param = slrs.setup(parseInt(k));
        var d = param.d;
        var CandContract = initializeContract();
            CandContract.methods._getSLRSparam(k,l,N,e,d,H1,H2).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(result)
            {
                
                  if(result)
                  {
                  	alert("Upload Successfull");
                  }
                  else
                  {
                  	alert("Error Uploading Parameters");
                  }
            });   
    }
	
    
    // function to Create a voter
    function createVoter()
    {
      
      var id = document.getElementById("klen").value;
      id = parseInt(id);
       var CandContract = initializeContract();
            CandContract.methods._createVoter(id).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(result =>
            {
              
                if(result)
                { 
                
                 alert("Thank You!! Now you can proceed further");
                 getParameters();
                }
              
            });


    }

    // function to get Parameters
    function getParameters()
    {
        var button = document.getElementById("proceed1");
        var CandContract = initializeContract();
        CandContract.methods.k().call().then(function(result)
        {
           document.getElementById('k').value = result ;
        });

        CandContract.methods.l().call().then(function(result)
        {
           document.getElementById('l').value = result ;
        });

        CandContract.methods.N().call().then(function(result)
        {
           document.getElementById('n').value = result ;
        });

        CandContract.methods.e().call().then(function(result)
        {
           document.getElementById('e').value = result ;
        });

        CandContract.methods.H1().call().then(function(result)
        {
           document.getElementById('h1').value = result ;
        });

        CandContract.methods.H2().call().then(function(result)
        {
           document.getElementById('h2').value = result ;
        });

        CandContract.methods.paillierKey().call().then(function(result)
        {
           document.getElementById('pailpub').value = result ;
        });
           button.style.display = "inline";
    }

    // function to generate keys
    function generateSLRSKeys()
    {
      
          var id = document.getElementById("klen").value;
          id = parseInt(id);
          var CandContract = initializeContract();
            CandContract.methods.generateKeys(id).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(result =>
            {
              
                if(result)
                { 
                
                CandContract.methods.generateKeys(id).call().then(function(result)
                {
                     document.getElementById("private").value = result[0];
                     document.getElementById("public").value = result[1];
                });
                alert("Keys Successfully generated");
                alert("Please Click on Upload for final verification.");
                }
                else
                {
                  alert("An error occurred! Please try again");
                }
              
            });
    }

    // function to upload slrs public key and verify
    function verify()
    {
         var button = document.getElementById("proceed2");
         var id = document.getElementById("klen").value;
          id = parseInt(id);
          var publick = document.getElementById("public").value;
          if(publick == "")
          {
             alert("Please generate keys first");
          }
          var CandContract = initializeContract();
            CandContract.methods.uploadPubkey(id,publick).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(result)
            {
              
                if(result)
                {
                   CandContract.methods.uploadPubkey(id,publick).call().then(function(result)
                {
                      if(result)
                      {
                        alert("Successfully Verified! You can now proceed to vote");
                        button.style.display = "inline";
                      }
                      else
                      {
                        alert("Invalid Key!");
                      }
                }); 
                }
                else
                {
                  alert("An error occurred! Please try again");
                }
              
            });
 
    }


    // function to display candidates for voters
    function voterDisplay()
    {
         var totalcand;
        var cand1 = document.getElementById("cands");
        var cand2 = document.getElementById("nocand");

         // initiate contract
         var CandContract = initializeContract();
         CandContract.methods._getValues().call().then(function(result)
          {
            totalcand = result[0];
    
            if (totalcand == 0)
            {
              // if no candidate
              display1(totalcand);
            }
            else if(totalcand>0)
            {
              //display all candidates
              display2(totalcand);
            }
          });
         
         // function to display nocand division
         function display1(tocand)
         {  
          var cand1 = document.getElementById("cands");
            var cand2 = document.getElementById("nocand");
          cand2.setAttribute('style','display : inline');
          cand1.setAttribute('style','display : none');
         }
         
         // function to display all candidates
         function display2(tocand)
         {
          var cand1 = document.getElementById("cands");
          var cand2 = document.getElementById("nocand");
          cand2.style.display = "none";
          cand1.style.display = "inline";
            
          for (let i=1,n = 1 ; i<=tocand ; i++,n=n+3)
          {      
               // calling create function
                   create(i,n);
                   CandContract.methods.cands(i).call().then(function(result)
                   {     
                 
                         document.getElementById("r"+ n).innerHTML = result[0] + " . " + result[1] + "\n";
                         document.getElementById("r" + (n+1)).innerHTML = result[2];

                   });
          }  
         }
         
         // function to create a division for new candidate
         function create(n,i)
         {
          // Initialte all variables
                var toAdd = document.getElementById("cands");
                var cand = document.getElementById("cand"+ n);
        

                // Create New division
                  var newdiv = document.createElement('div');
                  newdiv.id = 'cand'+ (n+1);
                  newdiv.className = 'cand1';
                  newdiv.style.display = "none";

                  // Create new h3 element
                  var newh3 = document.createElement('h3');
                  newh3.id = 'r'+ (i+3);
                  newh3.className = 'name';

                  //create new h4 element
                  var newh4 = document.createElement('h4');
                  newh4.id = 'r' + (i+4);
                  newh4.className = 'desc';

                  // create new voter button
                  var newbutton = document.createElement('button');
                  var br = document.createElement('br');
                  newbutton.id = 'r'+ (i+5);
                  newbutton.className = 'votbutton';
                  newbutton.type = 'button';
                  newbutton.setAttribute("onClick",'get_id(this.id)');
                  newbutton.innerHTML ='Vote';

                  // styling of the vote button
                  var but = document.querySelector(".votbutton");
                  var styleb = getComputedStyle(but);
                  var marginb = parseInt(styleb.top);
                  marginb *= (n+1);
                  marginb= marginb.toString();
                  marginb = marginb + 'px';
                  newbutton.style["top"] = marginb;

                  // styling of the content border
                  var border = document.querySelector(".cand1");
                  var stylebor = getComputedStyle(border);
                  var topbor = parseInt(stylebor.top);
                  topbor *= (n+1) ;
                  topbor= topbor.toString();
                  topbor = topbor + 'px';
                  newdiv.style["top"] = topbor;

                  // append children to division
                  newdiv.appendChild(newh3);
                  newdiv.appendChild(newh4);
                  newdiv.appendChild(newbutton);
                  newdiv.appendChild(br);
                  newdiv.appendChild(br);

            //append the division to parent division
                  toAdd.appendChild(newdiv);
                  cand.style.display = "inline";
               
         }

    }

     //function to generate epsilon value
    function uploadEpsilon(Epsilon)
    {
        var CandContract = initializeContract();
        CandContract.methods.totalcand().call().then(function(result)
        {
                 if(result)
                 {
                    for(let i = 1; i <= result ; i++)
                    {
                       CandContract.methods._getEpsilon(i,Epsilon[i-1]).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(result)
                       {
                          if(result)
                          {
                             console.log(result);
                          }
                       });
                    }
                 }
        });

        alert("Generate Successfull");
    }
    
    // function to get epsilon value 
    function getEpsilon(candidate)
    {
        console.log(candidate);
        var _id = candidate;
        var CandContract = initializeContract();
        CandContract.methods.Epsilonval(_id).call().then(function(result)
        {
               if(result)
               {
                  document.getElementById("epsilon").value = result;
               }
        });
    }

    // function to vote for a candidate
    function voterVote(candidate_id)
    {

          var _id = candidate_id;
          console.log(_id);
          var voterid = document.getElementById("ID").value;
          console.log(voterid);
          var slrs = document.getElementById("slrskey").value;
          console.log(slrs);
          var epsilon = document.getElementById("epsilon").value;
          console.log(epsilon);
          var CandContract = initializeContract();
          CandContract.methods.voterdetail(voterid).call().then(function(result)
            {
               console.log(result);
               if(result[2]==true)
               {
                  alert("You have already voted");
               }
               else if(result[2]==false)
               {
                  CandContract.methods._vote(voterid,_id,slrs,epsilon).send({from: '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(result)
                  {
                        if(result)
                        {
                           alert("You have successfully voted!! Thank You");
                        }
                  });
               }
           });     
    }

    // function get vote counts
    function getVotecounts()
    {  
         var data = [];
        var total;
        var CandContract = initializeContract();
        CandContract.methods.totalcand().call().then(function(result)
        {        
                 if(result)
               {
                    total = result;
                    console.log(total);
                    for(let i = 1; i <= result ; i++)
                    {
                       CandContract.methods.cands(i).call().then(function(result)
                       {
                          if(result[0])
                          {
                             console.log(total);
                             var name = result[1];
                             var count = result[3]; 
                             data.push({x: name , value: count});
                             if(i == total)
                             {
                                 getPie(data);
                             }          
                          }
                       });
                    }
                 }
                 
        });
        

    }
    
    // function to get the pie 
    function getPie(data)
    {

      // create the chart
      var chart = anychart.pie();
      chart.labels().format("{%value}");
      // set the chart title
      chart.title("Vote Counts");
      chart.labels().position("outside");
      chart.connectorStroke({color: "#595959", thickness: 2, dash:"2 2"});
      chart.fill("aquastyle");
      // add the data
      chart.data(data);
      chart.container('container');
      chart.draw();
      chart.legend().position("right");
      // set items layout
     chart.legend().itemsLayout("vertical");
    }

    // function to get winner
    function getWinner()
    {
        var CandContract = initializeContract();
        CandContract.methods.triggerTally().call().then(function(result)
        {
            console.log(result);
            if(result == true)
            {
                CandContract.methods._getWinner().call().then(function(result)
                {        
                    console.log(result);
                     if(result)
                     {
                          document.getElementById("name").innerHTML = result[0] + " . " + result[1]; 
                          document.getElementById("descrip").innerHTML = "Description : " + result[2];
                          document.getElementById("vote").innerHTML = "Vote Count : " + result[3];
                     }
                });
           }
           else if(result == false)
           {
             alert("Tally phase not triggerred yet!! Please Wait for the election to get over.");
           }

        });
      }

   // function to trigger tally
   function triggerTally()
   {
       var button = document.getElementById("trigger");
       var CandContract = initializeContract();
        CandContract.methods._triggerTallyPhase().send({from : '0x42dbB9D3165aF576983b2e30c7bF12C4B2EEC133'}).then(function(result)
        {        
                console.log(result);
                 if(result)
                 {
                      alert("Tally Phase Successfully Started.");
                      button.style.display = "none";
                 }
        });
   }
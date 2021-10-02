<!-- home page PHP for admin for sending mail -->

<?php
        include('./smtp/index.php');
		$host = "localhost";
		$user = "root";
		$password = ''; // my database password. 
		$db_name = "voter";

		$con = mysqli_connect($host, $user, $password, $db_name);
		if (mysqli_connect_errno()) {
		    die("Failed to connect with MySQL: " . mysqli_connect_error());
        }
        $message = false;
        $success=false;
        $body = " ";
		$sql = "SELECT * FROM `voterlogin`;";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $num = $count;
        $Name = array();
        $email = array();
        $adhaar = array();
        $password = array();
         while ($row = $result->fetch_assoc()) {
            array_push($Name, $row["Name"]);
            array_push($email, $row["Email"]);
            array_push($adhaar, $row["adhaarno"]);
            array_push($password, $row["pass"]); 
         }
         for($i=0;$i<$count;$i++)
         {
         	$to = $email[$i];
            $body = "Hello, ". $Name[$i] . "<br />";
            $body .= "Your Voting Password along with your Username is sent to you. Please login with the following credentials and do cast your valuable vote " . "<br />";
            $body .= "Adhaar. No: " . $adhaar[$i] . "<br />";
            $body .= "Password: " . $password[$i] . "<br />";
            $body .= "The Voting will start at 10am on 9th July 2021 and end at 4pm.". "<br/>";
            $body .= "Thanks" . "<br /><br /><br />";
            $body .= "Regards "."<br />";
            $body .= "Voting Administrator "."<br />";
            if(sendMail($to, "Voting Credentials", $body))
            {
            	$message = true;
            }
         	$success = true;
         }
        
     if($success & $message)
     {
?>

   <script>
   	alert('Mail Sent.');
   	window.location.href = "home.php";
   </script>
<?php
}
?>
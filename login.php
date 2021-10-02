<!-- Voter Login PHP -->

<?php      
    session_start();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "voter";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $adhaarno = $_POST['uname'];  
    $password = $_POST['psw'];

      
        //to prevent from mysqli injection  
       $adhaarno = stripcslashes($adhaarno); 
       $password = stripcslashes($password);
       $adhaarno = mysqli_real_escape_string($con, $adhaarno);
       $password = mysqli_real_escape_string($con, $password);
      
        $sql = "SELECT * from `voterlogin` WHERE `adhaarno` = $adhaarno AND `pass` = '$password'"; 
        $result = mysqli_query($con, $sql); 
        $count = mysqli_num_rows($result);
        while($row = $result->fetch_assoc()){
        $id = $row["ID"];    
        $name = $row["Name"];
        $email = $row["Email"];
      }
          
        if($count == 1){
            $_SESSION["Name"] = $name;
            $_SESSION["Password"] = $password;
            $_SESSION["Adhaar"] = $adhaarno;
            $_SESSION["Emailid"] = $email;
            $_SESSION["Id"] = $id;  
            header("Location: votdashboard.html");
            exit;  
        }  
        else{  
            $_SESSION["error"] = "Invalid Email or Password";
            header("Location: adlogin.php");  
        }     
?>  
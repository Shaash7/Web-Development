<?php 
  $con = mysqli_connect("localhost","root","","bmsce");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($con,$_POST['Username']);
      $password = mysqli_real_escape_string($con,$_POST['Password']); 
      
      $sql = "SELECT Username FROM login WHERE Username = '$username'"; 
      $sql = "SELECT Password FROM login WHERE Password = '$password'";
      $result = mysqli_query($con,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //  $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 2) {
            $_SESSION['login_user'] = $username;
            header("location: bsmp.html"); 
          
      }else {
         echo "<center><h3 style='color:red';>Your Login Name or Password is invalid</h3></center>";
          
      }
   }
    
	?>

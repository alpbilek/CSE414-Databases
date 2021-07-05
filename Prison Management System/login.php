
<?php
require 'conn.php';
require 'core.php';
?>



<!DOCTYPE html>
<html>
<style>
h2 {
	border:1px solid green;
	text-align: center;
	color: red;
	background-color: #F5F5DC;
}
form {
	width: 50%;
    border: 0px solid black;

margin: 0px 113px 0px 250px;
	
	font-size:30px;
	}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=submit] {

    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}




.imgcontainer {
    text-align: center;
    margin: 14px 0 2px 0;
}

img.avatar {
    width: 28%;
    border-radius: 50%;
}




}
</style>
<body background="images/login.jpg">

<h2> PRISON MANAGEMENT SYSTEM LOGIN PAGE</h2>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="images/login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label>  <b>USERNAME</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>PASSWORD</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
      
 	  
    
	<input name="submit" type="submit" value=" Login ">
	
   
  </div>

  </div>
</form>

</body>
</html>

	 	
	 
<?php

 if(isset($_REQUEST["submit"]))
	 {
		 $user=$_POST["username"];
		 $pass=$_POST["password"];
		 $sql="SELECT * FROM PMS.admin where username LIKE '$user' and password LIKE '$pass'";
		 $result=$conn->query($sql);
		 
		 if($result->num_rows > 0)
		 {
			 
			 while($row=$result->fetch_assoc())
			 {
				 $u=$row["username"];
			     $p=$row["password"];
			 }
			 if(($user == $u) && ($pass == $p))
			 {
				 
		            
				header('location:home.php');
			 }
		 }
			 if($result->num_rows!=1)
			 {
				 
				 echo '<script> alert("UNSUCCESSFUL!!PLEASE RE-ENTER USERNAME AND PASSWORD");</script>';
		       }
			 
		 
	   }
     ?>
	 	
	 
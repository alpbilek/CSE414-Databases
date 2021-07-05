<?php
require 'conn.php';
	
?>



<body style="background-color: #CCFFFF;">


<!DOCTYPE html>
<html>
<style>

body {
	width:80%;
}
h2 {
	width: 70%;
	border:1px solid green;
	text-align: center;
	color: #0000FF;
	padding: 15px 1px;
	margin:0px 113px 0px 350px;
	background-color: #F5F5DC;
}

form {
	width: 70%;
    border: 2px solid black;
background-color: #FFCCFF;
margin: -150px 113px 10px 350px;
	}

input[type=text], input[type=date], input[type=password] {
    width: 50%;
    padding: 5px 15px;
    margin: 5px 250px;
    display: inline-block;
    border: 1px solid black;
    box-sizing: border-box;
}


label,select {
	 margin: 5px 250px;
	 }
	 
button {
	 text-align: center;

    background-color: #4CAF50;
    color: white;
    padding: 8px 15px;
    margin: 5px 350px ;
    border: none;
    cursor: pointer;
    width: 15%;
}
.imagegroup {
    background-color:  #CCFFFF; 
    border: 1px solid black; 
    color: white;
    padding: 20px 14px; 
    cursor: pointer;
    width: 15%; 
    display: block; 
     margin:0px;
	}






</style>

<body>
<h2><div style='float: right;'></div>  REGISTER NEW ADMIN </h2>

<div class="imagegroup">
<a href="home.php">
<img src="images/home.png" alt="GoTo Home" width="100" height="100" border="0"><br><b><strong>GOTO HOME</a>
<br><br><br>
  

</div>

<form action="" method="post">
 <div class="container">
  <br><br><label><b>ENTER STAFF ID</b></label> <br>
  <input type="text" placeholder="Enter sid" name="sid" required>
	<br>
	    
		<label><b>ENTER STAFF NAME</b></label> <br>
    <input type="text" placeholder="Enter name" name="sname" required>
	<br>
    
		<label><b>ENTER PASSWORD</b></label> <br>
    <input type="password" placeholder="Enter password" name="spassword" required>
<br>
	    
		<label><b>CONFIRM PASSWORD</b></label> <br>
    <input type="password" placeholder="Enter Address" name="cpassword" required>

<br>	

  <button type="submit" name="btn" value=submit>REGISTER</button>
    </div>
</form>



</body>
</html>


   

<?php
 if(isset($_REQUEST["btn"]))
	 {
	 $sid=$_POST["sid"];	
	$sname=$_POST["sname"];
		 $spassword=$_POST["spassword"];
		 $cpassword=$_POST["cpassword"];
		
	if($spassword==$cpassword)
	{ 
$query="INSERT into PMS.admin values('$sid','$sname','$spassword')";
$result = mysqli_query($conn, $query);
echo "<u>RESULT:</u><b>$sname \t REGISTERED SUCCESSFULLY AS ADMIN";
	 }
	 else
	 {
		 echo'PASSWORD DID NOT MATCH!!!               PLEASE RE-ENTER YOUR PASSWORD';
	 }
	 }
?>
		 

		 
   






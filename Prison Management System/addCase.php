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
margin: -450px 113px 10px 350px;
	}

input[type=text], input[type=date], input[type=select] {
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
    margin: 5px 450px ;
    border: none;
    cursor: pointer;
    width: 10%;
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
<h2><div style='float: right;'></div>  ENTER PRISONER DETAILS </h2>

<div class="imagegroup">
<a href="home.php">
<img src="images/home.png" alt="GoTo Home" width="100" height="100" border="0"><br><b><strong>GOTO HOME</a>
<br><br><br>

<a href="viewCase.php">
<img src="images/viewprisoner.png" alt="View Prisoner" width="100" height="100" border="0"> <br><b><strong>VIEW CASE</a>
<br><br><br>
<a href="viewCase.php">
<img src="images/deleteprisoner.png" alt="Delete Prisoner" width="100" height="100" border="0"> <br><b><strong>DELETE CASE</a>
  

</div>

<form action="" method="post">
 <div class="container">
  <br><br><label><b>NAME</b></label> <br>
  <input type="text" placeholder="Enter prisoner name" name="pname" required>
	<br>
	    
		<label><b>PRISONER ID</b></label> <br>
    <input type="text" placeholder="Enter prisoner id" name="pid" required>
	<br>
    
<br>
	    
		<label><b>CASE TYPE</b></label> <br>
    <input type="text" placeholder="Enter case type" name="ctype" required>
<br>
	    
		<label><b>DESCRIPTION</b></label> <br>
    <input type="text" placeholder="Enter description" name="cdesc" required>

<br>	
		
  <button type="submit" name="btn" value=submit>SUBMIT</button>
    </div>
</form>



</body>
</html>


   

<?php
 if(isset($_REQUEST["btn"]))
	 {
		 $pname=$_POST["pname"];
		 $pid=$_POST["pid"];
		 $ctype=$_POST["ctype"];
		 $cdesc=$_POST["cdesc"];
	 
$query="INSERT into PMS.case(PID,PRISONER_NAME,CASE_TYPE,DESCRIPTION) values('$pid','$pname','$ctype','$cdesc')";
$result = mysqli_query($conn, $query);
echo "<u>RESULT:</u>CASE FOR PRISONER  <u><b>$pname </u> \t ADDEDED SUCCESSFULLY";
	 }
?>
		 

		 
   

















   

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

input[type=text], input[type=date], input[type=select],input[type=number] {
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
<h2><div style='float: right;'></div>  ENTER STAFF DETAILS </h2>

<div class="imagegroup">
<a href="home.php">
<img src="images/home.png" alt="GoTo Home" width="100" height="100" border="0"><br><b><strong>GOTO HOME</a>
<br><br><br>

<a href="viewStaff.php">
<img src="images/staff.png" alt="View Staff" width="100" height="100" border="0"> <br><b><strong>VIEW STAFF</a>
<br><br><br>
<a href="viewStaff.php">
<img src="images/deleteprisoner.png" alt="Delete Staff" width="100" height="100" border="0"> <br><b><strong>DELETE STAFF</a>
  

</div>

<form action="" method="post">
 <div class="container">
  <br><br><label><b>NAME</b></label> <br>
  <input type="text" placeholder="Enter name" name="sname" required>
	<br>
	    
		<label><b>AGE</b></label> <br>
    <input type="text" placeholder="Enter Age" name="sage" required>
	<br>
    
	<label><b>SEX</b></label> <br>
	<select name="ssex">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
		
<br>
	    
		<label><b>ROLE</b></label> <br>
    <input type="text" placeholder="Enter role" name="srole" required>
<br>
	   
		<label><b>SALARY</b></label> <br>
    <input type="text" placeholder="Enter rsalary" name="salary" required>
<br>
	    
		<label><b>PHONE NUMBER</b></label> <br>
    <input type="number" min="10" placeholder="Enter Phone" name="sphone" required>

<br>	
		<label><b>JOINING DATE</b></label> <br>
    <input type="date" placeholder="Enter Joining Date" name="sjoindate" required>
	<br>

		<label><b>ADDRESS</b></label> <br>
    <input type="text" placeholder="Enter Address" name="saddress" required>
	
<br>
	
  <button type="submit" name="btn" value=submit>SUBMIT</button>
    </div>
</form>



</body>
</html>


   

<?php
 if(isset($_REQUEST["btn"]))
	 {
		 $sname=$_POST["sname"];
		 $sage=$_POST["sage"];
		 $ssex=$_POST["ssex"];
		 $srole=$_POST["srole"];
		 $salary=$_POST["salary"];
		 $sphone=$_POST["sphone"];
		 $sjoindate=$_POST["sjoindate"];
		 $saddress=$_POST["saddress"];
	 
$query="INSERT into PMS.staff(SNAME,AGE,SEX,ROLE,SALARY,PHONENO,JOINDATE,ADDRESS) values('$sname','$sage','$ssex','$srole','$salary','$sphone','$sjoindate','$saddress')";
$result = mysqli_query($conn, $query);
echo "<u>RESULT:</u> STAFF  <u><b>$sname </u> \t ADDEDED SUCCESSFULLY";
	 }
?>
		 




   

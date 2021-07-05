<!DOCTYPE html>
<html>
<style>

h2 {
	border:1px solid green;
	text-align: center;
	color: black;
	padding: 15px 1px;
	margin:0px 113px 10px 250px;
	background-color:#E79FE9;
}
form {
	width: 70%;
    border: 2px solid black;
background-color: #B59FE9;
margin: 0px 113px 10px 250px;
	}
input[type=text], input[type=date], input[type=select],input[type=number] {
    width: 50%;
    padding: 5px 15px;
    margin: 5px 250px;
    display: inline-block;
    border: 2px solid black;
    box-sizing: border-box;
}
input[type=submit] {
	 text-align: center;

    background-color: #A41717;
    color: white;
    padding: 8px 15px;
    margin: 5px 350px ;
    border: none;
    cursor: pointer;
    width: 10%;
}
label,select {
	 margin: 5px 250px;
	 }
	 
button {
	 text-align: center;

    background-color: #A41717;
    color: white;
    padding: 8px 15px;
    margin: 5px 350px ;
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
<body background="images/editbg.jpg">
<?php
	require 'conn.php';
include 'index.php';
	if( isset($_GET["edit"]) )
	{
		$id = $_GET["edit"];
		$res= mysqli_query($conn,"SELECT * FROM staff WHERE SID='$id'");
		$row= mysqli_fetch_assoc($res);
	}
 
	if( isset($_POST["btn"]) )
	{
	    $id=$_POST["id"];
		$newName = $_POST["newName"];
		$newAge = $_POST["newAge"];
		$newRole = $_POST["newRole"];
			$newSalary = $_POST["newSalary"];
		$newSex = $_POST["newSex"];
		$newAddress = $_POST["newAddress"];
		$newJoin = $_POST["newJoin"];
		$newPhone = $_POST["newPhone"];
		$sql= "UPDATE staff SET SNAME='$newName', AGE='$newAge',SEX='$newSex',ROLE='$newRole',SALARY='$newSalary',PHONENO='$newPhone',JOINDATE='$newJoin',ADDRESS='$newAddress'  WHERE SID='$id'";
		$res= mysqli_query($conn,$sql)  or die("Could not update".mysqli_error());
		echo "<meta http-equiv='refresh' content='0;url=viewStaff.php'>";
	}
 
?>
<h2>UPDATE STAFF DETAILS:</h2>
<form action="updateStaff.php" method="POST">
 <div class="container">
 <input type="hidden" name="id" value="<?php echo $row['SID']; ?>">
  <br><br><label><b>NAME</b></label> <br>
  <input type="text" name="newName" value="<?php echo $row['SNAME']; ?>">
	<br>
	    
		<label><b>AGE</b></label> <br>
    <input type="text" name="newAge" value="<?php echo $row['AGE']; ?>">
	<br>
    
	<label><b>SEX</b></label> <br>
    <input type="text" name="newSex" value="<?php echo $row['SEX']; ?>">

	<br>
	    
		<label><b>ROLE</b></label> <br>
    <input type="text" name="newRole" value="<?php echo $row['ROLE']; ?>">
<br>
	<label><b>SALARY</b></label> <br>
    <input type="text" name="newSalary" value="<?php echo $row['SALARY']; ?>">
<br>    
		<label><b>PHONE NUMBER</b></label> <br>
    <input type="number" min="10" name="newPhone" value="<?php echo $row['PHONENO']; ?>">
<br>	
		<label><b>JOINING DATE</b></label> <br>
    <input type="date" name="newJoin" value="<?php echo $row['JOINDATE']; ?>">
	<br>
		<label><b>ADDRESS</b></label> <br>
<input type="text" name="newAddress" value="<?php echo $row['ADDRESS']; ?>">	
<br>
  <button type="submit" name="btn" value=submit>UPDATE</button>
    </div>	
</form>
</body>
</html>


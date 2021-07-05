<!DOCTYPE html>
<html>
<style>

h2 {
	border:1px solid green;
	text-align: center;
	color: black;
	padding: 15px 1px;
	margin:5px 113px 10px 250px;
	background-color:#E79FE9;
}

form {
	width: 70%;
    border: 2px solid black;
background-color: #B59FE9;
margin: 0px 113px 10px 250px;
	}

input[type=text], input[type=date], input[type=select] {
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
    margin: 5px 750px 0px 500px;
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
		$res= mysqli_query($conn,"SELECT * FROM prisoner WHERE PID='$id'");
		$row= mysqli_fetch_assoc($res);
	}
 
	if( isset($_POST["btn"]) )
	{
	    $id=$_POST["id"];
		$newName = $_POST["newName"];
		$newAge = $_POST["newAge"];
		$newType = $_POST["newType"];
		$newSex = $_POST["newSex"];
		$newAddress = $_POST["newAddress"];
		$newEntry = $_POST["newEntry"];
		$newRelease = $_POST["newRelease"];
				
		$sql     = "UPDATE prisoner SET PRISONER_NAME='$newName', AGE='$newAge',SEX='$newSex',TYPE='$newType',ADDRESS='$newAddress',ENTRY_DATE='$newEntry',RELEASE_DATE='$newRelease' WHERE PID='$id'";
		$res 	 = mysqli_query($conn,$sql)  or die("Could not update".mysqli_error());
                                  
	
          
		
		echo "<meta http-equiv='refresh' content='0;url=viewPrisoner.php'>";
	}
 
?>
<h2>UPDATE PRISONER DETAILS:</h2>
<form action="updatePrisoner.php" method="POST">

 <div class="container">
 <input type="hidden" name="id" value="<?php echo $row['PID']; ?>">
 
  <br><br><label><b>NAME</b></label> <br>
  <input type="text" name="newName" value="<?php echo $row['PRISONER_NAME']; ?>">
	<br>
	    
		<label><b>AGE</b></label> <br>
    <input type="text" name="newAge" value="<?php echo $row['AGE']; ?>">
	<br>
    
	<label><b>SEX</b></label> <br>
    <input type="text" name="newSex" value="<?php echo $row['SEX']; ?>">

	<br>
	    
		<label><b>TYPE</b></label> <br>
    <input type="text" name="newType" value="<?php echo $row['TYPE']; ?>">
<br>
	    
		<label><b>ADDRESS</b></label> <br>
    <input type="text" name="newAddress" value="<?php echo $row['ADDRESS']; ?>">

<br>	
		<label><b>ENTRY DATE</b></label> <br>
    <input type="date" name="newEntry" value="<?php echo $row['ENTRY_DATE']; ?>">
	<br>

		<label><b>RELEASE DATE</b></label> <br>
<input type="date" name="newRelease" value="<?php echo $row['RELEASE_DATE']; ?>">
	
<br>
	
  <button type="submit" name="btn" value=submit>UPDATE</button>
 
    </div>	
</form>
</body>
</html>


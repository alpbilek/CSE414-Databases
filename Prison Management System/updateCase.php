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
		$res= mysqli_query($conn,"SELECT * FROM PMS.case WHERE CID='$id'");
		$row= mysqli_fetch_assoc($res);
	}
 
	if( isset($_POST["btn"]) )
	{
	    $id=$_POST["id"];
		$newName = $_POST["newName"];
		$newPid = $_POST["newPid"];
		$newType = $_POST["newType"];
		$newDesc = $_POST["newDesc"];
		$sql     = "UPDATE PMS.case SET PRISONER_NAME='$newName', PID='$newPid',CASE_TYPE='$newType',DESCRIPTION='$newDesc' WHERE CID='$id'";
		$res 	 = mysqli_query($conn,$sql)  or die("Could not update".mysqli_error());
                                  
	
          
		
		echo "<meta http-equiv='refresh' content='0;url=viewCase.php'>";
	}
 
?>
<h2>UPDATE CASE DETAILS:</h2>
<form action="updateCase.php" method="POST">

 <div class="container">
 <input type="hidden" name="id" value="<?php echo $row['CID']; ?>">
 
 
  <br><br><label><b>PRISONER PID</b></label> <br>
  <input type="text" name="newPid" value="<?php echo $row['PID']; ?>">
	<br>
  <label><b>PRISONER NAME</b></label> <br>
  <input type="text" name="newName" value="<?php echo $row['PRISONER_NAME']; ?>">
	<br>
	
	    
		
		<label><b>PRISONER TYPE</b></label> <br>
    <input type="text" name="newType" value="<?php echo $row['CASE_TYPE']; ?>">
<br>
	    
		<label><b>DESCRIPTION</b></label> <br>
    <input type="text" name="newDesc" value="<?php echo $row['DESCRIPTION']; ?>">

<br>	
	
  <button type="submit" name="btn" value=submit>UPDATE</button>
 
    </div>	
</form>
</body>
</html>


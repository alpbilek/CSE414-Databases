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

input[type=text],input[type=time], input[type=date], input[type=select] {
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
    width: 100%;
}

label,select {
	 margin: 15px 250px;
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
		$res= mysqli_query($conn,"SELECT * FROM PMS.visitor WHERE PID='$id'");
		$row= mysqli_fetch_assoc($res);
	}
 
	if( isset($_POST["btn"]) )
	{
	    $id=$_POST["id"];
		//$newPid = $_POST["newPid"];
		$newVName = $_POST["newVName"];
		$newPName = $_POST["newPName"];
		$newRelation = $_POST["newRelation"];
		$newDate = $_POST["newDate"];
		$newIn = $_POST["newIn"];
		$newOut = $_POST["newOut"];
		$newAuthority = $_POST["newAuthority"];
		$newSid = $_POST["newSid"];
		$newAddress = $_POST["newAddress"];
				
		$sql     = "UPDATE PMS.visitor SET VISITOR_NAME='$newVName',PRISONER_NAME='$newPName',RELATION='$newRelation',DATE='$newDate',IN_TIME='$newIn',OUT_TIME='$newOut',ISSUING_AUTHORITY='$newAuthority',SID='$newSid',VISITOR_ADDRESS='$newAddress' WHERE PID='$id'";
		$res 	 = mysqli_query($conn,$sql)  or die("<br><br><br><b>UPDATE FAILED!!!!<br><br><br><b>ENTER VALID STAFF ID <br><br><br><a href='viewVisitor.php'><b>VIEW VISITORS</a><br><br><br><a href='home.php'><b>GOTO HOME</a>");
                                  
	
          
		
		echo "<meta http-equiv='refresh' content='0;url=viewVisitor.php'>";
	}
 
?>
<h2>UPDATE VISITOR DETAILS:</h2>
<form action="updateVisitor.php" method="POST">

 <div class="container">
 <input type="hidden" name="id" value="<?php echo $row['PID']; ?>">
 
  <!--<br><br><label>PRISONER ID </b></label> <br>
  <input type="text" name="newPid" value="<?php echo $row['PID']; ?>">
 <br> -->
 
 <label><b>VISITOR NAME</b></label> <br>
  <input type="text" name="newVName" value="<?php echo $row['VISITOR_NAME']; ?>">
	<br>
	<label><b>PRISONER NAME</b></label> <br>
  <input type="text" name="newPName" value="<?php echo $row['PRISONER_NAME']; ?>">
	<br>

	    
		<label><b>RELATION</b></label> <br>
    <input type="text" name="newRelation" value="<?php echo $row['RELATION']; ?>">
	<br>
    
	<label><b>DATE</b></label> <br>
    <input type="date" name="newDate" value="<?php echo $row['DATE']; ?>">

	<br>
	    
		<label><b>IN TIME</b></label> <br>
    <input type="time" name="newIn" value="<?php echo $row['IN_TIME']; ?>">
<br>
	    
		<label><b>OUT TIME</b></label> <br>
    <input type="time" name="newOut" value="<?php echo $row['OUT_TIME']; ?>">
<br>
		<label><b>ISSUING AUTHORITY</b></label> <br>
    <input type="text" name="newAuthority" value="<?php echo $row['ISSUING_AUTHORITY']; ?>">

<br>	
		<label><b>AUTHORITY ID</b></label> <br>
    <input type="text" name="newSid" value="<?php echo $row['SID']; ?>">
	<br>

		<label><b>VISITOR ADDRESS</b></label> <br>
    <input type="text" name="newAddress" value="<?php echo $row['VISITOR_ADDRESS']; ?>">

<br>
	
  <button type="submit" name="btn" value=submit>UPDATE</button>
 
    </div>	
</form>
</body>
</html>


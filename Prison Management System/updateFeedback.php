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
		$res= mysqli_query($conn,"SELECT * FROM feedback WHERE FID='$id'");
		$row= mysqli_fetch_assoc($res);
	}
 
	if( isset($_POST["btn"]) )
	{
	    $id=$_POST["id"];
		$newName = $_POST["newName"];
		$newPid = $_POST["newPid"];
		$newDate = $_POST["newDate"];
		$newEscape = $_POST["newEscape"];
		$newJob = $_POST["newJob"];
		$newComment = $_POST["newComment"];
		$sql     = "UPDATE feedback SET PID='$newPid',PRISONER_NAME='$newName', DATE='$newDate',ESCAPE_ATTEMPTS='$newEscape',JOB_PERFORMANCE='$newJob',COMMENTS='$newComment' WHERE FID='$id'";
		$res 	 = mysqli_query($conn,$sql)  or die("Could not update".mysqli_error());
                                  
	
          
		
		echo "<meta http-equiv='refresh' content='0;url=viewFeedback.php'>";
	}
 
?>
<h2>UPDATE PRISONER FEEDBACK:</h2>
<form action="updateFeedback.php" method="POST">

 <div class="container">
 <input type="hidden" name="id" value="<?php echo $row['FID']; ?>">
 
  <br><br><label><b>PID</b></label> <br>
  <input type="text" name="newPid" value="<?php echo $row['PID']; ?>">
	<br>
 <label><b>NAME</b></label> <br>
  <input type="text" name="newName" value="<?php echo $row['PRISONER_NAME']; ?>">
	<br>
	    
		<label><b>DATE</b></label> <br>
    <input type="date" name="newDate" value="<?php echo $row['DATE']; ?>">
	<br>
    
	<label><b>ESCAPE ATTEMPTS</b></label> <br>
    <input type="text" name="newEscape" value="<?php echo $row['ESCAPE_ATTEMPTS']; ?>">

	<br>
	    
	
	    <label><b>JOB PERFORMANCE</b></label> <br>
	<select name="newJob">
  <option value="Poor">Poor</option>
  <option value="Average">Average</option>
  <option value="Good">Good</option>
  <option value="Excellent">Excellent</option>
  <option value="Outstanding">Outstanding</option>
</select>
		
	    
		<label><b>COMMENTS</b></label> <br>
    <input type="text" name="newComment" value="<?php echo $row['COMMENTS']; ?>">

<br>	
	
  <button type="submit" name="btn" value=submit>UPDATE</button>
 
    </div>	
</form>
</body>
</html>


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
<h2><div style='float: right;'></div>  ENTER PRISONER FEEDBACK </h2>

<div class="imagegroup">
<a href="home.php">
<img src="images/home.png" alt="GoTo Home" width="100" height="100" border="0"><br><b><strong>GOTO HOME</a>
<br><br><br>

<a href="viewFeedback.php">
<img src="images/feedback.png" alt="View Prisoner" width="100" height="100" border="0"> <br><b><strong>VIEW FEEDBACK</a>
<br><br><br>
<a href="viewFeedback.php">
<img src="images/deletefeedback.png" alt="Delete Prisoner" width="100" height="100" border="0"> <br><b><strong>DELETE FEEDBACK</a>
  

</div>

<form action="" method="post">
 <div class="container">
  <br><br><label><b>PID</b></label> <br>
  <input type="text" placeholder="Enter Pid" name="pid" required>
	<br>
  
	    <label><b>PRISONER NAME</b></label> <br>
  <input type="text" placeholder="Enter name" name="pname" required>
	<br>
		<label><b>DATE</b></label> <br>
    <input type="date" placeholder="Enter date" name="fdate" required>
	<br>
    
	    
		<label><b>ESCAPE ATTEMPTS</b></label> <br>
    <input type="text" placeholder="Enter no.of escape attempts" name="fescape" required>
<br>
	    <label><b>JOB PERFORMANCE</b></label> <br>
	<select name="fjob">
  <option value="Poor">Poor</option>
  <option value="Average">Average</option>
  <option value="Good">Good</option>
  <option value="Excellent">Excellent</option>
  <option value="Outstanding">Outstanding</option>
</select>
		
		<label><b>COMMENTS</b></label> <br>
    <input type="text" placeholder="Enter extra information" name="fcomment" required>

<br>
	
  <button type="submit" name="btn" value=submit>SUBMIT</button>
    </div>
</form>



</body>
</html>


   

<?php
 if(isset($_REQUEST["btn"]))
	 {
		 $pid=$_POST["pid"];
		 $pname=$_POST["pname"];
		 $fdate=$_POST["fdate"];
		 $fescape=$_POST["fescape"];
		 $fjob=$_POST["fjob"];
		 $fcomment=$_POST["fcomment"];
	 
$query="INSERT into PMS.feedback(PID,PRISONER_NAME,DATE,ESCAPE_ATTEMPTS,JOB_PERFORMANCE,COMMENTS) values('$pid','$pname','$fdate','$fescape','$fjob','$fcomment')";
$result = mysqli_query($conn, $query);
echo "\n\n\n<u>RESULT:</u> FEEDBACK FOR   <u><b>$pname </u> \t ADDEDED SUCCESSFULLY";
	 }
?>
		 

		 
   

















   

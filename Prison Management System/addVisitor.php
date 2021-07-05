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

input[type=text], input[type=date], input[type=select],input[type=time] {
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
<h2><div style='float: right;'></div>  ENTER VISITOR DETAILS </h2>

<div class="imagegroup">
<a href="home.php">
<img src="images/home.png" alt="GoTo Home" width="100" height="100" border="0"><br><b><strong>GOTO HOME</a>
<br><br><br>

<a href="viewVisitor.php">
<img src="images/visitor.ico" alt="View Visitor" width="100" height="100" border="0"> <br><b><strong>VIEW VISITOR</a>
<br><br><br>
<a href="viewVisitor.php">
<img src="images/deleteprisoner.png" alt="Delete Visitor" width="100" height="100" border="0"> <br><b><strong>DELETE VISITOR</a>
  

</div>

<form action="" method="post">
 <div class="container">
 
  <br><br><label><b>PID</b></label> <br>
  <input type="text" placeholder="Enter pid" name="pid" required>
	<br>	
  <label><b>VISITOR NAME</b></label> <br>
  <input type="text" placeholder="Enter visitor name" name="vname" required>
	<br>
 <label><b>PRISONER NAME</b></label> <br>
  <input type="text" placeholder="Enter prisoner name" name="pname" required>
	<br>
	    
		<label><b>RELATION</b></label> <br>
    <input type="text" placeholder="Enter relation" name="vrelation" required>
	<br>
    
		
	    
		<label><b>DATE</b></label> <br>
    <input type="date" placeholder="Enter date" name="vdate" required>
<br>
	    
		<label><b>IN TIME</b></label> <br>
    <input type="time" placeholder="Enter in time" name="vin" required>

<br>	
		<label><b>OUT TIME</b></label> <br>
    <input type="time" placeholder="Enter out time" name="vout" required>
	<br>

		<label><b>ISSUING AUTHORITY</b></label> <br>
    <input type="text" placeholder="Enter issuing authority" name="vauthority" required>
	
<br>
	
  <label><b>AUTHORITY ID</b></label> <br>
  <input type="text" placeholder="Enter sid" name="sid" required>
	<br>	
  <label><b>VISITOR ADDRESS</b></label> <br>
  <input type="text" placeholder="Enter visitoraddress" name="vaddress" required>
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
		  $vname=$_POST["vname"];
		 $pname=$_POST["pname"];
		 $vrelation=$_POST["vrelation"];
		 $vdate=$_POST["vdate"];
		 $vin=$_POST["vin"];
		 $vout=$_POST["vout"];
		  $vauthority=$_POST["vauthority"];
		 $sid=$_POST["sid"];
		 $vaddress=$_POST["vaddress"];
		
	 
$query="INSERT into PMS.visitor(PID,VISITOR_NAME,PRISONER_NAME,RELATION,DATE,IN_TIME,OUT_TIME,ISSUING_AUTHORITY,SID,VISITOR_ADDRESS) values('$pid','$vname','$pname','$vrelation','$vdate','$vin','$vout','$vauthority','$sid','$vaddress')";
$result = mysqli_query($conn, $query);
echo "<u>RESULT:</u> VISITOR  <u><b>$vname </u> \t ADDEDED SUCCESSFULLY";
	 }
?>
		 

		 
   

















   

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

<a href="viewPrisoner.php">
<img src="images/viewprisoner.png" alt="View Prisoner" width="100" height="100" border="0"> <br><b><strong>VIEW PRISONER</a>
<br><br><br>
<a href="viewPrisoner.php">
<img src="images/deleteprisoner.png" alt="Delete Prisoner" width="100" height="100" border="0"> <br><b><strong>DELETE PRISONER</a>
  

</div>

<form action="" method="post">
 <div class="container">
  <br><br><label><b>NAME</b></label> <br>
  <input type="text" placeholder="Enter name" name="pname" required>
	<br>
	    
		<label><b>AGE</b></label> <br>
    <input type="text" placeholder="Enter Age" name="page" required>
	<br>
    
	<label><b>SEX</b></label> <br>
	<select name="psex">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
		
<br>
	    
		<label><b>TYPE</b></label> <br>
    <input type="text" placeholder="Enter type" name="ptype" required>
<br>
	    
		<label><b>ADDRESS</b></label> <br>
    <input type="text" placeholder="Enter Address" name="paddress" required>

<br>	
		<label><b>ENTRY DATE</b></label> <br>
    <input type="date" placeholder="Enter Entry Date" name="pentrydate" required>
	<br>

		<label><b>RELEASE DATE</b></label> <br>
    <input type="date" placeholder="Enter Release Date" name="preleasedate" required>
	
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
		 $page=$_POST["page"];
		 $psex=$_POST["psex"];
		 $ptype=$_POST["ptype"];
		 $paddress=$_POST["paddress"];
		  $pentrydate=$_POST["pentrydate"];
		 $preleasedate=$_POST["preleasedate"];
		
	 
$query="INSERT into PMS.prisoner(PRISONER_NAME,AGE,SEX,TYPE,ADDRESS,ENTRY_DATE,RELEASE_DATE) values('$pname','$page','$psex','$ptype','$paddress','$pentrydate','$preleasedate')";
if(!mysqli_query($conn, $query)){
echo('REASON:'.mysqli_error($conn));	
echo '<script> alert("INSERTION  FAILED!!!!PLEASE RE-ENTER DATA");</script>';
}
else{
	
	 echo '<script> alert("SUCCESFULLY ADDED");</script>';
echo "PRISONER $pname ADDED";
	 }
	 }
?>
		 

		 
   

















   

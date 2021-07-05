
  <?php
  include 'index.php';


if( isset($_GET["delete"]) )
	{
		$id = $_GET["delete"];
		$query = "DELETE FROM prisonerbackup WHERE PID='$id'";
     $connect = mysqli_connect("localhost", "root", "", "PMS");
    mysqli_query($connect, $query);
	}


if(isset($_REQUEST["search"]))
{
    $valueToSearch = $_POST["valueToSearch"];
    $query = "SELECT * FROM prisonerbackup WHERE CONCAT(`PID`, `PNAME`, `PAGE`,`PSEX`,`PTYPE`,`PADDRESS`) LIKE '%".$valueToSearch."%'";
    
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM prisonerbackup";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "PMS");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}




?>


<body style="background-color:#F2F3F4;">
<!DOCTYPE html>
<html>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
	margin:10px 10px 10px 50px;
}

td {
    border: 1px solid #dddddd;
    text-align: left;
	text-size:4px;
    padding: 8px;
}
th {
    border: 4px solid #dddddd;
    text-align: left;
    padding: 8px;
}




a {
  float: left;
  padding: 10px 12px;
  color: solid black;
  text-decoration: none;
  font-weight: bold;
  text-align: center;
  border-right: 1px solid rgba(255,255,255,0.1);
}



.search {
 background: #F2F3F4;;
 width: 60%;
  border-radius: 50px;
  padding: 10px 20px;
  margin: 20px 10px 10px 900px;
 
}	

input[type=text] {
   
    padding: 5px 10px;
    margin: 2px 0;
    display: inline-block;
    border: 1.5px solid black;
    box-sizing: border-box;
}
button {
   
    padding: 5px 10px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	cursor: pointer;
}
input[type=submit]{
   text-align: center;
display: inline-block;
    background-color: #8080ff;
     cursor: pointer;
    
}
</style>
    <head>
        <title>PRISONER BACKUP</title>
       
    </head>
    <body>
        <ul class="group">

 

        <form action="PrisonerBackup.php" method="post">
		
		<div class="search">
		
		<strong>SEARCH FOR BACKUP:<br><br>
            <input type="text" name="valueToSearch" placeholder="Enter Value To Search"><br>
            &#8195;&#8195;&#8195;<input type="submit" name="search" value="SEARCH"><br><br>
           </div>

		   </ul>
		
		
		   </form>
		   &#8195;&#8195;&#8195;<strong><b>PRISONER BACKUP(TRIGGER):</strong>
		  
            <table>
                <tr>
                    <th>ID</th>
            <th>NAME</th>
			<th>AGE</th>
			<th>SEX</th>
            <th>TYPE</th>
			<th>ADDRESS</th>
			<th>ENTRY DATE</th>
			<th>RELEASE DATE</th>
			<th>DELETION TIME</th>
                </tr>
			<?php while($row = mysqli_fetch_assoc($search_result)):?>
                <tr>
				       <td><?php echo $row['PID']; ?></td>
            <td><?php echo $row['PNAME']; ?></td>
			<td><?php echo $row['PAGE']; ?></td>
			<td><?php echo $row['PSEX']; ?></td>
            <td><?php echo $row['PTYPE']; ?></td>
			<td><?php echo $row['PADDRESS']; ?></td>
			<td><?php echo $row['PENTRY']; ?></td>
			<td><?php echo $row['PRELEASE'];?> </td>
			<td><?php echo $row['DELETION_TIME'];?></td>
			<td> <?php echo "<a href='prisonerBackup.php?delete=$row[PID]'>delete permanently<br />"; ?></td>
			
		
          
                </tr>
                <?php endwhile;?>

				</table>
        </form>
        
    </body>
</html>

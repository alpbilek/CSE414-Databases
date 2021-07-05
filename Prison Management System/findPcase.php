<?php
	require 'conn.php';
   include 'index.php';
	
	if( isset($_GET["find"]) )
	{
		$id = $_GET["find"];
		$query = "SELECT `prisoner`.`PID`,`prisoner`.`PRISONER_NAME`,`case`.`CASE_TYPE`,`visitor`.`VISITOR_NAME` FROM `case`,`prisoner`,`visitor` WHERE `prisoner`.`PID`=`case`.`PID`AND `prisoner`.`PID`=`visitor`.`PID` AND `prisoner`.`PID`='$id'";
		$result= mysqli_query($conn,$query);
		}
		
		?>

		   </div>
		   </form>
	
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


</style>
           <table>
			   <tr>
                    <th>ID</th>
            <th>PRISONER NAME</th>
			<th>CASE TYPE</th>
            <th>VISITOR NAME</th>
			</tr>

                <?php while($row = mysqli_fetch_assoc($result)):?>
                <tr>
                  <td><?php echo $row['PID']; ?></td>
            <td><?php echo $row['PRISONER_NAME']; ?></td>
            <td><?php echo $row['CASE_TYPE']; ?></td>
		    <td><?php echo $row['VISITOR_NAME']; ?></td>
          
                </tr>
                <?php endwhile;?>

				</table>

	</html>
	
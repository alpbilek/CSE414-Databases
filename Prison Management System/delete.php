<td class="contact-delete">
    <form action='viewPrisoner.php?delete="<?php echo $row['PID']; ?>"' method="get">
        <input type="hidden" name="delete" value="<?php echo $row['PID']; ?>">
        	<input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure to delete?')"> </td>

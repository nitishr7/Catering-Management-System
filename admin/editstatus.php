<form action="savestatus.php" method="post">
<input type="hidden" name="memids" value="<?php echo $_GET['res']; ?>" />
<select name="stat">
<option>Pending</option>
<option>Approved</option>
<option>Cancelled</option>
<option>Finished</option>
</select><br>
<input type="submit" value="Save">
</form>
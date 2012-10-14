<!DOCTYPE html>
<html>
<body>
<?php include("essential.php"); ?>
<form action="addRequest.php" autocomplete="on" method="POST">
	<table class='center'>
	<tr><td> Name:</td><td><input type="text" name="creator"><br> </tr>
	<tr><td> Email: </td><td><input type="email" name="creatorEmail" autocomplete="off"><br></tr>
	<tr><td> Phone No: </td><td><input type="text" name="creatorPhone"><br></tr>
	<tr><td> Are you requesting for someone else?</td><td><input type="checkbox" checked="checked" /></tr>
	<tr><td> Details of concerned person:</td></tr>
	<tr><td> Name:</td><td><input type="text" name="concernedPName"><br></tr>
	<tr><td> Email: </td><td><input type="email" name="concernedPEmail" autocomplete="off"><br></tr>
	<tr><td> Phone No:</td> <td><input type="text" name="concernedPPhone"><br></tr>
	<tr><td> Details of Event:</td><td></tr>
	<tr><td> Title:</td><td><input type="text" name="eventTitle"><br></tr>
	<tr><td> Select Room:</td><td>
	<select name="room">
	<option value="SH1">SH1</option>
	<option value="SH2">SH2</option>
	<option value="CR1">CR1</option>
	<option value="CR2">CR2</option>
	</select></tr>
	<tr><td> Building: </td><td> 
	<select name='buildingName' id='buildingName'>
	<option value='' >--Please select--</option>
	<option value='nilgiri' id='nilgiri'>nilgiri</option>
	<option value='vindhya' id='vindhya'>vindhya</option>
	<option value='Himalayas' id='Himalayas'>Himalayas</option>
	</select> </td></tr>
	<tr><td> Start Date: </td><td><div id='sdivdate'> <input type="text" name="eventStartDate"></div></td></tr>
	<tr><td> End Date: </td><td><div id='edivdate'> <input type="text" name="eventEndDate"> </div> </td></tr>
	<tr> <td>Start Timeslot : </td>	
	<td> <?php echo generate_timeslot("eventStartTime"); ?> </td>	
	</tr>
	<tr> <td>End Timeslot : </td>
	<td> <?php echo generate_timeslot("eventEndTime"); ?></td>
	</tr>
	<tr> <td>Repeat Type : </td> 
	<td> <input type='radio' name='reqType' value='Daily' checked='true' /> Daily </td></tr><tr><td></td>
	<td><input type='radio' name='reqType' value='Weekly' /> Weekly </td></tr>
	<tr> <td>Confirm from: </td>
	<td><div id='priveleged_users'>
	<select name='concernedAdmin' id='confirmedBy'>
	<option value='priveleged.user1' id='priveleged.user1'>priveleged.user1</option>	
	<option value='priveleged.user2' id='priveleged.user2'>priveleged.user2</option>
	<option value='priveleged.user3' id='priveleged.user3'>priveleged.user3</option>
	</select></div></td></tr><br/>
	<tr> <td> Activity/Reason: </td><td>
	<textarea id='description'  name='eventDesc'/></textarea></tr>
	<tr><td><input type='submit' name='submit' id='submit' class='center' value='BookRoom'/></td>
	</table>
	</form>	
</body>
</html>

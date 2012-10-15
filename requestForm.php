<!DOCTYPE html>
<html>
<head>
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/calendarDateInput.js"></script>
<script language="javascript" type="text/javascript" src="js/addRequest.js"></script>
</head>
<body>
<?php include("essential.php"); ?>
<form action="addRequest.php" autocomplete="on" method="POST">
	<table class='center'>
	<tr><td> Name:</td><td><input type="text" name="creator" id="P1"><br> </tr>
	<tr><td> Email: </td><td><input type="email" name="creatorEmail" id="P2" autocomplete="off"><br></tr>
	<tr><td> Phone No: </td><td><input type="text" name="creatorPhone" id="P3"><br></tr>
	<tr><td> Are you requesting for someone else?</td><td><input type="checkbox" id="switchAlias"/></tr>
	<tr class="CP"><td> Details of concerned person:</td></tr>
	<tr class="CP"><td> Name:</td><td><input type="text" name="concernedPName" id="CP1"><br></tr>
	<tr class="CP"><td> Email: </td><td><input type="email" name="concernedPEmail" id="CP2" autocomplete="off"><br></tr>
	<tr class="CP"><td> Phone No:</td> <td><input type="text" name="concernedPPhone" id="CP3"><br></tr>
	<tr><td> Details of Event:</td><td></tr>
	<tr><td> Title:</td><td><input type="text" name="eventTitle"><br></tr>
	<tr><td> Select Building: </td><td> 
	<?php echo generateBuildingList("buildingName"); ?>
	</td></tr>
	<tr><td> Select Room:</td><td>
	<?php echo generateRoomList("room"); ?>
	</td></tr>
	<tr> <td>Repeat Type : </td> 
	<td> <input type='radio' name='reqType' value='One Time' checked='true' class="repeat" id="repType1"/> One Time </td></tr><tr><td></td>
	<td><input type='radio' name='reqType' value='Multiple' id="repType2" class="repeat"/> Multiple </td></tr>
	<tr class="days"><td></td><td><input type="checkbox" name='day[]' value="1"/>Sunday</td><td>
		         <input type="checkbox" name='day[]' value="2"/>Monday</td></tr>
	<tr class="days"><td></td><td><input type="checkbox" name='day[]' value="3"/>Tuesday</td><td>
		         <input type="checkbox" name='day[]' value="4"/>Wednesday</td></tr>
	<tr class="days"><td></td><td><input type="checkbox" name='day[]' value="5"/>Thursday</td><td>
		         <input type="checkbox" name='day[]' value="6"/>Friday</td></tr>
	<tr class="days"><td></td><td><input type="checkbox" name='day[]' value="5"/>Saturday</td></tr>
	<tr><td> Start Date: </td><td><div id='sdivdate'>  <script>DateInput('eventStartDate', true,'YYYY-MM-DD')</script></div></td></tr>
	<tr><td> End Date: </td><td><div id='edivdate'>  <script>DateInput('eventEndDate', true,'YYYY-MM-DD')</script> </div> </td></tr>
	<tr> <td>Start Timeslot : </td>	
	<td> <?php echo generateTimeSlot("eventStartTime"); ?> </td>	
	</tr>
	<tr> <td>End Timeslot : </td>
	<td> <?php echo generateTimeSlot("eventEndTime"); ?></td>
	</tr>
		
	<tr> <td>Confirm from: </td>
	<td><div id='priveleged_users'>
	<select name='concernedAdmin' id='confirmedBy'>
	<?php printNextGroupOptions(0); ?> <!-- Default will be the value of $curGroup of the user currently logged in-->
	</select></div></td></tr><br/>
	<tr> <td> Activity/Reason: </td><td>
	<textarea id='description'  name='eventDesc'/></textarea></tr>
	<tr><td><input type='submit' name='submit' id='submit' class='center' value='BookRoom'/></td>
	</table>
	</form>	
</body>
</html>

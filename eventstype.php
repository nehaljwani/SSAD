<?php
include("essential.php");
require_once("header.php");
echo "<script type='text/javascript' src='js/calendarDateInput.js'> </script>";
if(!$_POST['submit'])
{
echo "
<h2 class='center'> Search Events </h2>

<form name='queryroom' id ='queryname'  method='POST' action='" . $PHP_SELF . "'>" ;

echo "<table class='center'>
<tr><td style='text-align:right'>Search(Event Type) : </td><td><input name='keyword' type='string'</td></tr>
</table>
<br/>
<table style='text-align:center'>
<tr><td> Select Start Date: </td>
<td><div id='divroomName'> <script>DateInput('date_start', true, 'YYYY-MM-DD')</script>  </div></td>
</tr>
<tr><td> Select End Date: </td>
<td><div id='divroomName'> <script>DateInput('date_end', true, 'YYYY-MM-DD')</script>  </div></td>
</tr>
<tr><td></td><td><br/>
<input type='submit' name='submit' id='submit' value='QueryEvents'/>
</td></tr></table>
</form>";

}
else
{
$date_s = strtotime($_POST['date_start']);
$date_e = strtotime($_POST['date_end']);
if($date_s > $date_e)
{
                header("Location:error.php?msg=ERROR: Your Date and time limits are wrong!");
}

$buildid = 1;
        $roomid=1;
$x = $_POST['date_start'];
$y = $_POST['date_end'];
$hardhik = $_POST['keyword'];
$query2 = "select Building.buildingName,Requests.eventDesc,eventStartTime,eventEndTime,room,eventStartDate,eventEndDate from Requests,Room,Building where appStatus = 'Accepted' AND Requests.room = Room.roomName AND Building.buildId = Room.buildingName AND Requests.eventDesc LIKE '%".$hardhik."%' AND ((eventStartDate <= DATE '".$x."' AND eventEndDate >= DATE '".$y."') OR (eventStartDate >= DATE '".$x."' AND eventEndDate >= DATE '".$y."' AND eventStartDate <= DATE '".$y."') OR (eventStartDate >= DATE '".$x."' AND eventEndDate <= DATE '".$y."') OR (eventStartDate <= DATE '".$x."' AND eventEndDate <= DATE '".$y."' AND eventEndDate >= DATE '".$x."'));";
$result9=execute($query2);
$y = mysql_num_rows($result9);

echo "<table id='box-table-a'>
<thead>
<tr>
<th scope='col'>Building Name</th>
<th scope='col'>Description</th>
<th scope='col'>Start Time</th>
<th scope='col'>End Time</th>
<th scope='col'>Room</th>
<th scope='col'>Start Date</th>
<th scope='col'>End Date</th>
</tr>
</thead>";
while($y!=0)
{
$row3 = mysql_fetch_assoc($result9);

echo "<tr class='alt'>
<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['buildingName'];
echo "</font></td>";
echo "<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['eventDesc'];
echo "</font></td>";
echo "<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['eventStartTime'];
echo "</font></td>";
echo "<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['eventEndTime'];
echo "</font></td>";
echo "<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['room'];
echo "</font></td>";
echo "<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['eventStartDate'];
echo "</font></td>";
echo "<td><font face = 'Arial, Helvetica, sans-serif'>";
echo $row3['eventEndDate'];
echo "</font></td>";
echo "</tr>";
$y = $y - 1;
}
echo "</table>";
}
?>

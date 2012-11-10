<?php

include("essential.php");

dbconnect();
require_once("header.php");
$q = "select * from Building;";
$r = execute($q);
echo "

	<table style='align:center' id  = tabletype>
	<tr>
	";



$morstrt='08:00:00';
$morend='13:00:00';
$evestrt='14:00:00';
$eveend='22:00:00';
$m = "morning";
$e = "evening";

	if($_GET['date']){
        	$date = $_GET['date'];
	        $time = strtotime($date);
		}
	else $time = time();

while($result = mysql_fetch_assoc($r))
{

	echo "
		<td><a class='button orange' href = 'nhome.php?m=".$m."&start_time=".$morstrt."&date=" . date("d-M-y",strtotime("+0 day",$time))."&end_time=".$morend."&building_id=".$result['buildId']."'>".$result['buildingName']."</a></td>";
}
echo
	"</tr>
	</table>
	";





	if(ISSET($_GET) && $_GET['building_id'] != '' && $_GET['building_id'] != null && ISSET($_GET['end_time']) && ISSET($_GET['start_time']) )
	{
//echo "<div class='post'>";
//echo "<div class='entry'>";
$strttime=$_GET['start_time'];
$endtime=$_GET['end_time'];
	if($_GET['date']){
        	$date = $_GET['date'];
	        $time = strtotime($date);
		}
	else $time = time();
echo "<br/><br/>";	
echo "<div style='text-align:center'>";

		echo "<a href='nhome.php?m=".$m."&start_time=".$morstrt."&end_time=".$morend."&date=" . date("d-M-y",strtotime("-1 day",$time))."&building_id=".$_GET["building_id"]."' class='button gray small'><<< </a>";
		echo "<b>    ".  date("d-M-y",$time) . "   </b>";
		echo "<a href='nhome.php?m=".$m."&start_time=".$morstrt."&end_time=".$morend."&date=" . date("d-M-y",strtotime("+1 day",$time))."&building_id=".$_GET["building_id"]."' class='button gray small'> >>> </a>";
		echo "</br>";
		echo "</br>";
		echo "<a href='nhome.php?m=".$m."&start_time=".$morstrt."&end_time=".$morend."&date=" . date("d-M-y",strtotime("+0 day",$time))."&building_id=".$_GET["building_id"]."' class='button orange' >MORNING</a>    ";
		echo "<a href='nhome.php?m=".$e."&start_time=".$evestrt."&end_time=".$eveend."&date=" . date("d-M-y",strtotime("+0 day",$time))."&building_id=".$_GET["building_id"]."' class='button orange'>EVENING</a>";
                echo "</div>";

		echo "</br>";
		echo "</br>";

//require_once("footer.php");
//table class = grid
//echo "<div style='text-align:center'>";
		echo "<p class='button green small'>A</p> : AVAILABLE    ";
		echo "<p class='button blue small'>R</p> : REQUESTED    ";
		echo "<p class='button red small'>T</p> :(TYPE) BOOKED   ";
  //    echo "</div>";

		$q1 =  "select * from Room where buildingName = ".$_GET['building_id'].";";
		$row_c = 1;
		$r1 = execute($q1);

		if($_GET['building_id']==1)
		{	
			$bname='NILGIRI';
			}		
		else if($_GET['building_id']==2)
		{	
			$bname='VINDHYAS';
			}		
		else if($_GET['building_id']==3)
		{	
			$bname='HIMALAYAS';
			}		

		echo "
<!--			<br/><br/><br/>-->
			<br/>
			<h2>Rooms in ".$bname."</h2><br/>	
			<table> 
			<tr>";
			$y=1;
	
		if($_GET['m']=="morning")
		{
			echo "<td></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>8:30-9:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>9-10</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>10-11</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>11-12</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>12-1</a></td>";
			echo "</tr>";
		}

		else
		{
			echo "<td></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>2-3</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>3-4</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>4-5</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>5-6</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>6-7</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>7-8</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>8-9</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>9-10</a></td>";
			echo "</tr>";
			

		}


//echo "</div>";
//echo "</div>";




		while($rows = mysql_fetch_assoc($r1))
		{
//			if($y){
			echo "<tr>
			 <td>". $rows['roomName']."</td>";

//collision strts
$strttime=$_GET['start_time'];
$endtime=$_GET['end_time'];
$new1 = collision($rows['roomName'] , $time , $time ,$time , strtotime('23:59:59'),'DAILY');
$p = mysql_num_rows($new1);
//echo count($new1);

//echo "<br/>";
$x = 1;
foreach($new1 as $h)
{
//echo "mehar"."<br/>";
//echo $h['reqNo'];
//echo $h['eventStartTime'];
//echo "<br/>";
//echo $h['creator'];
//echo "<br/>";
//echo $h['eventEndTime'];
//echo "<br/>";
//echo $h['appStatus'];
//echo "<br/>";
//$x = $h['room'];
//echo $x;
//echo "<br/>";
//echo $h['reqType']."<br/>";
//$x = $h['Room'];
//echo $h['roomName'];
if($h['Start_Time'] != $strttime){

while($strttime != $h['eventStartTime'] && $strttime < $endtime)
{
//echo "nothing".$strttime."<br/>";
//$t = "select roomName from Room where roomId = '".$h['roomId']."';";
$t = "select roomName from Room where roomName = '".$h['room']."';";

$g = execute($t);

$rw = mysql_fetch_assoc($g);
               echo "
<td>
<a class='button green' style='width:20px;height:20px' href='"."requestForm.php?roomName=".$rows['roomName']."&Start_Date=".date("d-M-y",$time)."&End_Date=".date("d-M-y",$time)."&Start_Time=".$strttime."&End_Time=".gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+3600)."'>
A
</a>
</td>";

 $strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+3600);
}

}
        if($h['appStatus']=='Accepted' && $strttime < $endtime){
//echo "accepted";
//echo $strttime;
//echo $h['eventEndTime'];
while($strttime != $h['eventEndTime'])
{
//echo "eeeeeeee"."<br/>";
                echo "<td><a class='button red' style='width:20px;height:20px' href='details.php?id=".$h['reqNo']."'> ".$h['eventTitle']."</a></td>";
$strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+3600);
        }

}
        if($h['appStatus']=='Pending' && $strttime <$endtime){
//echo "pendingiiiiiiiiiiiiiiiiiiiiiiii";
while($strttime != $h['eventEndTime'])
{
                echo "<td><a class='button blue' style='width:20px;height:20px' href='booking_info.php?booking_id=".$h["booking_id"]."'> R </a></td>";
$strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+3600);
}

}

}


while($strttime != $endtime)
{
//echo "gv";
$t = "select roomName from Room where roomName = '".$x."';";

$g = execute($t);

$rw = mysql_fetch_assoc($g);
	echo "<td><a style='width:20px;height:20px' class='button green' href='"."requestForm.php?roomName=".$rows['roomName']."&Start_Date=".date("d-M-y",$time)."&End_Date=".date("d-M-y",$time)."&Start_Time=".$strttime."&End_Time=".gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+3600)."'> A </a></td>";
 $strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+3600);

}
//end of collision
echo "</tr>";


		}
	}


			
			
 
echo "</table>";
require_once('footer.php')		;
echo "
</div>
</div>
                <div id = 'content_bottom'></div>
                <div id = 'footer><h3>Developed by: Bond With Bondas</h3></div>
                </div>";

echo "	</body>";
echo "	</html>";



?>


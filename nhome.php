<?php

include("essential.php");

dbconnect();
require_once("header.php");
/*echo "<a class='link-style2' href='#'>gvc</a>";
echo "<br/>";
echo "<a class='button green' style='width:20px;height:20px' href='#'>gvc</a>";*/
echo "<script type='text/javascript' src='js/button.js'></script>";
//echo "<button class='styled-button-10'>gvcgvc</button>";
$q = "select * from Building;";
$r = execute($q);

$morstrt='08:00:00';
$morend='13:00:00';
$aftstrt='14:00:00';
$aftend='18:00:00';
$evestrt='18:00:00';
$eveend='22:00:00';
$m = "morning";
$a="afternoon";
$e = "evening";

echo "
<center>
	<table style='align:center' id  = tabletype>
	<tr>
	";

	if($_GET['date']){
        	$date = $_GET['date'];
	        $time = strtotime($date);
		}
	else $time = time();
while($result = mysql_fetch_assoc($r))
{

	echo "
<td>";

if(ISSET($_GET) && $_GET['building_id'] != '' && $_GET['building_id'] != null && ISSET($_GET['end_time']) && ISSET($_GET['start_time']) )
{
	
	if($_GET['building_id'] == $result['buildId'])
	{
		echo "<a id=".$result['buildId']."  class='button black1' href = 'nhome.php?m=".$m."&start_time=".$morstrt."&date=" . date("d-M-y",strtotime("+0 day",$time))."&end_time=".$morend."&building_id=".$result['buildId']."'>".$result['buildingName']."</a></td>";
	}

	else
	{
		echo "<a id=".$result['buildId']."  class='button orange1' href = 'nhome.php?m=".$m."&start_time=".$morstrt."&date=" . date("d-M-y",strtotime("+0 day",$time))."&end_time=".$morend."&building_id=".$result['buildId']."'>".$result['buildingName']."</a></td>";
	}

}

else
{
echo "<a id=".$result['buildId']."  class='button orange1' href = 'nhome.php?m=".$m."&start_time=".$morstrt."&date=" . date("d-M-y",strtotime("+0 day",$time))."&end_time=".$morend."&building_id=".$result['buildId']."'>".$result['buildingName']."</a></td>";

}

}




/*echo "<script type="."text/javascript".">
function yippee()
{
alert("."BUSHYY BABY AYPOYINDII !! :D :D ROCK CHESTUNAV GAA ! :D ;) :P ;)".");
}
</script>";
echo "<td onclick='alert(".$m.")'><p class='button orange' >CLICK ME</p></td>";
*/





echo
	"</tr>
	</table>
</center>
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
echo "<br/>";	
echo "<div style='text-align:center'>";

		echo "<a href='nhome.php?m=".$m."&start_time=".$morstrt."&end_time=".$morend."&date=" . date("d-M-y",strtotime("-1 day",$time))."&building_id=".$_GET["building_id"]."' class='button gray small'><<< </a>";
		echo "<b>    ".  date("l",$time) . ",  ".   date("d-M-y",$time) . "   </b>";
		echo "<a href='nhome.php?m=".$m."&start_time=".$morstrt."&end_time=".$morend."&date=" . date("d-M-y",strtotime("+1 day",$time))."&building_id=".$_GET["building_id"]."' class='button gray small'> >>> </a>";
		echo "&nbsp";
		echo "</br>";
		echo "</br>";

$dayquery="select slot,starttime,endtime from DaySlots";
$dayresult=execute($dayquery);

while($result = mysql_fetch_assoc($dayresult))
{
//echo strtoupper($_GET['m']);

if(($result['slot'] == $_GET['m']) or ($result['slot'] == strtoupper($_GET['m'])) )
{
		echo "<a   style='text-transform:uppercase;' href='nhome.php?m=".$result['slot']."&start_time=".$result['starttime']."&end_time=".$result['endtime']."&date=" . date("d-M-y",strtotime("+0 day",$time))."&building_id=".$_GET["building_id"]."' class='button black1' >".$result['slot']."</a>    ";
}
else
{
		echo "<a   style='text-transform:uppercase;' href='nhome.php?m=".$result['slot']."&start_time=".$result['starttime']."&end_time=".$result['endtime']."&date=" . date("d-M-y",strtotime("+0 day",$time))."&building_id=".$_GET["building_id"]."' class='button orange1' >".$result['slot']."</a>    ";
}
}
//		echo "<a href='nhome.php?m=".$a."&start_time=".$aftstrt."&end_time=".$aftend."&date=" . date("d-M-y",strtotime("+0 day",$time))."&building_id=".$_GET["building_id"]."' class='button orange' >AFTERNOON</a>    ";
//		echo "<a href='nhome.php?m=".$e."&start_time=".$evestrt."&end_time=".$eveend."&date=" . date("d-M-y",strtotime("+0 day",$time))."&building_id=".$_GET["building_id"]."' class='button orange'>EVENING</a>";
                echo "</div>";

		echo "</br>";
		//echo "</br>";

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

//		echo "<!--<br/><br/><br/>--><br/><h2>Rooms in ".$bname."</h2><br/>";	

echo"			<table> 
			<tr>";
			$y=1;
	
		if($_GET['m']=="morning" or $_GET['m']=="MORNING")
		{
			echo "<td></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>8:00-8:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>8:30-9:00</a></td>";
			echo "<td><a class='button black' style='width:20px;height:20px'>9:00-9:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>9:30-10:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>10:00-10:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>10:30-11:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>11:00-11:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>11:30-12:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>12:00-12:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>12:30-1:00</a></td>";
			echo "</tr>";
		}
		elseif($_GET['m']=="afternoon" or $_GET['m']=="AFTERNOON")
		{
			echo "<td></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>2:00-2:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>2:30-3:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>3:00-3:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>3:30-4:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>4:00-4:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>4:30-5:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>5:00-5:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>5:30-6:00</a></td>";
			echo "</tr>";
		}
		else
		{
			echo "<td></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>6:00-6:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>6:30-7:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>7:00-7:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>7:30-8:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>8:00-8:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>8:30-9:00</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>9:00-9:30</a></td>";
			echo "<td><a style='width:20px;height:20px' class='button black'>9:30-10:00</a></td>";
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
$pq = $_GET['start_time'];
$new1 = collision($rows['roomName'] , $time , $time ,$time , strtotime('23:59:59'),'DAILY');
$p = mysql_num_rows($new1);
//echo count($new1);

//echo "<br/>";
$x = 1;
foreach($new1 as $h)
{
	if($h['eventStartTime'] < $pq and $h['eventEndTime'] < $pq)
	{
	//	echo "yahoo";
		continue;
	}
	elseif($h['eventStartTime'] < $pq and $h['eventEndTime'] > $pq)
	{
		while($strttime != $h['eventEndTime'] and $strtime < $endtime)
		{
			if($h['appStatus']=='Accepted' and $strttime < $endtime)
			{
                echo "<td><a class='button red' style='width:20px;height:20px' href='details.php?id=".$h['reqNo']."&roomName=".$h['room']."&eventStartDate=".$h['eventStartDate']."&eventEndDate=".$h['eventEndDate']."&eventStartTime=".$h['eventStartTime']."&eventEndTime=".$h['eventEndTime']."&eventTitle=".$h['eventTitle']."'> ".$h['eventTitle']."</a></td>";
		//		                echo "<td><a class='button red' style='width:20px;height:20px' href='details.php?id=".$h['reqNo']."&eventStartDate=".$h['eventStartDate']."'> ".$h['eventTitle']."</a></td>";
						$strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800);
			}
			elseif($h['appStatus']=='Pending' and $strttime < $endtime)
			{
				                echo "<td><a class='button blue' style='width:20px;height:20px' href='details.php?id=".$h["reqNo"]."'> R </a></td>";
						$strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800);
			}
		}
	}
	elseif($strttime > $h['eventStartTime'])
	{
	continue;
	}
//echo "<br/>";
$x = $h['room'];
if($h['Start_Time'] != $strttime){

while($strttime != $h['eventStartTime'] && $strttime < $endtime)
{
//echo "nothing".$strttime."<br/>";
//$t = "select roomName from Room where roomId = '".$h['roomId']."';";
$t = "select roomName,buildingName from Room where roomName = '".$h['room']."';";

$g = execute($t);

$rw = mysql_fetch_assoc($g);
$t1="select buildingName from Building where buildId = ".$rw['buildingName']."";
$t2 = execute($t1);
$t3 = mysql_fetch_assoc($t2);
               echo "
<td>
<a class='button green' style='width:20px;height:20px' href='"."requestForm.php?buildingname=".$t3['buildingName']."&roomName=".$rows['roomName']."&Start_Date=".date("d-M-y",$time)."&End_Date=".date("d-M-y",$time)."&Start_Time=".$strttime."&End_Time=".gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800)."'>
A
</a>
</td>";

 $strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800);
}

}
        if($h['appStatus']=='Accepted' && $strttime < $endtime){
while($strttime < $h['eventEndTime'] and $strttime < $endtime)
{
                echo "<td><a class='button red' style='width:20px;height:20px' href='details.php?id=".$h['reqNo']."&roomName=".$h['room']."&eventStartDate=".$h['eventStartDate']."&eventEndDate=".$h['eventEndDate']."&eventStartTime=".$h['eventStartTime']."&eventEndTime=".$h['eventEndTime']."&eventTitle=".$h['eventTitle']."'> ".$h['eventTitle']."</a></td>";
$strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800);
        }


}
        if($h['appStatus']=='Pending' && $strttime <$endtime){
while($strttime != $h['eventEndTime'] and $strttime < $endtime)
{
                echo "<td><a class='button blue' style='width:20px;height:20px' href='details.php?id=".$h["reqNo"]."'> R </a></td>";
$strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800);
}
}
}


while($strttime != $endtime)
{
//echo "gv";
$t = "select roomName,buildingName from Room where roomName = '".$rows['roomName']."';";
$g = execute($t);

$rw = mysql_fetch_assoc($g);
$t1="select buildingName from Building where buildId = ".$rw['buildingName']."";
$t2 = execute($t1);
$t3 = mysql_fetch_assoc($t2);
//echo "asdasd".$t3['buildingName']."asdasd";
	echo "<td><a style='width:20px;height:20px' class='button green' href='"."requestForm.php?buildingname=".$t3['buildingName']."&roomName=".$rows['roomName']."&Start_Date=".date("d-M-y",$time)."&End_Date=".date("d-M-y",$time)."&Start_Time=".$strttime."&End_Time=".gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800)."'> A </a></td>";
 $strttime = gmdate("H:i:s",(strtotime($strttime)-strtotime("00:00:00"))+1800);

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


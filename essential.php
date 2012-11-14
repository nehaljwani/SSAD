

<?php
$week['Sunday'] = 1;
$week['Monday'] = 2;
$week['Tuesday'] = 3;
$week['Wednesday'] = 4;
$week['Thursday'] = 5;
$week['Friday'] = 6;
$week['Saturday'] = 7;
//All user $groupss, $groups IDs correspond to indices of the following array
$groups = array ('Student', 'Parliament', 'Academic Office', 'SLC Chair', 'Dean Academics', 'Admin Manager', 'TA', 'faculty');
date_default_timezone_set("Asia/Calcutta") or die("Time Zone setting issues\n");
//$userTimeZone = date_default_timezone_get();
//echo $userTimeZone."\n";

if(isset($_GET['logout'])){
	echo "Logout Successfull!";
	session_destroy();
}


//	To make a connection with the database

function dbconnect(){
        GLOBAL $con;
        $con = mysql_connect('localhost','room','ROOMIE_ROOMIE');
        if(!$con){
                die("Error in connection!");
        }   
        else {
                $chooseDB = "USE room_allocation";
                $fetchDB = mysql_query( $chooseDB , $con);
                if(!$fetchDB){
                        die("no database!");
                }   
        }   
}

function execute($query){
	GLOBAL $con;

	if($con == 0 ){
		dbconnect();
	}   
	$result = mysql_query($query,$con);
	if(!$result){
		die("Cannot execute the query".$query);
	}   
	else{
		return $result; 
	}   
}

function paginate($file,$myquery,$start,$lim,$id='')
{
	
	$query1 = $myquery.';';
	 GLOBAL $con;
	 if($con==0)       //for connecting db
	dbconnect();
	$result=execute($myquery);      //take query result
	$num = mysql_num_rows($result);
	if($num == 0)                    // check if empty
	{
		return $result;
	}
	$back = $start - $lim;                            //back and next
	$next = $start + $lim;
	$query2= $myquery." limit ".$start.",".$lim;        //for limiting printing
	$result2=mysql_query($query2,$con);

	echo mysql_error();
	$index = 1;
	if($num > $lim){		// display links only if records are enuf.
		if($back >=0){
			echo"<a href='".$file."?st=".$back."&view=${id}'>PREV</a>"; //pre page print
		}

		for($i=0;$i<$num;$i=$i+$lim){
			if($i != $start){

			echo" <a href='".$file."?st=".$i."&view=${id}'>"; //for next page print
			echo ' '.$index;                          
			echo "</a>";
			}
			else{
				echo ' ';
				echo $index;
			}
			$index = $index + 1;
		}
		if($next < $num){
			echo" <a href='".$file."?st=".$next."&view={$id}'> NEXT</a>";  //next button referencing
		}
	}
	return $result2;
}
/*Returns an array containing the forwarding options available to each user. 
 *Not to be used directly, the printNextGroupOptions does the printing.
 *Javascript to be used to ensure that if time > 5pm, forwarding options are 
 *limited for TAs.
 */
function generate_list($q,$x,$isnull = true,$default= false ){
	$r = execute($q);
	$i=0;
	$rowcount = mysql_num_rows($r);
	$st = "<select name='" . $x . "' id='" . $x . "'>";
	if($isnull) $st .= "<option value='' >--Please select--</option>";
	while($row = mysql_fetch_array($r,MYSQL_NUM)){
		//if($default!=false && $row[0]==$default){
		//$st .= "<option value='".$row[0]."' id='".$row[0]."' selected>".$row[0]."</option>";
		    
		//  }
	//	else{
		$st .= "<option value='".$row[0]."' id='".$row[0]."'>".$row[0]."</option>";
	//	}
	}
	$st .= "</select>";
	return $st;
}

function generate_select_list($q,$x,$b,$isnull = true,$default= false ){
	$r = execute($q);
	$i=0;
	$rowcount = mysql_num_rows($r);
	$st = "<select name='" . $x . "' id='" . $x . "'>";

	while($row = mysql_fetch_array($r,MYSQL_NUM)){
	
		if($row[0]==$b){
		$st .= "<option value='".$row[0]."' id='".$row[0]."' selected>".$row[0]."</option>";
		}
		else
		{

		$st .= "<option value='".$row[0]."' id='".$row[0]."'>".$row[0]."</option>";
		}
	}	
	$st .= "</select>";
	return $st;
}
function getGroup($userID){
	//Takes a user ID and returns group from database. Returns 0 if not found.
	dbconnect();
	$query = "select level from User where email = \"{$userID}\"";
	$result = execute($query);
	if(mysql_num_rows($result)==0){
		return 0;
	}
	else{
		$row = mysql_fetch_row($result);
		return $row[0];
	}
}
function getNextGroup($curGroup){
  global $groups;
  switch($curGroup){
  case 0:
    return array(1=>$groups[1], 3=>$groups[3]);
    break;
  case 1:
    return array(2=>$groups[2], 3=>$groups[3]);
    break;
  case 2:
    return array(3=>$groups[3], 4=>$groups[4], 5=>$groups[5]);
    break;
  case 6:
    return array(4=>$groups[4], 3=>$groups[3], 2=>$groups[2]);
    break;
  case 7:
    return array(2=>$groups[2]);
    break;
  default:
    return -1;
  }
}
//The following function will not be used, for now. The options for TAs will be 
//limited by client-side Javascript. Server side validation will be done, but 
//not for R1.
/*function getNextGroupInitial($curGroup, $endTime){
  switch($curGroup){
  case 0:
    return array($groups[1], $groups[3]);
    break;
  case 1:
    return array($groups[2], $groups[3]);
    break;
  case 7:
    return array($groups[2]);
    break;
  }
  if($curGroup == 2){
    if($endTime > 5){
      return array($groups[4], $groups[3]);
    }
    else{
      return array($groups[2], $groups[3]);
    }
  }
  else{
    return -1;
  }
}*/
function printNextGroupOptions($curGroup){
  $groupArray = getNextGroup($curGroup);
    if($groupArray == -1)
    die("No valid group options found.\n");
  $groupKeys = array_keys($groupArray);
  
  for( $i = 0; $i < sizeof($groupKeys); $i++ ){
    $index = $groupKeys[$i];
    echo "<option value = \"{$index}\">$groupArray[$index]</option>\n";
  }
}

function generateTimeSlot1($myid,$t,$default=false){
        $st = "<select name='". $myid . "' id='". $myid."' >";
        $st .= "<option value='00:00:00' id='fg'>Please select</option>";
        for($i=0;$i<24;$i++){
                $dig=0;
                $k = $i; 
                while($k>0){
                        $k/=10;
                        $dig++;
                }   
                $j = $i.'';
                if($i<10){
                        $j = '0' . $j; 
                }   
                $j1 = $j.":00:00";
		$j2 = $j.":30:00";
		if($t == $j1)
		{
			$st .= "<option selected='selected' value='" . $j1 . "' name='" . $j1 . "' id='" .$j1."'>".$j1."</option>";
		}
		else
		{
			$st .= "<option value='" . $j1 . "' name='" . $j1 . "' id='" .$j1."'>".$j1."</option>";
		}
		if($t == $j2)
		{
		$st .= "<option selected = 'selected' value='" . $j2 . "' name='" . $j2 . "' id='" .$j2."'>".$j2."</option>";
		}
		else
		{
			$st .= "<option value='" . $j2 . "' name='" . $j2 . "' id='" .$j2."'>".$j2."</option>";
		}

        }   
                $st .= "<option value='23:59:59' name='23:59:59' id='23:59:59'>23:59:59</option>";

        $st .= "</select>";
        return $st;
}

//To make a drop down list easily
function generateTimeSlot($myid,$default=false){
        $st = "<select name='". $myid . "' id='". $myid."' >";
        $st .= "<option value='99:99:99' id='fg'>Please select</option>";
        for($i=0;$i<24;$i++){
                $dig=0;
                $k = $i; 
                while($k>0){
                        $k/=10;
                        $dig++;
                }   
                $j = $i.'';
                if($i<10){
                        $j = '0' . $j; 
                }   
                $j1 = $j.":00:00";
                $j2 = $j.":30:00";
                $st .= "<option value='" . $j1 . "' name='" . $j1 . "' id='" .$j1."'>".$j1."</option>";
                $st .= "<option value='" . $j2 . "' name='" . $j2 . "' id='" .$j2."'>".$j2."</option>";

        }   
                $st .= "<option value='23:59:59' name='23:59:59' id='23:59:59'>23:59:59</option>";

        $st .= "</select>";
        return $st;
}

function generateRoomList($myid){
	$query="SELECT roomName,B.buildingName FROM Room R, Building B WHERE R.buildingName=B.buildId;";
	dbconnect();
	$result=execute($query);
        $st = "<select name='". $myid . "' class='". $myid."' >";
        $st .= "<option value='' id='fg'>Please select</option>";
	while($row = mysql_fetch_array($result)){
		$st .= "<option value='" . $row['roomName'] . "' id='" .$row['buildingName']."'>".$row['roomName']."</option>";
	}
        $st .= "</select>";
        return $st;
}
function generateRoomList1($myid,$a){
        $query="SELECT roomName,B.buildingName FROM Room R, Building B WHERE R.buildingName=B.buildId;";
        dbconnect();
        $result=execute($query);
        $st = "<select name='". $myid . "' class='". $myid."' >";
        $st .= "<option value='' id='fg'>Please select</option>";
        while($row = mysql_fetch_array($result)){
		if($a==$row['roomName'])
{
                $st .= "<option selected='selected' value='" . $row['roomName'] . "' id='" .$row['buildingName']."'>".$row['roomName']."</option>";}
else
{

                $st .= "<option value='" . $row['roomName'] . "' id='" .$row['buildingName']."'>".$row['roomName']."</option>";
}
        }
        $st .= "</select>";
        return $st;
}


function generateBuildingList($myid){
	$query="SELECT buildId,buildingName FROM Building;";
	dbconnect();
	$result=execute($query);
        $st = "<select name='". $myid . "' id='". $myid."' >";
        $st .= "<option value='' id='fg'>Please select</option>";
	while($row = mysql_fetch_array($result)){
		$st .= "<option value='" . $row['buildingName'] . "' id='" .$row['buildId']."'>".$row['buildingName']."</option>";
	}
        $st .= "</select>";
        return $st;
}


function generateGroupList($query,$myid){
	dbconnect();
	$result=execute($query);
        $st = "<select name='". $myid . "' id='". $myid."' >";
        $st .= "<option value='' id='fg'>Please select</option>";
	while($row = mysql_fetch_array($result)){
		$st .= "<option value='" . $row['groupName'] . "' id='" .$row['level']."'>".$row['groupName']."</option>";
	}
        $st .= "</select>";
        return $st;
}
function dateToDay($date){ //Input date yyyy-mm-dd; output 0-Sunday; 6-Satuday
  $dateStamp = strtotime($date);
  $day = date("w", $dateStamp);
  return $day;
}
function addWeeklyRequest($startDate, $endDate)
{
    $curDate = $startDate;
    $events=array();
    while(strtotime($curDate) <= strtotime($endDate)){
	//echo $curDate."\n";
	$events[]= $curDate;
	//Add request with curDate to instances

	$curStamp = strtotime($curDate." + 1 week");
	$curDate = date("Y-m-d", $curStamp);
    }
    return $events;
}
function weeklyRequestToInstance($startDate, $endDate, $arrayOfDays){
  /*
   * Foreach arrayOfDays where 1-Sunday and 7-Saturday, call addWeeklyRequest 
   * with minor adjustments. Adjustments being:
   * Find the first Sunday on or after the startDate, and pass its date as the 
   * startDate to addWeeklyRequest. Repeat for every day of week in arrayOfDays
   */
  $events=array();
  foreach($arrayOfDays as $day){
    $day = (int)$day;
    //Find the first n-day on or after the start date
    $day = ($day-1)%7; //Input convention changed to PHP convention
    $day = (string)$day;
    $dateForDay = $startDate;
    while(dateToDay($dateForDay) != $day)
    {
      $dateForDay = date("Y-m-d", strtotime($dateForDay."+ 1 day"));
    }
   // echo "\n\n**".$dateForDay."\n";
    $events=array_merge($events,addWeeklyRequest($dateForDay, $endDate));
  }
   return $events;
}
function escape($x){
	$x = stripslashes($x);
	$x = mysql_real_escape_string($x);
	return ($x);
}
function arrayToCSV($array)
{
  $out="";
  foreach($array as $element){
    if($out == "") 
      $out = $element;
    else
      $out=$out.",".$element;
  }
  return $out;
}
function CSVToArray($string){
  if(substr($string,-1)==','){
	 $string=substr($string, 0, -1);
  }
  $result=explode(',', $string);
  if($result[0]!='')
	  return $result;
  else
	  return array();
}

function instanceClash($startDate,$endDate,$startTime,$endTime,$room){
	dbconnect();
	$query="SELECT * FROM Instances WHERE 
		room='".$room."' AND 
		((eventStartDate < '".$startDate."' AND eventEndDate > '".$startDate."') || 
		(eventStartDate < '".$endDate."' AND eventEndDate > '".$endDate."') || 
		(eventStartDate > '".$startDate."' AND eventEndDate < '".$endDate."') ||
		(eventStartDate = '".$startDate."' AND eventEndDate = '".$endDate."')) AND
		((eventStartTime < '".$startTime."' AND eventEndTime > '".$startTime."') || 
		(eventStartTime < '".$endTime."' AND eventEndTime >'".$endTime."') || 
		(eventStartTime > '".$startTime."' AND eventEndTime < '".$endTime."') ||
		(eventStartTime = '".$startTime."' AND eventEndTime = '".$endTime."'));";
	$result=execute($query);
	$num=mysql_num_rows($result);
	if($num==0){
		return NULL;
	}
	else{
		return $result;
	}
}
function requestClash($startDate,$endDate,$startTime,$endTime,$room){
	dbconnect();
	$query="SELECT * FROM Requests WHERE
		room='".$room."' AND 
		((eventStartDate < '".$startDate."' AND eventEndDate > '".$startDate."') || 
		(eventStartDate < '".$endDate."' AND eventEndDate > '".$endDate."') || 
		(eventStartDate > '".$startDate."' AND eventEndDate < '".$endDate."') ||
		(eventStartDate = '".$startDate."' AND eventEndDate = '".$endDate."')) AND
		((eventStartTime < '".$startTime."' AND eventEndTime > '".$startTime."') || 
		(eventStartTime < '".$endTime."' AND eventEndTime >'".$endTime."') || 
		(eventStartTime > '".$startTime."' AND eventEndTime < '".$endTime."') ||
		(eventStartTime = '".$startTime."' AND eventEndTime = '".$endTime."'));";
	echo $query;
	$result=execute($query);
	$num=mysql_num_rows($result);
	if($num==0){
		return NULL;
	}
	else{
		return $result;
	}
}


function accept($name,$mail_to,$room_no,$request_id,$cc)
{
	$date = date('Y-m-d H:i:s');
	$body="Dear ".$name.",\nYour request with Request id ".$request_id." for Room no.".$room_no." has been accepted by Admins.\nThis is a System Generated Mail. Please do not reply.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
	$message = " 
		<html>
		<body>
		<p>".$body."</p>
		</body>
		</html>";
	$subject="Room allocation: Request Accepted";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: R A Portal <noreply@roomreservation.iiit.ac.in>' . "\r\n";
	$headers .= "Cc: {$cc}"."\r\n";
	mail($mail_to,$subject,$message,$headers);
}

function reject($name,$mail_to,$room_no,$request_id,$reason, $cc)
{
 	$date = date('Y-m-d H:i:s');
	$body="Dear ".$name.",\nYour request with Request id ".$request_id." for Room no.".$room_no." has been rejected by Admins due to the reason: .\n ".$reason."  \nThis is a System Generated Mail. Please do not reply.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
	$message = " 
		<html>
		<body>
		<p>".$body."</p>
		</body>
		</html>";
	$subject="Room allocation: Request Rejected";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: R A Portal <noreply@roomreservation.iiit.ac.in>' . "\r\n";
	$headers .= "Cc: {$cc}"."\r\n";
 	mail($mail_to,$subject,$message,$headers);
}

function cancel($name,$mail_to,$room_no,$request_id,$reason, $cc){
	echo "$name,<br>";
	echo "$mail_to,<br>";
	echo "$room_no,<br>";
	echo "$request_id,<br>";
	echo "$reason,<br>";
	print_r($cc);
 	$date = date('Y-m-d H:i:s');
	$body="Dear ".$name.",\nYour request with Request id ".$request_id." for Room no.".$room_no." has been rejected by Admins due to the reason: .\n ".$reason."  \nThis is a System Generated Mail. Please do not reply.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
	$message = " 
		<html>
		<body>
		<p>".$body."</p>
		</body>
		</html>";
	$subject="Room allocation: Request Cancelled";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: R A Portal <noreply@roomreservation.iiit.ac.in>' . "\r\n";
	$headers .= "Cc: {$cc}"."\r\n";
 	mail($mail_to,$subject,$message,$headers);
}


function forward($name,$mail_to,$room_no,$request_id,$original_mail_id, $cc)
{
	$hash=gethash($request_id);
	$gID = getGroup($mail_to);
 	$date = date('Y-m-d H:i:s');
	$body="Sir,\n".$name." with mail id ".$original_mail_id." has sent the Request for Room no. ".$room_no.".The Request id is. ".$request_id." . Kindly check and if possible give your consent\n\n.";
	$message = " 
		<html>
		<body>
		<p>".$body."</p>
		<p> Click <a href=\"http://localhost/roomReservationSystem/SSAD/req_detail_hash.php?hash=".$hash."&gID={$gID}\"> here </a>to verify the request! </p>
		\n\n\n\nCheers,\nAdmins\n\n\n\nMail generated at: ".$date."
		</body>
		</html>";
	$subject="Room allocation: Request forwarded";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: R A Portal <noreply@roomreservation.iiit.ac.in>' . "\r\n";
	$headers .= "Cc: {$cc}"."\r\n";
 	mail($mail_to,$subject,$message,$headers);
}

function RtoIWrapper($req)
{
        $startDate = $req['eventStartDate'];
        $endDate = $req['eventEndDate'];
        $arrayOfWeeks = $req['eventDays'];
        $arrayOfWeeks = CSVToArray($arrayOfWeeks);
        return weeklyRequestToInstance($startDate, $endDate, $arrayOfWeeks);
}
function doConflict($req1, $req2){
        $req1Dates=RtoIWrapper($req1);
        $req2Dates=RtoIWrapper($req2);
        foreach($req2Dates as $instanceDate){
                //Checking if dates clash
                if(in_array($instanceDate,$req1Dates)){
                //Checking if time clash
                        $ST=$req1['eventStartTime'];
                        $st=$req2['eventStartTime'];
                        $ET=$req1['eventEndTime'];
                        $et=$req2['eventEndTime'];
			if((($st<$ST && $et>$ST)||($st<$ET && $et>$ST)||($st<$ET && $et>$ET)||($st==$ST && $et==$ET)) ){
                                return 1;
                        }
                }
        }
        return 0;
}
function checkConflicts(){
        $tuples = array();
        dbconnect();
        $query = "SELECT DISTINCT room from Requests where appStatus = \"Pending\"";
        $roomQuery = execute($query);
        while($roomList = mysql_fetch_row($roomQuery)){
                $roomRecords = array();
                $query = "SELECT * FROM Requests WHERE room = \"{$roomList[0]}\" AND appStatus = \"Pending\" ORDER BY eventStartDate ASC\n";
                $events = execute($query);
                while($array = mysql_fetch_assoc($events)){
                        $roomRecords[] = $array;
                }
                for($i = 0; $i < sizeof($roomRecords); $i++){
                        for($j = $i + 1; $j < sizeof($roomRecords); $j++){
                                if(doConflict($roomRecords[$i], $roomRecords[$j])){
                                        $temp = array($roomRecords[$i]['reqNo'], $roomRecords[$j]['reqNo']);
                                        $tuples[] = $temp;
                                }
                        }
                }
        }
        return $tuples;
}
function checkNonConflicts(){
	$records = array();
	$isClash=false;
        dbconnect();
        $query = "SELECT DISTINCT room from Requests where appStatus = \"Pending\"";
        $roomQuery = execute($query);
        while($roomList = mysql_fetch_row($roomQuery)){
                $roomRecords = array();
                $query = "SELECT * FROM Requests WHERE room = \"{$roomList[0]}\" AND appStatus = \"Pending\" ORDER BY eventStartDate ASC\n";
                $events = execute($query);
                while($array = mysql_fetch_assoc($events)){
                        $roomRecords[] = $array;
                }
		for($i = 0; $i < sizeof($roomRecords); $i++){
			for($j = 0; $j < sizeof($roomRecords); $j++){
				if($i!=$j){
					if(doConflict($roomRecords[$i], $roomRecords[$j])){
						$isClash=true;
						break;
					}
					else{
						$isClash=false;
					}
				}
			}
			if(!$isClash){
				$records[]=$roomRecords[$i]['reqNo'];
			}
			$isClash=false;
                }
        }
        return ($records);
}
function generateBuildingList1($myid,$a){
        $query="SELECT buildId,buildingName FROM Building;";
        dbconnect();
        $result=execute($query);
        $st = "<select name='". $myid . "' id='". $myid."' >";
        $st .= "<option value='' id='fg'>Please select</option>";
        while($row = mysql_fetch_array($result)){
                if($a==$row['buildId'])
                {$st .= "<option selected='selected' value='" . $row['buildingName'] . "' id='" .$row['buildId']."'>".$row['buildingName']."</option>";}
                else
                {$st .= "<option value='" . $row['buildingName'] . "' id='" .$row['buildId']."'>".$row['buildingName']."</option>";}
        }
        $st .= "</select>";
        return $st;
}

function clashMux($clashTuples) {
        $clashGroups=array();
        $clashed=array();
        foreach($clashTuples as $tuple1){
                $currGroup=array();
                if(!in_array($tuple1[0],$clashed)){
                        $clashed[]=$tuple1[0];
                        $currGroup[]=$tuple1[0];
                }   
                if(!in_array($tuple1[1],$clashed)){
                        $clashed[]=$tuple1[1];
                        $currGroup[]=$tuple1[1];
                }   
                foreach($clashTuples as $tuple2){
                        if(in_array($tuple2[0],$currGroup)){
                                if(!in_array($tuple2[1],$clashed)){
                                        $clashed[]=$tuple2[1]; 
                                        $currGroup=array_merge($currGroup,array($tuple2[1]));
                                }   
                        }   
                        else if(in_array($tuple2[1],$currGroup)){
                                if(!in_array($tuple2[0],$clashed)){
                                        $clashed[]=$tuple2[0];
                                        $currGroup=array_merge($currGroup,array($tuple2[0]));
                                }   
                        }   
                }   
                if(sizeof($currGroup))
                        $clashGroups[]=$currGroup;
        }   
	
	foreach($clashGroups as $group){
		$currGroup=arrayToCSV($group);
		$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM Requests WHERE reqNo IN (".$currGroup.");";
		$events = execute($query);
		?>
		<tr><td style="visibility:hidden"></td></tr>
		<?php
		while($roomRecords = mysql_fetch_assoc($events)){
			?>
			<tr>
			<?php
			foreach($roomRecords as $record){
			?>
				<td> <?php echo $record ?> </td> 
			<?php
			}
			?>
			<td><a href='req_detail.php?id=<?php echo $roomRecords['reqNo']; ?>'>Details</a></td>
			</tr>
			<?php
		}  
	}
	//print_r($roomRecords);
	return $clashGroups;
}
//To get requesting clashes, just do clashMux(checkConflicts()); --> will return array of clashing groups which consists of reqNo;
function getRequestByID($ID){
	dbconnect();
	$query = "select * from Requests where reqNo = {$ID}";
	$result = execute($query);
	$reqArray = mysql_fetch_assoc($result);
	return $reqArray;
}
function getRequestByHash($hash){
	dbconnect();
	$query = "select * from Requests where hash = '".$hash."';";
	$result = execute($query);
	$reqArray = mysql_fetch_assoc($result);
	return $reqArray;
}
function getEmails($ID)
{
	$query = "select email from User where level = {$ID}";
	dbconnect();
	$result = execute($query);
	$emails = array();
	while($arr = mysql_fetch_row($result)){
		$emails[] = $arr[0];
	}
	return $emails;
}
function gethash($id){
	$res2=getRequestByID($id);
	return $res2['hash'];
}
function getId($hash){
	$res2=getRequestByHash($hash);
	return $res2['reqNo'];
}
function isAdmin($id){
	if($id == 0 || $id == 1){};
}
function collision($roomId , $date_s , $date_e , $time_s, $time_e , $Repeat_Type ){  // all parameters are in TIME type. not in string

/*        $query = "SELECT * FROM Requests WHERE appStatus='Pending' and
                Room = '".$roomId."' 
<<<<<<< HEAD
                AND NOT (eventStartDate >'" . date('Y-m-d',$date_e) . "' OR eventEndDate < '" . date('Y-m-d',$date_s) . "') AND NOT (eventStartTime >='" . date('H:i:s',$time_e). "' OR eventEndTime <='" . date('H:i:s',$time_s). "') ORDER BY eventStartTime;";*/
 $query = "SELECT * FROM Requests WHERE appStatus='Pending' and
                Room = '".$roomId."' 
		AND NOT (eventStartDate >'" . date('Y-m-d',$date_e) . "' OR eventEndDate < '" . date('Y-m-d',$date_s) . "') AND NOT (eventStartTime >='" . date('H:i:s',$time_e). "' OR eventEndTime <='" . date('H:i:s',$time_s). "') union all SELECT * FROM Instances Where Room = '".$roomId."' AND NOT (eventStartDate >'" . date('Y-m-d',$date_e) . "' OR eventEndDate < '" . date('Y-m-d',$date_s) . "') AND NOT (eventStartTime >='" . date('H:i:s',$time_e). "' OR eventEndTime <='" . date('H:i:s',$time_s). "') ORDER BY eventStartTime;";

//      echo "</br>$query</br>";
//      echo "echoing from essential.php int the collision funtion </br>";
        $result = execute($query);
        $result1 = array();
        $counter = 0;
        while( $row = mysql_fetch_assoc($result) ){
        //      echo "$row" . "$counter" . $row['Repeat_Type'] . "$Repeat_Type" . "<br/>";
                $counter++;
                if( $row['reqType'] == 'Daily' &&  $Repeat_Type=='Daily'){  // collision will alwaz happen ....
                        //echo "</br >inside of if condition </br>";
                        $result1[] =  $row;
                }
                else if ($row['reqType']=='Daily' && $Repeat_Type=='Weekly' ){
                        $row_incrdate = $date_s;
                        While(!($row_incrdate <= strtotime($row['eventEndDate']) && $row_incrdate >= strtotime($row['eventStartDate'])) && $row_incrdate <= $date_e)
                        {
                                //echo date("Y-m-d",$row_incrdate);
                                $row_incrdate = strtotime("+7 day",$row_incrdate);
                                //echo date("Y-m-d",$row_incrdate);

                        }
                        if(!($row_incrdate > $date_e)){
                                $result1[] = $row;
                        }
                }
		else if ($row['reqType']=='Weekly' && $Repeat_Type=='Daily' ){
                        $row_incrdate = strtotime($row['eventStartDate']);
                        While(!($row_incrdate <= $date_e && $row_incrdate >= $date_s) && $row_incrdate <= strtotime($row['eventEndDate']))
                        {
                                //echo date("Y-m-d",$row_incrdate);
                                $row_incrdate = strtotime("+7 day",$row_incrdate);
                                //echo date("Y-m-d",$row_incrdate);

                        }
                        if(!($row_incrdate > strtotime($row['eventEndDate']))){
                                $result1[] = $row;
                        }

                }
                else if ($row['reqType']=='Weekly' && $Repeat_Type=='Weekly' ){
                        $row_incrdate = strtotime($row['Start_Date']);
                        $collide = 0;
                        while($row_incrdate <= strtotime($row['eventEndDate'])){
                                if($row_incrdate == $date_s){ // starting date collides with one of the days 
                                        $collide = 1;
                                        break;
                                }
                                $row_incrdate = strtotime("+7 day" , $row_incrdate );
                        }
                        if(!$collide){
                                $row_incrdate = $date_s ;
                                while( $row_incrdate <= $date_e ){
                                        if( $row_incrdate == strtotime($row['eventStartTime'])){ //starting time collides with one of the days.
                                                $collide = 1;
                                                break;
                                        }
                                        $row_incrdate = strtotime("+7 day" , $row_incrdate );
                                }
                        }

			if($collide){ // appending to the result array.
                                $result1[] = $row;
                        }
                }
	      else if($row['reqType']=='One Time')
		{
			$result1[] = $row;
		}
		else if($row['reqType']=='Multiple')
		{
$week['Sunday'] = 1;
$week['Monday'] = 2;
$week['Tuesday'] = 3;
$week['Wednesday'] = 4;
$week['Thursday'] = 5;
$week['Friday'] = 6;
$week['Saturday'] = 7;
//echo "aaa".$week['Saturday'];
	//			echo "a".$week['".$w."'];
//			echo "multiple";
			$w = date('l',$date_s);
//			echo $w;
			$r = CSVToArray($row['eventDays']);
			for($i=0;$i<count($r);$i++)
			{
				if($week[$w]==$r[$i])
				{
//					echo "yahoo";
					$result1[] = $row;
					break;
				}
			}
			
		}
		else
{
$result1[] = $row;
}
        }
/* $query2 = "SELECT * FROM Instances WHERE 

                Room = '".$roomId."' 
		AND NOT (eventStartDate >'" . date('Y-m-d',$date_e) . "' OR eventEndDate < '" . date('Y-m-d',$date_s) . "') AND NOT (eventStartTime >='" . date('H:i:s',$time_e). "' OR eventEndTime <='" . date('H:i:s',$time_s). "') ORDER BY eventStartTime;";

$r = execute($query2);
while($t = mysql_fetch_array($r))
{
$result1[]=$t;
}
<<<<<<< HEAD
*/
return $result1;


}
function getRequests($id,$query){
	?>
	<tbody id=<?php echo "'{$id}'"; ?>>
	<?php
	if(isset($_GET['st']))
	    $mstart=$_GET['st'];
	else
	    $mstart=0;
	$lim=10;
	$table="Requests";
	dbconnect();          //connecting db
	$result=paginate("table.php",$query,$mstart,$lim,$id);             //calling paging
	$num=mysql_numrows($result);
	?>
	<?php		
		while ($row=mysql_fetch_assoc($result)){                 //fetching rows from result query
	        ?>
			<tr> 
	       	<?php
			$i=0;
		$pri=0;
                foreach($row as $col){        //for columns printing purposes
                	?>
			<td>
			<?php
			
			
			if($i==0){
			echo "<a href='req_detail.php?id=$col'>$col</a>";
			$pri=$col;
			}

			else{
				echo $col; echo " ";
			}
	                ?></td>
        	        <?php
                	$i++;
			}
		
			?>
				<?php /*<td><?php echo "<a href='req_detail.php?id=$pri'>Details</a>" ?></td> */?>
				<td><button type="submit" onClick="javascript:window.location.href='req_detail.php?id=<?php echo "$pri" ?>'"> Details </button></td>
				
					<?php
			
			if($id=='Accepted'){
			?>
				<td><button type='submit' class="cancelBtn" value=<?php echo $row['reqNo']; ?> >Cancel</button></td>
			<?php
			}
	?>
		
	</tr>
	<?php
	}
	mysql_close();   
	?>
	</tbody>
	<?php
}

function getMyRequests($query){
	
	if(isset($_GET['st']))
	    $mstart=$_GET['st'];
	else
	    $mstart=0;
	$lim=10;
	$table="Requests";
	dbconnect();          //connecting db
	$result=paginate("table.php",$query,$mstart,$lim,$id);             //calling paging
	$num=mysql_numrows($result);
	?>
	<?php		
		while ($row=mysql_fetch_assoc($result)){                 //fetching rows from result query
	        ?>
			<tr> 
	       	<?php
			$i=0;
		$pri=0;
		$status="";
                foreach($row as $col){        //for columns printing purposes
                	?>
			<td>
			<?php
			
			
			if($i==0){
			echo "<a href='req_detail.php?id=$col'>$col</a>";
			$pri=$col;
			}

			else{
				if($i==7)
				{
					$status=$col;
				}
				echo $col; echo " ";
			}
	                ?></td>
        	        <?php
                	$i++;
			}
		
			?>
				<?php /*<td><?php echo "<a href='req_detail.php?id=$pri'>Details</a>" ?></td> */?>
		<td><button type="submit" onClick="javascript:window.location.href='req_detail.php?id=<?php echo "$pri" ?>'"> Details </button></td>
			<?php
			if($status=="Pending")
			{
				?>
		<td><button type="submit" onClick="javascript:window.location.href='myconfirmdel.php?SNO=<?php echo "$pri" ?>'">Delete </button></td>
					 
					
		<?php } 
		       if($status=="Accepted")echo "<td>N/A</td>";
		       if($status=="Rejected")echo "<td>N/A</td>";
				
				
				?>
		
	</tr>
	<?php
	}
	mysql_close();   
	?>
<?php
}


function getCC($reqID)
{
	dbconnect();
	$query = "select email from ccPerson where reqNo = {$reqID};";
	$result = execute($query);
	$CSVString="";
	while($row = mysql_fetch_array($result)){
		$CSVString .= $row[0];
		$CSVString .=", ";
	}
	return $CSVString;
}

function updateCourse2Instance($hash,$Code, $Name, $Room, $Day, $StartTime, $EndTime, $Type){
	$day2No=array(
                "Sun"=>1,
                "Mon"=>2,
                "Tue"=>3,
                "Wed"=>4,
                "Thu"=>5,
                "Fri"=>6,
                "Sat"=>7,
        );
        $eventStartDate="2012-08-01"; //has to be taken from Constants Table
        $eventEndDate="2012-11-28";
	dbconnect();
/*	$query="SELECT reqNo FROM Requests ORDER BY reqNO DESC limit 1";
	$result=mysql_fetch_row(execute($query));
	$reqNo=$result['reqNo'];
*/      $query="DELETE * FROM Instances WHERE hash = '".$hash."';";
        $result=execute($query);
	$query="SELECT * FROM CourseRooms WHERE hash = '".$hash."';";
        $result=execute($query);
        $i=0;
        $total=mysql_num_rows($result);
        while($roomRecords=mysql_fetch_assoc($result)){
		$instances=weeklyRequestToInstance($eventStartDate, $eventEndDate, CSVToArray($day2No[$roomRecords['Day']]));
		foreach($instances as $instance){
			$roomRecords['StartTime']=str_replace('.',':',$roomRecords['StartTime']).":00";
			$roomRecords['EndTime']=str_replace('.',':',$roomRecords['EndTime']).":00";
//			$reqNo++;
                        $query="INSERT INTO Instances(reqNo,hash,creator,creatorEmail,creatorPhone,concernedPName,concernedPEmail,concernedPPhone,appStatus,reqGId,reqDate,eventStartDate,eventEndDate,eventStartTime,eventEndTime,eventTitle,eventDesc,eventDays,concernedAdmin,room,reqType) VALUES(
				'00',
                                '".$hash=sha1(uniqid(mt_rand(), true))."',
                                'Admin',
                                'appaji@iiit.ac.in',
                                '',
                                'Admin',
                                'appaji@iiit.ac.in',
                                '',
                                'Accepted',     
                                '5',
                                '".$reqDate=date("Y-m-d H:i:s")."',
                                '".$instance."',
                                '".$instance."',
                                '".$roomRecords['StartTime']."',
                                '".$roomRecords['EndTime']."',
                                '".$roomRecords['Code']."',
                                '".$roomRecords['Name']."',
                                '".$day2No[$roomRecords['Day']]."',
                                'Admin',
                                '".$roomRecords['Room']."',
                                '".$roomRecords['Type']."'
                        );";
                        execute($query);
                }

        }
}





function courseToInstance(){
        $day2No=array(
                "Sun"=>1,
                "Mon"=>2,
                "Tue"=>3,
                "Wed"=>4,
                "Thu"=>5,
                "Fri"=>6,
                "Sat"=>7,
        );
        $eventStartDate="2012-08-01";
        $eventEndDate="2012-11-28";
	dbconnect();
/*	$query="SELECT reqNo FROM Requests ORDER BY reqNO DESC limit 1";
	$result=mysql_fetch_row(execute($query));
	$reqNo=$result['reqNo'];
*/      $query="SELECT * FROM CourseRooms;";
        $result=execute($query);
        $i=0;
        $total=mysql_num_rows($result);
        while($roomRecords=mysql_fetch_assoc($result)){
		$instances=weeklyRequestToInstance($eventStartDate, $eventEndDate, CSVToArray($day2No[$roomRecords['Day']]));
		foreach($instances as $instance){
			$roomRecords['StartTime']=str_replace('.',':',$roomRecords['StartTime']).":00";
			$roomRecords['EndTime']=str_replace('.',':',$roomRecords['EndTime']).":00";
//			$reqNo++;
                        $query="INSERT INTO Instances(reqNo,hash,creator,creatorEmail,creatorPhone,concernedPName,concernedPEmail,concernedPPhone,appStatus,reqGId,reqDate,eventStartDate,eventEndDate,eventStartTime,eventEndTime,eventTitle,eventDesc,eventDays,concernedAdmin,room,reqType) VALUES(
				'00',
                                '".$hash=sha1(uniqid(mt_rand(), true))."',
                                'Admin',
                                'appaji@iiit.ac.in',
                                '',
                                'Admin',
                                'appaji@iiit.ac.in',
                                '',
                                'Accepted',     
                                '5',
                                '".$reqDate=date("Y-m-d H:i:s")."',
                                '".$instance."',
                                '".$instance."',
                                '".$roomRecords['StartTime']."',
                                '".$roomRecords['EndTime']."',
                                '".$roomRecords['Code']."',
                                '".$roomRecords['Name']."',
                                '".$day2No[$roomRecords['Day']]."',
                                'Admin',
                                '".$roomRecords['Room']."',
                                '".$roomRecords['Type']."'
                        );";
                        execute($query);
                }
                        $i++;
                $percent = intval($i/$total * 100)."%";
                // Javascript for updating the progress bar and information
                echo '<script language="javascript">
                        document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
                document.getElementById("information").innerHTML="'.$i.'/'.$total.' row(s) processed.";
                    </script>';

            // This is for the buffer achieve the minimum size in order to flush data
                    echo str_repeat(' ',1024*64);

                    // Send output to browser immediately
                    flush();

            // Sleep one second so we can see the delay

        }
}


function getCurGroup(){
	return getGroup(phpCAS::getUser());
}


function explosion($string)
{
        $words=explode(",",$string);
        $word=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        $str="";
        for($i=0;$i<count($words);$i++)
        {    
                $str=$str.$word[$words[$i]-1];
                if($i!=count($words)-1)
                {    
                        $str=$str." , ";
                }    
        }    
        return $str;
}
function getConcernedAdmin($reqID){
	dbconnect();
	$query = "select concernedAdmin from Requests where reqNo = {$reqID}";
	$result = execute($query);
	$row = mysql_fetch_row($result);
	return $row[0];
}
function getRequestStatus($reqID){
	dbconnect();
	$query = "select appStatus from Requests where reqNo = {$reqID}";
	$result = execute($query);
	$row = mysql_fetch_row($result);
	return $row[0];
}
function getIDFromHash($hash){
	dbconnect();
	$query = "select reqNo from Requests where hash='".$hash."';";
	$result=execute($query);
	$row=mysql_fetch_row($result);
	return $row[0];
}
?>

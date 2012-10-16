<?php

//All user $groupss, $groups IDs correspond to indices of the following array
$groups = array ('Student', 'Parliament', 'Academic Office', 'SLC Chair', 'Dean Academics', 'Admin Manager', 'TA', 'faculty');
date_default_timezone_set("Asia/Calcutta") or die("Time Zone setting issues\n");
//$userTimeZone = date_default_timezone_get();
//echo $userTimeZone."\n";

function dbconnect(){
        GLOBAL $con;
        $con = mysql_connect('','','');
        if(!$con){
                die("Error in connection!");
        }   
        else {
                $chooseDB = "USE roomReser";
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

function paginate($file,$myquery,$start,$lim)
{
	
	$query1 = $myquery.';';
	 GLOBAL $con;
	 if($con==0)       //for connecting db
	dbconnect();
	$result=execute($myquery);      //take query result
	$num = mysql_numrows($result);
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
			echo"<a href='".$file."?st=".$back."'>PREV</a>"; //pre page print
		}

		for($i=0;$i<$num;$i=$i+$lim){
			if($i != $start){

			echo" <a href='".$file."?st=".$i."'>"; //for next page print
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
			echo" <a href='".$file."?st=".$next."'> NEXT</a>";  //next button referencing
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

//To make a drop down list easily
function generateTimeSlot($myid,$default=false){
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
	$query="SELECT * FROM Instances WHERE room='".$room."' AND eventStartDate BETWEEN '".$startDate."' AND '".$endDate."' AND ((eventStartTime <= '".$startDate."' AND eventEndTime >= '".$endDate."') || eventStartTime <= '".$endTime."' AND eventEndTime >= '".$endTime."' || eventStartTime >= '".$startTime."' AND eventEndTime <= '".$endTime."');";
	$result=execute($query);
	$num=mysql_num_rows($result);
	if($num==0){
		return NULL;
	}
	else{
		return $result;
	}
}

function accept($name,$mail_to,$room_no,$request_id)
{
 	$mail_to=$mail_to;
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
	$headers .= 'From: Noreply <noreply@.roomReservation.iiit.ac.in>' . "\r\n";
	mail($mail_to,$subject,$message,$headers);
}

function reject($name,$mail_to,$room_no,$request_id)
{
 	$mail_to=$mail_to;
 	$date = date('Y-m-d H:i:s');
	$body="Dear ".$name.",\nYour request with Request id ".$request_id." for Room no.".$room_no." has been rejected by Admins due to non availability.\nThis is a System Generated Mail. Please do not reply.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
	$message = " 
		<html>
		<body>
		<p>".$body."</p>
		</body>
		</html>";
	$subject="Room allocation: Request Rejected";
 	mail($mail_to,$subject,$message);
}

function forward($name,$mail_to,$room_no,$request_id,$original_mail_id)
{
 	$mail_to=$mail_to;
	$hash=gethash($request_id);
 	$date = date('Y-m-d H:i:s');
	$body="Sir,\n".$name." with mail id ".$original_mail_id." has sent the Request for Room no. ".$room_no.".The Request id is. ".$request_id." . Kindly check and if possible give your consent\n\n.";
	$message = " 
		<html>
		<body>
		<p>".$body."</p>
		<p> Click <a href=\"http://localhost/req_detail_hash.php?hash=".$hash."\"> here </a>to verify the request! </p>
		<p>\n\n\n\nCheers,\nAdmins\n\n\n\nMail generated at: ".$date."</p>
		</body>
		</html>";
	$subject="Room allocation: Request forwarded";
 	mail($mail_to,$subject,$message);
}


/*if($_POST['check']==1)
{
accept("Nehal","nehal.wani@students.iiit.ac.in","303","1");
}
if($_POST['check']==2)
{
reject("Nehal","nehal.wani@students.iiit.ac.in","303","1");
}
if($_POST['check']==3)
{
forward("shubham","nehal.wani@students.iiit.ac.in","303","1","shubham.sangal@students.iiit.ac.in");
}
 */
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
                        if(($st<$ST && $et>$ST)||($st<$ET && $et>$ST)||($st<$ET && $et>$ET)){
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
function gethash($id)
{
$res2=getRequestByID($id);
return $res2['hash'];
}
?>


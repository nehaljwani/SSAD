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


/*Returns an array containing the forwarding options available to each user. 
 *Not to be used directly, the printNextGroupOptions does the printing.
 *Javascript to be used to ensure that if time > 5pm, forwarding options are 
 *limited for TAs.
 */

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
	echo $curDate."\n";
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
    echo "\n\n**".$dateForDay."\n";
    $events=array_merge($events,addWeeklyRequest($dateForDay, $endDate));
  }
   return $events;
}
//weeklyRequestToInstance(NULL, "2012-01-02", "2012-02-03", array("1", "2", "3", "5", "6", "7"));
?>

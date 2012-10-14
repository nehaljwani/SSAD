<?php

//All user $groupss, $groups IDs correspond to indices of the following array
$groups = array ('Student', 'Parliament', 'Academic Office', 'SLC Chair', 'Dean Academics', 'Admin Manager', 'TA', 'faculty');

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


?>

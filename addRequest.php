<?php
require_once("recaptchaproxy.php");
    $privatekey = "6LfA-NgSAAAAAPN9GjdtA6RG4MJdeS_We5sHpkAz";
      $resp = recaptcha_check_answer ($privatekey,
		                   $_SERVER["REMOTE_ADDR"],
				   $_POST["recaptcha_challenge_field"],
				   $_POST["recaptcha_response_field"]);

  	if (!$resp->is_valid) {
	      // What happens when the CAPTCHA was entered incorrectly
	      die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
			               "(reCAPTCHA said: " . $resp->error . ")");
	        } else {
?>
<?php
	foreach ($_POST as $k => $v) {
		echo "$k => $v"."<br />";
		if(is_array($v)){
			foreach ($v as $r => $u) {
				echo "$r => $u"."<br />";
			}
		}
}
?>
<?php
include("essential.php"); // Importing pre-defined functions
dbconnect();
include_once("header.php");

$ccPersons = CSVToArray($_POST['cc']);

print_r($ccPersons);

echo "testtest";

$hash=sha1(uniqid(mt_rand(), true));
$eventEndDate=$_POST["eventEndDate"];
$creator=$_POST["creator"];
$creatorEmail=phpCAS::getUser();
if(empty($creatorEmail))
{
	                header("Location:requestForm.php?msg='Email  cannot be empty'");
			                die();
}
if (!(filter_var($creatorEmail, FILTER_VALIDATE_EMAIL))) {
	                header("Location:requestForm.php?msg='Email is not valid'");
			                die();
}

$creatorPhone=$_POST["creatorPhone"];
$concernedPName=$_POST["concernedPName"];
$concernedPEmail=$_POST["concernedPEmail"];
$appStatus="Pending";//If admin, then $appStatus="Approved"
$concernedPPhone=$_POST["concernedPPhone"];
$reqGId=0;//To be taken on the basis of user's groupId
$reqDate=date("Y-m-d H:i:s");
$eventStartDate=$_POST["eventStartDate"];
$eventStartTime=$_POST["eventStartTime"];
$eventEndTime=$_POST["eventEndTime"];
$eventTitle=$_POST["eventTitle"];
$eventDesc=$_POST["eventDesc"];
$concernedAdmin=$_POST["concernedAdmin"];
$room=$_POST["room"];
$reqType=$_POST["reqType"];
$eventVenue=$_POST['buildingName'];
if( (!is_numeric($creatorPhone)) or  strlen($creatorPhone) <10) {
	header("Location:requestForm.php?msg='Phone number must be 10 numbers digits'");
die();
}
$query = "select * from eventTitle where title='$eventTitle' ;";
$rv=execute($query);
if(mysql_num_rows($rv)==0)
{
	header("Location:requestForm.php?msg='event Title $eventTitle  is not exists'");
die();
}
$query = "select * from Building where buildingName='$eventVenue' ;";
$rv=execute($query);
if(mysql_num_rows($rv)==0)
{
	header("Location:requestForm.php?msg='event Venue $eventVenue  is not exists'");
die();
}
$query = "select * from Room where roomName='$room' ;";
$rv=execute($query);
if(mysql_num_rows($rv)==0)
{
	header("Location:requestForm.php?msg='event Room $room  is not exists'");
die();
}
if($reqType!= 'One Time' and $reqType!='Multiple')
{
	header("Location:requestForm.php?msg='reqType $reqType  is not exists'");
die();
}
$today=date("Y-m-d");
$todayarray = explode("-", $today);
$startdate = explode("-", $eventStartDate);
$limstart=$todayarray[2]+2;
//Fetch Limit from Limit Table
if($todayarray[0]>=$startdate[0] and $todayarray[1]>=$startdate[1] and $startdate[2]<$limstart)
{
	header("Location:requestForm.php?msg='Invalid Date'");
die();
}
if($eventStartDate > $eventEndDate)
{
	header("Location:requestForm.php?msg='End Date must be greater than Start Date'");
die();
}
if($eventStartTime > $eventEndTime)
{
	header("Location:requestForm.php?msg='End Time must be greater than Start Time'");
die();
}
if(empty($eventDesc))
{
	header("Location:requestForm.php?msg='Activity/Reason cannot be Empty'");
die();
}
if(empty($creator))
{
	header("Location:requestForm.php?msg='Creator cannot be Empty'");
die();
}
if($_POST['concernedPEmail']==''){
	$concernedPName=$_POST["creator"];
	$concernedPEmail=$_POST["creatorEmail"];
	$concernedPPhone=$_POST["creatorPhone"];
}
$eventDays="";
if(isset($_POST["day"])){
	foreach($_POST["day"] as $day){
		$eventDays=$eventDays.$day.",";
	}
}
else{
	$eventDays=(string)((int)dateToDay($eventStartDate)+1);
}


$query="INSERT INTO Requests(reqNo, hash, creator, creatorEmail, creatorPhone, concernedPName, concernedPEmail, concernedPPhone, appStatus, reqGId, reqDate, eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventTitle, eventDesc, eventDays,concernedAdmin, room, reqType) VALUES(
	'',
	'".$hash."',
	'".$creator."',
	'".$creatorEmail."',
	'".$creatorPhone."',
	'".$concernedPName."',
	'".$concernedPEmail."',
	'".$concernedPPhone."',
	'".$appStatus."',
	'".$reqGId."',
	'".$reqDate."',
	'".$eventStartDate."',
	'".$eventEndDate."',
	'".$eventStartTime."',
	'".$eventEndTime."',
	'".$eventTitle."',
	'".$eventDesc."',
	'".$eventDays."',
	'".$concernedAdmin."',
	'".$room."',
	'".$reqType."'
);";

$result=instanceClash($eventStartDate,$eventEndDate,$eventStartTime,$eventEndTime,$room);
if($result){
	echo "Sorry! your request clashes with the following events:";
	$table=array();
	while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
		$table[]=$row;
	}
	print_r($table);
}
else{
	//Adding 2 Requests Table
	if(execute($query)){
		echo "Successfull";
		$reqNo=getId($hash);
		echo $reqNo;
		$emails = getEmails($concernedAdmin);
		print_r($emails);
		foreach($emails as $email){
			        forward($concernedPName, $email, $room, $reqNo, $concernedPEmail);
		} 
	}	
	else{
		die("Your code is crappy!");
	}
}

echo "lala";
$reqID = getId($hash);
$guy = $creatorEmail;

$query = "INSERT INTO ccPerson(reqNo, email) values(\"{$reqID}\", \"{$guy}\");";

execute($query);

foreach($ccPersons as $guy){
	$query = "INSERT INTO ccPerson(reqNo, email) values(\"{$reqID}\", \"{$guy}\");";
	execute($query) or die("ccPersonAddingError");
}

header("Location: myRequests.php");
}	
?>

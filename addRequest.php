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

$hash=sha1(uniqid(mt_rand(), true));
$eventEndDate=$_POST["eventEndDate"];
$creator=$_POST["creator"];
$creatorEmail=$_POST["creatorEmail"];
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

header("Location: table.php");

?>

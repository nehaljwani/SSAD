<?php
include("essential.php");
dbconnect();
$z['Thursday'] = 5;
$z['Wednesday'] = 4;
$z['Sunday'] = 1;
$z['Monday'] = 2;
$z['Tuesday'] = 3;
$z['Friday'] = 6;
$z['Saturday'] = 7;
$r = CSVToArray('1,2,3,4,');
//print_r($r);
//echo $r[1];
//echo count($r);
$q = "select eventDays from Requests where eventDays is not NULL";
$r = mysql_query($q);
while($u = mysql_fetch_array($r))
{
//echo $u[0];
//echo "<br/>";
$t = CSVToArray($u[0]);
$result[] = $t;
}
//echo count($result);
//echo $result[4];
$r = "select * from Requests where reqType = 'Multiple' and eventDays is not NULL";
$t = mysql_query($r);
while($u = mysql_fetch_array($t))
{
//echo "<br/>";
//echo $u['eventDays'];
//echo "<br/>";
$o = $u['eventStartDate'];
//echo $o;
//echo "<br/>";
//echo $r;
}
$time = time();
//echo "time".$time;
$query = "SELECT * FROM Requests 
                where NOT (eventStartDate >'" . date('2012-10-15') . "' OR eventEndDate < '" . date('2012-10-15') . "') AND NOT (eventStartTime >='" . date('H:i:s',strtotime('18:00:00')). "' OR eventStartTime <='" . date('H:i:s',$time). "') ORDER BY eventStartdate,eventStartTime;";
//$query2 = "SELECT * FROM Requests where NOT (eventStartDate >'" . date('Y-m-d','2012-11-10') . "' OR eventEndDate < '" . date('Y-m-d','2012-11-10') . "')  ORDER BY eventStartdate,eventStartTime;";
//$query = "select * from Requests where NOT(eventStartDate > '".date('2012-10-15')."' or eventEndDate < '".date('2012-10-15')."')";
$r = mysql_query($query);
while($u = mysql_fetch_array($r))
{
//echo "Adasdasd".$u['eventDays']."<br/>";
$o = CSVToArray($u['eventDays']);
//$t = $u['eventStartDate'];
$weekday = date('l', strtotime('2012-10-15'));
//echo "week".$weekday."<br/>";
for($i=0;$i<count($o);$i++)
{
//echo "aaaaaa".$o[$i]."<br/>";
if($o[$i] == $z[$weekday])
{
echo "title of the event".$u['eventTitle']."<br/>";

echo "gvvvvvvvvvvvvvvvvvvvvv"."<br/>";
echo $u['eventStartDate'];
echo "<br/>";
echo $u['eventEndDate'];
echo "<br/>";
echo $u['eventDays'];
echo "<br/>";
echo $u['creator']."<br/>";
}
}
//echo "asdasd".$u[2];
//echo "<br/>";

}

?>

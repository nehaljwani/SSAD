<?php 
session_start();
include("header.php"); 
//print_r($_POST);
?>
<div class="post">
<h2 class="title"></h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">CODE</th>
<th scope="col">NAME</th>
<th scope="col">DAY</th>
<th scope="col">START-TIME</th>
<th scope="col">END-TIME</th>
<th scope="col">ROOM</th>
<th scope="col">TYPE</th>
</tr>
</thead>
<?php

include('essential.php');
dbconnect();
mysql_query("DELETE FROM CourseRooms");
$s="CREATE VIEW Tablet AS select DISTINCT Tablem.Code,Tablem.Name,Type,Day,StartTime,EndTime,PrevRoom from Tablem,Tableme where Tablem.Code=Tableme.Code";
mysql_query($s,$con);
$R60=array("H101","H102","H201","H202","H301","H302","B4-304","B4-301","B6-309","C1-302");
$R100=array("SH1","SH2","CR1","CR2","H103","H104","H203","H204","H303","H304","N104");
//	 hash varchar(100) to be added as an extra field
/*$sql="CREATE TABLE CourseRooms
	(
	 Code varchar(10),
	 Name varchar(100),
	 Room varchar(10),
	 Day varchar(10),
	 StartTime varchar(10),
	 EndTime varchar(10),
	 Type varchar(10),
	 PrevRoom varchar(10)
 )";
mysql_query($sql,$con); */
$sql=mysql_query("select * from Tablet where Type='UG1' and PrevRoom like 'SH1' order by Code");
$ug1ar=$_POST["ug1seca"];
while($row=mysql_fetch_array($sql))
{
	$z1=$row['Code'];
	$z2=$row['Name'];
	$z3=$ug1ar;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7="UG1";
	$z8=$row['PrevRoom'];
//	$hash=sha1(uniqid(mt_rand(), true));
//      function call	
//	mysql_query("insert into CourseRooms values ('$hash','$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8')");
	mysql_query("insert into CourseRooms values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8')");
}
$sql=mysql_query("select * from Tablet where Type='UG1' and PrevRoom like 'CR2' order by Code");
$ug1br=$_POST["ug1secb"];
//echo "hi";
//echo $ug1br;
//echo "he";
while($row=mysql_fetch_array($sql))
{
	$z1=$row['Code'];
	$z2=$row['Name'];
	$z3=$ug1br;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7="UG1";
	$z8=$row['PrevRoom'];
	mysql_query("insert into CourseRooms values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8')");
	// func. call
}
$sql=mysql_query("select * from Tablet where Type='UG2' and PrevRoom like 'SH2' order by Code");
$ug2cr=$_POST["ug2cse"];
while($row=mysql_fetch_array($sql))
{
	$z1=$row['Code'];
	$z2=$row['Name'];
	$z3=$ug2cr;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7="UG2";
	$z8=$row['PrevRoom'];
	mysql_query("insert into CourseRooms values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8')");
	// func. call
}
$sql=mysql_query("select * from Tablet where Type='UG2' and PrevRoom like '101' order by Code");
$ug2er=$_POST["ug2ece"];
while($row=mysql_fetch_array($sql))
{
	$z1=$row['Code'];
	$z2=$row['Name'];
	$z3=$ug2er;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7="UG2";
	$z8=$row['PrevRoom'];
	mysql_query("insert into CourseRooms values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8')");
	// func. call
}
$sql=mysql_query("select * from Tablet where Type='PG1' order by Code");
$pg1r=$_POST["pg1"];
while($row=mysql_fetch_array($sql))
{
	$z1=$row['Code'];
	$z2=$row['Name'];
	$z3=$pg1r;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7="PG1";
	$z8=$row['PrevRoom'];
	mysql_query("insert into CourseRooms values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8')");
	// func. call
}
$sql="CREATE VIEW Tablet1 AS select * from Tablet where Type='BC' OR Type='Elective' AND Name NOT LIKE '%Lab%' order by Type,Code,StartTime";
mysql_query($sql,$con);
$sql=mysql_query("select * from Tablet1");
$count=0;
while($row[$count] = mysql_fetch_array($sql))
{
	$count++;
}
$j=0;
$k=0;
$n=0;
$bang=0;
$save=0;
$roomnum=0;
for($i=1;$i<$count;$i++)
{
	if($row[$i]['Code']!==$row[$i-1]['Code'] or $i===$count-1)
	{
		$zz1=$row[$i-1]['Code'];
		$zz2=$row[$i-1]['Name'];
		if($bang===0)
		{
			$zz3=$R100[$k];
		}
		else
		{
			$zz3=$R60[$n];
		}
		if($save>=25)
		{
			$zz3="***";
			$codearr[$roomnum]=$row[$i-1]['Code'];
			$namearr[$roomnum]=$row[$i-1]['Name'];
			$roomnum++;
		}
		for($l=$j;$l<$i;$l++)
		{
			$zz4=$row[$l]['Day'];
			$zz5=$row[$l]['StartTime'];
			$zz6=$row[$l]['EndTime'];
			$zz7=$row[$l]['Type'];
			$zz8=$row[$l]['PrevRoom'];
			mysql_query("insert into CourseRooms values ('$zz1','$zz2','$zz3','$zz4','$zz5','$zz6','$zz7','$zz8')");
			// func. call
			//			echo $zz3." ".$zz4." ".$zz5." ".$zz6 ."\n";
		}
		$save=0;
		$j=$i;
	}
	$flag=0;
	while($flag===0)
	{
		$sql1=mysql_query("select * from CourseRooms");
		$count1=0;
		while($row2 = mysql_fetch_array($sql1))
		{
			$count1++;
		}
		$count2=0;
		$sql2=mysql_query("select * from CourseRooms");
		while($row1 = mysql_fetch_array($sql2))
		{
			if((($row1['StartTime']>=$row[$i]['StartTime'] and $row1['StartTime']<=$row[$i]['EndTime']) or ($row1['EndTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']<=$row[$i]['StartTime'] and $row1['EndTime']>=$row[$i]['EndTime'])) and $row1['Day']===$row[$i]['Day'] and $row1['Room']===$R100[$k])
			{
				break;
			}
			if($count2===$count1-1)
			{
				$flag=1;
			}
			$count2++;
		}
		$bang=0;
		if($flag===1)
		{
			break;
		}
		if($save>=11)
		{
			break;
		}
		$save++;
		$i=$j;
		$k=($k+1)%11;
	}
	while($flag===0)
	{
		$count2=0;
		$sql3=mysql_query("select * from CourseRooms");
		while($row1 = mysql_fetch_array($sql3))
		{
			if((($row1['StartTime']>=$row[$i]['StartTime'] and $row1['StartTime']<=$row[$i]['EndTime']) or ($row1['EndTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']<=$row[$i]['StartTime'] and $row1['EndTime']>=$row[$i]['EndTime'])) and $row1['Day']===$row[$i]['Day'] and $row1['Room']===$R60[$n])
			{
				break;
			}
			if($count2===$count1-1)
			{
				$flag=1;
			}
			$count2++;
		}
		$bang=1;
		if($flag===1)
		{
			break;
		}
		if($save>=25)
		{
			break;
		}
		$save++;
		$i=$j;
		$n=($n+1)%10;
	}
}
$result = mysql_query("SELECT * FROM CourseRooms order by Day,StartTime");
while($row = mysql_fetch_array($result))
{
	$co=$row['Code'];
	$na=$row['Name'];
	$da=$row['Day'];
	$st=$row['StartTime'];
	$et=$row['EndTime'];
	$ro=$row['Room'];
	$ty=$row['Type'];
//	echo $co." ".$na." ".$da." ".$st." ".$et." ".$ro." ".$ty."\n";
	if($ty==="UG1")
	{
		if($row['PrevRoom']==="CR2")
		{
			$ty=$ty."-"."SEC-B";
		}
		else
		{
			$ty=$ty."-"."SEC-A";
		}
	}
	else if($ty==="UG2")
	{
		if($row['PrevRoom']==="101")
		{
			$ty=$ty."-"."ECE";
		}
		else if($row['PrevRoom'==="SH2"])
		{
			$ty=$ty."-"."CSE";
		}
		else
		{
			$ty=$ty."-"."COM";
		}
	}
	echo"
		<tr>
		<td>$co</td>
		<td>$na</td>
		<td>$da</td>
		<td>$st</td>
		<td>$et</td>
		<td>$ro</td>
		<td>$ty</td>
		</tr>";
	ob_flush();
	flush();
}
mysql_close($con);
echo"
	</table>
	</div>
	</body>
	</html>
";
$_SESSION['coursenum']=$roomnum;
if($roomnum>0)
{
	$_SESSION['codes']=$codearr;
	$_SESSION['names']=$namearr;
}
//sleep(5);
include('footer.php');
echo '
<script type="text/javascript">
window.location="progress.php";
</script>
	';
?>


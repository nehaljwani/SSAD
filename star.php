<?php
include('header.php');
session_start();
include('essential.php');
dbconnect();
$gg=$_SESSION['patacode'];
$gh=$_SESSION['pataroom'];
mysql_query("delete from CourseRooms where Code='$gg'");
$R60=array("H101","H102","H201","H202","H301","H302","B4-304","B4-301","B6-309","C1-302");
$R100=array("SH1","SH2","CR1","CR2","H103","H104","H203","H204","H303","H304","N104");
$sql=mysql_query("select * from dassod");
$count=0;
while($row[$count] = mysql_fetch_array($sql))
{
	$count++;
}
$m=0;
$rooms=1;
$arr[0]="***";
$cour=0;
while($m<=10)
{
	$flag=0;
	$p=$R100[$m];
	for($i=0;$i<$count;$i++)
	{
		$sql2=mysql_query("select * from CourseRooms where Room='$p'");
		while($row1 = mysql_fetch_array($sql2))
		{
			if((($row1['StartTime']>=$row[$i]['StartTime'] and $row1['StartTime']<=$row[$i]['EndTime']) or ($row1['EndTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']<=$row[$i]['StartTime'] and $row1['EndTime']>=$row[$i]['EndTime'])) and $row1['Day']===$row[$i]['Day'])
			{
				$flag=1;
				if($p===$gh)
				{
					for($mm=0;$mm<$cour;$mm++)
					{
						if($ho[$mm]===$p)
						{
							break;
						}
						if($mm===$cour-1)
						{
							$ho[$cour]=$row1['Code'];
							$ho1[$cour]=$row1['Name'];
							$cour++;
							break;
						}
					}
					if($cour===0)
					{
						$ho[$cour]=$row1['Code'];
						$ho1[$cour]=$row1['Name'];
						$cour++;
					}
				}
			}
		}
		$i++;
	}
	if($flag===0 and $R100[$m]!=$gh)
	{
		$arr[$rooms]=$R100[$m];
		$rooms++;
	}
	$m++;
}
$m=0;
while($m<10)
{
	$flag=0;
	$p=$R60[$m];
	for($i=0;$i<$count;$i++)
	{
		$sql2=mysql_query("select * from CourseRooms where Room='$p'");
		while($row1 = mysql_fetch_array($sql2))
		{
			if((($row1['StartTime']>=$row[$i]['StartTime'] and $row1['StartTime']<=$row[$i]['EndTime']) or ($row1['EndTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']>=$row[$i]['StartTime'] and $row1['EndTime']<=$row[$i]['EndTime']) or ($row1['StartTime']<=$row[$i]['StartTime'] and $row1['EndTime']>=$row[$i]['EndTime'])) and $row1['Day']===$row[$i]['Day'])
			{
				$flag=1;
				if($p===$gh)
				{
					for($mm=0;$mm<$cour;$mm++)
					{
						if($ho[$mm]===$p)
						{
							break;
						}
						if($mm===$cour-1)
						{
							$ho[$cour]=$row1['Code'];
							$ho1[$cour]=$row1['Name'];
							$cour++;
							break;
						}
					}
					if($cour===0)
					{
						$ho[$cour]=$row1['Code'];
						$ho1[$cour]=$row1['Name'];
						$cour++;
					}
				}
			}
		}
		$i++;
	}
	if($flag===0 and $R60[$m]!=$gh)
	{
		$arr[$rooms]=$R60[$m];
		$rooms++;
	}
	$m++;
}
echo "
<html>
<head>
<script>
function myFunction2()
{
	alert('COURSE SUCCESSFULLY MODIFIED!');
}
</script>
</head>
<body>
<center>";
echo "<br><br><h2>Previous room for this course was : $gh<br><br>
Clashes for this Room are : <br>";
if($cour===0)
{
	echo "None";
}
else
{
	for($l=0;$l<$cour;$l++)
	{
		$ghj=$ho[$l];
		$rt=$ho1[$l];
		echo $ghj."-".$rt."<br>";
	}
}
echo "
</h2>
<form action=star1.php method='post'>
<input type='submit' onclick='myFunction2()' value='Allocate Same Room' name='1'>
</form>
";
echo "
<form action=star1.php method='post'>
<h2>Choose other room : </h2><select name='1'>";
for($i=1;$i<$rooms;$i++)
{
	$h=$arr[$i];
	echo "<option value='$h'>$h</option>";
}
echo "
</select>
<br>
<br>
";
if($gh!="ab")
{
	echo "
		<input type='submit' onclick='myFunction2()' value='Allocate Room'>";
}
echo "
</form></center>";
$gh=$_SESSION['pataroom'];
include('footer.php');
mysql_close($con);
?>

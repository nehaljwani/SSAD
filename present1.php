<?php
include('essential.php');
include("header.php"); 
dbconnect();
/*
$sql="CREATE TABLE clash
(
 Code varchar(10),
 Name varchar(100),
 Day varchar(5),
 StartTime varchar(10),
 EndTime varchar(10),
 Type varchar(10),
 Others varchar(10)
)";
mysql_query($sql,$con);*/
mysql_query("DELETE FROM clash");
$sql="CREATE VIEW UG1 AS select DISTINCT Tablem.Code,Tablem.Name,Type,Day,StartTime,EndTime,PrevRoom from Tablem,Tableme where Tablem.Code=Tableme.Code and Type like 'UG1'";
mysql_query($sql,$con);
$sql1=mysql_query("select * from UG1 where PrevRoom like 'CR2' or PrevRoom like 'SH1' order by PrevRoom,Day,StartTime");
$count1=0;
while($row1 = mysql_fetch_array($sql1))
{
	$code[$count1]=$row1['Code'];
	$day[$count1]=$row1['Day'];
	$st[$count1]=$row1['StartTime'];
	$et[$count1]=$row1['EndTime'];
	$pr[$count1]=$row1['PrevRoom'];
	$name[$count1]=$row1['Name'];
	$count1++;
}
$i=0;
$flag=0;
echo "<h1>CLASHES OCCURED FOR UG1 ARE:</h1>";
while($i<$count1)
{ 
	$j=$i+1;
	while($j<$count1)
	{
		if($day[$i]===$day[$j] and $pr[$i]===$pr[$j] and (($st[$i]<$st[$j] and $et[$i]>$st[$j]) or ($st[$i]<$et[$j] and $et[$i]>$et[$j]) or ($st[$i]>=$st[$j] and $et[$j]>=$et[$i])))
		{
			$flag=1;
			$z1=$code[$i];
			$z2=$name[$i];
			$z3=$day[$i];
			$z4=$st[$i];
			$z5=$et[$i];
			$z6=$pr[$i];
			if($z6==="CR2")
			{
				$x="SEC-B";
			}
			else
			{
				$x="SEC-A";
			}
			$aaa="insert into clash values ('$z1','$z2','$z3','$z4','$z5','UG1','$z6')";
			mysql_query($aaa,$con);
			//			echo $code[$i]." ".$name[$i]." ".$day[$i]." ".$st[$i]." ".$et[$i]." ".$x."\n";
			//			echo $code[$j]." ".$name[$j]." ".$day[$j]." ".$st[$j]." ".$et[$j]." ".$x."\n\n\n";
			echo "
				<div class='post'>
				<h2 class='title'></h2>
				<table id='box-table-a'>                        
				<thead>
				<tr>
				<th scope='col'>CODE</th>
				<th scope='col'>NAME</th>
				<th scope='col'>DAY</th>
				<th scope='col'>START-TIME</th>
				<th scope='col'>END-TIME</th>
				<th scope='col'>Section</th>
				</tr>
				</thead> 
				<tr>
				<td>$z1</td>
				<td>$z2</td>
				<td>$z3</td>
				<td>$z4</td>
				<td>$z5</td>
				<td>$x</td>
				</tr> ";
			ob_flush();
			flush();
			$z1=$code[$j];
			$z2=$name[$j];
			$z3=$day[$j];
			$z4=$st[$j];
			$z5=$et[$j];
			$aaa="insert into clash values ('$z1','$z2','$z3','$z4','$z5','UG1','$z6')";
			mysql_query($aaa,$con);
			echo"
				<tr>
				<td>$z1</td>
				<td>$z2</td>
				<td>$z3</td>
				<td>$z4</td>
				<td>$z5</td>
				<td>$x</td>
				</tr>
				</table>
				</br>
				</div>
				";
			ob_flush();
			flush();
		}
		$j++;
	}
	$i++;
}
if($flag===0)
{
	echo "<br><h3>NONE</h3><br>";
}
$sql="CREATE VIEW PG1 AS select DISTINCT Tablem.Code,Tablem.Name,Type,Day,StartTime,EndTime,PrevRoom from Tablem,Tableme where Tablem.Code=Tableme.Code and Type like 'PG1'";
mysql_query($sql,$con);
$sql1=mysql_query("select * from PG1");
$count1=0;
while($row1 = mysql_fetch_array($sql1))
{
	$code[$count1]=$row1['Code'];
	$day[$count1]=$row1['Day'];
	$st[$count1]=$row1['StartTime'];
	$et[$count1]=$row1['EndTime'];
	$name[$count1]=$row1['Name'];
	$pr[$count1]=$row1['PrevRoom'];
	$count1++;
}
$i=0;
$flag1=0;
echo "<h1>CLASHES OCCURED FOR PG1 ARE:</h1>";
while($i<$count1)
{
	$j=$i+1;
	while($j<$count1)
	{
		if($day[$i]===$day[$j] and (($st[$i]<$st[$j] and $et[$i]>$st[$j]) or ($st[$i]<$et[$j] and $et[$i]>$et[$j]) or ($st[$i]>=$st[$j] and $et[$j]>=$et[$i])))
		{
			$flag=1;
			$flag1=1;
			$z1=$code[$i];
			$z2=$name[$i];
			$z3=$day[$i];
			$z4=$st[$i];
			$z5=$et[$i];
			$z6=$pr[$i];
			$aaa="insert into clash values ('$z1','$z2','$z3','$z4','$z5','PG1','$z6')";
			mysql_query($aaa,$con);
			echo "
				<div class='post'>
				<h2 class='title'></h2>
				<table id='box-table-a'>                        
				<thead>
				<tr>
				<th scope='col'>CODE</th>
				<th scope='col'>NAME</th>
				<th scope='col'>DAY</th>
				<th scope='col'>START-TIME</th>
				<th scope='col'>END-TIME</th>
				</tr>
				</thead>
				<tr>
				<td>$z1</td>
				<td>$z2</td>
				<td>$z3</td>
				<td>$z4</td>
				<td>$z5</td>
				</tr>";
			$z1=$code[$j];
			$z2=$name[$j];
			$z3=$day[$j];
			$z4=$st[$j];
			$z5=$et[$j];
			$z6=$pr[$j];
			$aaa="insert into clash values ('$z1','$z2','$z3','$z4','$z5','PG1','$z6')";
			mysql_query($aaa,$con);
			echo"
				<tr>
				<td>$z1</td>
				<td>$z2</td>
				<td>$z3</td>
				<td>$z4</td>
				<td>$z5</td>
				</tr>
				</table>
				<br/>
				</div>
				";
			//			echo $code[$i]." ".$name[$i]." ".$day[$i]." ".$st[$i]." ".$et[$i]."\n";
			//			echo $code[$j]." ".$name[$j]." ".$day[$j]." ".$st[$j]." ".$et[$j]."\n\n\n";
		}
		$j++;
	}
	$i++;
}
if($flag1===0)
{
	echo "<br><h3>NONE</h3><br>";
}
$sql=mysql_query("drop view PG1");
$sql="CREATE VIEW UG2 AS select DISTINCT Tablem.Code,Tablem.Name,Type,Day,StartTime,EndTime,PrevRoom from Tablem,Tableme where Tablem.Code=Tableme.Code and Type like 'UG2'";
mysql_query($sql,$con);
echo "<h1>CLASHES OCCURED FOR UG2 ARE:</h1>";
$i=0;
$sql1=mysql_query("select * from UG2");
$count1=0;
$flag1=0;
while($row1 = mysql_fetch_array($sql1))
{
	$code[$count1]=$row1['Code'];
	$day[$count1]=$row1['Day'];
	$st[$count1]=$row1['StartTime'];
	$et[$count1]=$row1['EndTime'];
	$pr[$count1]=$row1['PrevRoom'];
	$name[$count1]=$row1['Name'];
	$count1++;
}
$i=0;
while($i<$count1)
{
	$j=$i+1;
	while($j<$count1)
	{
		if($day[$i]===$day[$j] and ($pr[$i]===$pr[$j]) and (($st[$i]<$st[$j] and $et[$i]>$st[$j]) or ($st[$i]<$et[$j] and $et[$i]>$et[$j]) or ($st[$i]>=$st[$j] and $et[$j]>=$et[$i])))
		{
			$flag=1;
			$flag1=1;
			if($pr[$i]==="SH2")
			{
				$x="CSE";
			}
			else if($pr[$i]==="101")
			{
				$x="ECE";
			}
			$z1=$code[$i];
			$z2=$name[$i];
			$z3=$day[$i];
			$z4=$st[$i];
			$z5=$et[$i];
			$z6=$pr[$i];
			$aaa="insert into clash values ('$z1','$z2','$z3','$z4','$z5','UG2','$z6')";
			mysql_query($aaa,$con);
			//			echo $code[$i]." ".$name[$i]." ".$day[$i]." ".$st[$i]." ".$et[$i]." ".$x."\n";
			//			echo $code[$j]." ".$name[$j]." ".$day[$j]." ".$st[$j]." ".$et[$j]." ".$x."\n\n\n";
			echo "
				<div class='post'>
				<h2 class='title'></h2>
				<table id='box-table-a'>                        
				<thead>
				<tr>
				<th scope='col'>CODE</th>
				<th scope='col'>NAME</th>
				<th scope='col'>DAY</th>
				<th scope='col'>START-TIME</th>
				<th scope='col'>END-TIME</th>
				<th scope='col'>Type</th>
				</tr>
				</thead>
				<tr>
				<td>$z1</td>
				<td>$z2</td>
				<td>$z3</td>
				<td>$z4</td>
				<td>$z5</td>
				<td>$x</td>
				</tr>";
			if($pr[$j]==="SH2")
			{
				$x="CSE";
			}
			else if($pr[$j]==="101")
			{
				$x="ECE";
			}
			$z1=$code[$j];
			$z2=$name[$j];
			$z3=$day[$j];
			$z4=$st[$j];
			$z5=$et[$j];
			$z6=$pr[$j];
			$aaa="insert into clash values ('$z1','$z2','$z3','$z4','$z5','UG2','$z6')";
			mysql_query($aaa,$con);
			echo"
				<tr>
				<td>$z1</td>
				<td>$z2</td>
				<td>$z3</td>
				<td>$z4</td>
				<td>$z5</td>
				<td>$x</td>
				</tr>
				</table>
				</br>
				</div>
				";
			//		echo $code[$i]." ".$name[$i]." ".$day[$i]." ".$st[$i]." ".$et[$i]." ".$x."\n";
			//		echo $code[$j]." ".$name[$j]." ".$day[$j]." ".$st[$j]." ".$et[$j]." ".$x."\n\n\n";
		}
		$j++;
	}
	$i++;
}
if($flag1===0)
{
	echo "<br><h3>NONE</h3><br>";
}
mysql_query("drop view UG2");
if($flag>0)
{
	echo "  
		<br>
		<br>
		<form action='show.php' method='post'>
		<input type='submit' value='Resolve Clashes'>
		</form>
		";
}
mysql_close($con);
include("footer.php");
?>

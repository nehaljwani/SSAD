<?php include("header.php"); ?>
<div class="post">
<h2 class="title"></h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">CODE</th>
<th scope="col">NAME</th>
<th scope="col">TYPE</th>
</tr>
</thead>
<?php
include('essential.php');
dbconnect();
function temp ()
{
		echo '<script type="text/javascript"> window.location.replace("lectures.php"); </script>';
}
	
$file=fopen($_FILES["file2"]["tmp_name"],"r");
$linecount=0;
$gold=0;
mysql_query("DELETE FROM Tableme");
while(1)
{
	$line = fgets($file);
	$q=strlen($line);
	if($q===0)
	{
	//	temp();
		break;
	}
	if($gold===0)
	{
		$gold++;
		continue;
	}
	$i1=0;
	$co='';
	while($line[$i1]!=',')
	{
		if($line[$i1]!=' ' and $line[$i1]!='"')
		{
			$co=$co.$line[$i1];
		}
		$i1++;
	}
	$i1++;
	$i2=$q-1;
	$z=strrpos($line,"\n");
	if($i2==$z)
	{
		$i2=$i2-1;
	}
	//	$i2=$z-1;
	$ty='';
	while($line[$i2]!=',')
	{
		if($line[$i2]!=' ' and $line[$i2]!='"')
		{
			$ty=$line[$i2].$ty;
		}
		$i2--;
	}
	$na='';
	while($i1<$i2)
	{
		$na=$na.$line[$i1];
		$i1++;
	}
	mysql_query("INSERT INTO Tableme (Code, Name, Type) 
			VALUES ('$co','$na','$ty')");
	//	echo $co." ".$na." ".$ty."\n";
	if($gold%2==0)
	{
		echo"
			<tr>
			<td>$co</td>
			<td>$na</td>
			<td>$ty</td>
			</tr>";
//		sleep(1);
		ob_flush();
		flush();
	}
	else
	{
		echo"
			<tr class=alt>
			<td>$co</td>
			<td>$na</td>
			<td>$ty</td>
			</tr>";
//		sleep(1);
		ob_flush();
		flush();
	}
	$gold++;
}
mysql_close($con);
echo"
</table>
</div>";
include("footer.php");
?>

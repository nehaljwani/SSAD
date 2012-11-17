<?php
include('essential.php');
include("header.php");
include("adminOnly.php");
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
</tr>
</thead>
<?php
function temp ()
{
	echo '<script type="text/javascript"> window.location.replace("lectures.php"); </script>';
}

dbconnect();

$file=fopen($_FILES["file1"]["tmp_name"],"r");
$linecount=0;
$gold=0;
mysql_query("DELETE FROM Tablem"); 
while(1)
{
	$line = fgets($file);
	$q=strlen($line);
	if($q===0)
	{
//		temp();
		break;
	}
	if($gold===0)
	{
		$gold++;
		continue;
	}
	$gold++;
	$i1=$q-1;
	$pr='';
	while($line[$i1]!=',')
	{
		$as=$line[$i1];
		if(($as>='a' && $as<='z') || ($as>='0' && $as<='9') || ($as>='A' && $as<='Z'))
		{
			$pr=$line[$i1].$pr;
		}
		$i1--;
	}
	if($line[0]!=',')
	{
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
		while($line[$i2]!=',')
		{
			$i2--;
		}
		$i2--;
		$z=5;
		$et='';
		while($z>0)
		{
			$et=$line[$i2].$et;
			$i2--;
			$z=$z-1;
		}
		$i2--;
		$z=5;
		$st='';
		while($z>0)
		{
			$st=$line[$i2].$st;
			$i2--;
			$z=$z-1;
		}
		$i2=$i2-1;
		$da='';
		$z=3;
		while($z>0)
		{
			$da=$line[$i2].$da;
			$i2--;
			$z--;
		}
		$na='';
		while($i1<$i2)
		{
			$na=$na.$line[$i1];
			$i1++;
		}
		mysql_query("INSERT INTO Tablem (Code, Name, Day, StartTime, EndTime,PrevRoom) 
			VALUES ('$co','$na','$da','$st','$et','$pr')");
		//		echo $co." ".$na." ".$da." ".$st." ".$et."\n";
		if($gold%2==0)
		{
			echo"
				<tr>
				<td>$co</td>
				<td>$na</td>
				<td>$da</td>
				<td>$st</td>
				<td>$et</td>
				</tr>";
			//			sleep(1);
			ob_flush();
			flush();
		}
		else
		{
			echo"
				<tr class=alt>
				<td>$co</td>
				<td>$na</td>
				<td>$da</td>
				<td>$st</td>
				<td>$et</td>
				</tr>";
			//			sleep(1);
			ob_flush();
			flush();
		}
	}
	else 
	{
		$i=2;
		$da=$line[$i].$line[$i+1].$line[$i+2];
		$st=$line[$i+4].$line[$i+5].$line[$i+6].$line[$i+7].$line[$i+8];
		$i=$i+10;
		$et=$line[$i].$line[$i+1].$line[$i+2].$line[$i+3].$line[$i+4];
		mysql_query("INSERT INTO Tablem (Code, Name, Day, StartTime, EndTime,PrevRoom) 
			VALUES ('$co','$na','$da','$st','$et','$pr')");
		//		echo $co." ".$na." ".$da." ".$st." ".$et."\n";
		if($gold%2==0)
		{
			echo"
				<tr>
				<td>$co</td>
				<td>$na</td>
				<td>$da</td>
				<td>$st</td>
				<td>$et</td>
				</tr>";
			//			sleep(1);
			ob_flush();
			flush();
		}
		else
		{
			echo"
				<tr class=alt>
				<td>$co</td>
				<td>$na</td>
				<td>$da</td>
				<td>$st</td>
				<td>$et</td>
				<tr>
				";
			//			sleep(1);
			ob_flush();
			flush();
		}
	}

}
mysql_close($con);
echo"
	</table>
	</div>";
include("footer.php");
?>




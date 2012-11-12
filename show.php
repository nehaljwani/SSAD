<?php include("header.php"); 
session_start();
echo"
<div class='post'>
<h2 class='title'> Resolve Clashes </h2>
<center>
";
$weeks=array('Mon','Tue','Wed','Thu','Fri','Sat');
include('essential.php');
dbconnect();

$god=0;
echo "<h1>CHANGES FOR UG1 :<h1>";
$flag=0;
$sql=mysql_query("select distinct * from clash where Type='UG1' order by Code");
$pre='a';
while($row=mysql_fetch_array($sql))
{
	$flag=1;
	if($row['Code']!=$pre)
	{
		echo "<br/>";
		$pre=$row['Code'];
		$k=$row['Name'];
		$p=" :";
		echo "<h1 id='mybody'> $pre $k $pi <br/> </h1>";
	}
	$co=$row['Code'];
	$na=$row['Name'];
	$st=$row['StartTime'];
	$et=$row['EndTime'];
	$da=$row['Day'];
	$ot=$row['Others'];
	$dev[$god]=$row['Code'];
	$xx=$row['Others'];
	$my=mysql_query("delete from Tablem where Code='$co' and Name='$na' and Day='$da'and StartTime='$st' and EndTime='$et' and PrevRoom='$xx'");
	echo "
		<form action='over.php' method='post'>
		<select name='$god'>
		";
	foreach($weeks as $val)
	{
		if($val!=$da)
		{
			echo "
				<option value='$val'>" .$val. "</option>
				";
		}
		else
		{
			echo "
				<option selected='selected' value='$val'>" .$val. "</option>
				";
		}
	}
	$god++;
	$dev[$god]=$row['Name'];
	echo "
		</select>
		<input type='text' value='$st' name='$god'>
		";
	$god++;
	if($ot==="CR2")
	{
		$ot="SEC-B";
	}
	else
	{
		$ot="SEC-A";
	}
	echo "
		<input type='text' value='$et' name='$god'>
		$ot
		<br>
		";
	$dev[$god]=$row['Others'];
	$god++;
}
if($flag===0)
{
	echo "NONE<br><br>";
}
$flag1=0;
echo "<br/>";
echo "<h1>CHANGES FOR PG1 :<h1>";
$sql=mysql_query("select distinct * from clash where Type='PG1' order by Code");
$pre='a';
while($row=mysql_fetch_array($sql))
{
	$flag=1;
	$flag1=1;
	if($row['Code']!=$pre)
	{
		echo "<br/>";
		$pre=$row['Code'];
		$k=$row['Name'];
		$p=" :";
		echo "<h1 id='mybody'> $pre $k $pi <br/> </h1>";
//		echo "$pre $k $p<br>";
	}
	$co=$row['Code'];
	$na=$row['Name'];
	$st=$row['StartTime'];
	$et=$row['EndTime'];
	$da=$row['Day'];
	$dev[$god]=$row['Code'];
	$xx=$row['Others'];
	$my=mysql_query("delete from Tablem where Code='$co' and Name='$na' and Day='$da'and StartTime='$st' and EndTime='$et' and PrevRoom='$xx'");
	echo "
		<form action='over.php' method='post'>
		<select name='$god'>
		";
	foreach($weeks as $val)
	{
		if($val!=$da)
		{
			echo "
				<option value='$val'>" .$val. "</option>
				";
		}
		else
		{
			echo "
				<option selected='selected' value='$val'>" .$val. "</option>
				";
		}
	}
	$god++;
	$dev[$god]=$row['Name'];
	echo "
		</select>
		<input type='text' value='$st' name='$god'>
		";
	$god++;
	echo "
		<input type='text' value='$et' name='$god'>
		<br>
		";
	$dev[$god]=$row['Others'];
	$god++;
}
if($flag1===0)
{
	echo "NONE<br><br>";
}
echo "<br/>";
echo "<h1>CHANGES FOR UG2 :<h1>";
$sql=mysql_query("select distinct * from clash where Type='UG2' order by Code");
$pre='a';
$flag1=0;
while($row=mysql_fetch_array($sql))
{
	$flag=1;
	$flag1=1;
	if($row['Code']!=$pre)
	{
		echo "<br/>";
		$pre=$row['Code'];
		$k=$row['Name'];
		$p=" :";
		echo "<h1 id='mybody'> $pre $k $pi <br/> </h1>";
	//	echo "$pre $k $p<br>";
	}
	$co=$row['Code'];
	$na=$row['Name'];
	$st=$row['StartTime'];
	$et=$row['EndTime'];
	$da=$row['Day'];
	$ot=$row['Others'];
	$dev[$god]=$row['Code'];
	$xx=$row['Others'];
	$my=mysql_query("delete from Tablem where Code='$co' and Name='$na' and Day='$da'and StartTime='$st' and EndTime='$et' and PrevRoom='$xx'");
	echo "
		<form action='over.php' method='post'>
		<select name='$god'>
		";
	foreach($weeks as $val)
	{
		if($val!=$da)
		{
			echo "
				<option value='$val'>" .$val. "</option>
				";
		}
		else
		{
			echo "
				<option selected='selected' value='$val'>" .$val. "</option>
				";
		}
	}
	$god++;
	$dev[$god]=$row['Name'];
	echo "
		</select>
		<input type='text' value='$st' name='$god'>
		";
	$god++;
	if($ot==="SH2")
	{
		$ot="CSE";
	}
	else if($ot==="101")
	{
		$ot="ECE";
	}
	else
	{
		$ot="COM";
	}
	echo "
		<input type='text' value='$et' name='$god'>
		$ot
		<br>
		";
	$dev[$god]=$row['Others'];
	$god++;
}
$_SESSION['god1']=$god;
$_SESSION['dev1']=$dev;
if($flag1===0)
{
	echo "NONE<br><br>";
}
if($flag>0)
{
	echo "
		<br>
		<br>
		<input type='submit' value='change'>
		";
}
mysql_query("drop table clash");
echo
"
</form>
</center>
</div>
";
include('footer.php');
?>

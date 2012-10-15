<?php
$con = 0;
function dbconnect(){
	GLOBAL $con;
	$con = mysql_connect('localhost','root','abcdabcd');
	if(!$con){
		die("no connection");
	}
	else {
		$rv=mysql_select_db('project',$con) or die( "Unable to select database");

		if(!$rv){
			die("klno database!");
		}

	}
}
function paginate($file,$myquery,$start,$lim)
{
	
	$query1 = $myquery;
	 GLOBAL $con;
	 if($con==0)       //for connecting db
	dbconnect();
	$result=mysql_query($myquery,$con);      //take query result
	$num = mysql_numrows($result);
	if($num == 0)                    // check if empty
	{
		return $result;
	}
	$back = $start - $lim;                            //back and next
	$next = $start + $lim;
	$query2= $myquery." limit ".$start.",".$lim;        //for limiting printing
	$result2=mysql_query($query2,$con);

	echo mysql_error();
	$index = 1;
	if($num > $lim){		// display links only if records are enuf.
		if($back >=0){
			echo"<a href='".$file."?st=".$back."'>PREV</a>"; //pre page print
		}

		for($i=0;$i<$num;$i=$i+$lim){
			if($i != $start){

			echo" <a href='".$file."?st=".$i."'>"; //for next page print
			echo ' '.$index;                          
			echo "</a>";
			}
			else{
				echo ' ';
				echo $index;
			}
			$index = $index + 1;
		}
		if($next < $num){
			echo" <a href='".$file."?st=".$next."'> NEXT</a>";  //next button referencing
		}
	}
	return $result2;
}
?>

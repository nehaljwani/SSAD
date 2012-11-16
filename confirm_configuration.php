<?php
include("essential.php");

$i=0;
while($i<5){
	$startDate='ta'.$i.'1';
	$source='ta'.$i.'0';
	$endDate='ta'.$i.'2';
echo "$_POST[$startDate]</br>$i";
 $query5 = "update Configuration set startDate='".$_POST[$startDate]."'  where name='".$_POST[$source]."';";
                 $rv=execute($query5);
		if(!$rv)
		{
			mysql_error();
		}
 $query5 = "update Configuration set endDate='".$_POST[$endDate]."'  where name='".$_POST[$source]."';";
                 $rv=execute($query5);
		if(!$rv)
		{
			mysql_error();
		}
		 $i++;
}
if(isset($_POST['limit'])){
	$query="UPDATE Limits set Days='".$_POST['Days']."' WHERE Name='".$_POST['Name']."'";
	execute($query);
	header("Location:configuration.php?msg='Limit Updated Successfully'");
}
header("Location:configuration.php?msg='Configutration Updated Successfully'");

?>

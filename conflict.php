<?php
function conflict($ar1,$ar2)
{
	$t1='evenStartTime';
	$t2='evenEndTime';
	$d1='evenStartDate';
	$d2='evenEndDate';
		//when Req1 start_date > Req2 start_date and Req1 End date < Req2 end_date
	if($ar1[$d1]>=$ar2[$d1] and $ar1[$d2]<=$ar2[$d2] and $ar1[$d1]<=$ar2[$d2]  and $ar1[$d2]>=$ar2[$d1] )
	{	
		//when Req1 start_time > Req2 start_time and Req1 End time < Req2 End_time
		if($ar1[$t1]>=$ar2[$t1] and $ar1[$t2]<=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){ 
			return 0;
		}
		//when Req1 start time < req2 start_time and req1 end_time < req2 end_time
		else if($ar1[$t1]<=$ar2[$t1] and $ar1[$t2]<=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){
			return 0;
		}
			//when req1start_time > req2 start_time and req1_end_time > req2 end_time
		else if($ar1[$t1]>=$ar2[$t1] and $ar1[$t2]>=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){	
			return 0;
		}
		//when Req2 start_time > Req1 start_time and Req2 End time < Req1 End_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){  
			return 0;
		}
		//when Req2 start time < req1 start_time and req2 end_time < req1 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req2 start_time > req1 start_time and req2_end_time > req1 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
	}
		//when Req1 start_date < Req2 start_date and Req1 End date < Req2 end_date
	else if($ar1[$d1]<=$ar2[$d1] and $ar1[$d2]<=$ar2[$d2] and $ar1[$d1]<=$ar2[$d2]  and $ar1[$d2]>=$ar2[$d1] )
	{	
		//when Req1 start_time > Req2 start_time and Req1 End time < Req2 End_time
		if($ar1[$t1]>=$ar2[$t1] and $ar1[$t2]<=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){ 
			return 0;
		}
		//when Req1 start time < req2 start_time and req1 end_time < req2 end_time
		else if($ar1[$t1]<=$ar2[$t1] and $ar1[$t2]<=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){	
			return 0;
		}
			//when req1start_time > req2 start_time and req1_end_time > req2 end_time
		else if($ar1[$t1]>=$ar2[$t1] and $ar1[$t2]>=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){	
			return 0;
		}
		//when Req2 start_time > Req1 start_time and Req2 End time < Req1 End_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req2 start time < req1 start_time and req2 end_time < req1 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req2 start_time > req1 start_time and req2_end_time > req1 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
	}
		//when Req1 start_date < Req2 start_date and Req1 End date > Req2 end_date
	else if($ar1[$d1]>=$ar2[$d1] and $ar1[$d2]>=$ar2[$d2] and $ar1[$d1]<=$ar2[$d2]  and $ar1[$d2]>=$ar2[$d1] ){	
		//when Req1 start_time > Req2 start_time and Req1 End time < Req2 End_time
		if($ar1[$t1]>=$ar2[$t1] and $ar1[$t2]<=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){ 
			return 0;
		}
		//when Req1 start time < req2 start_time and req1 end_time < req2 end_time
		else if($ar1[$t1]<=$ar2[$t1] and $ar1[$t2]<=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){	
			return 0;
		}
			//when req1start_time > req2 start_time and req1_end_time > req2 end_time
		else if($ar1[$t1]>=$ar2[$t1] and $ar1[$t2]>=$ar2[$t2] and $ar1[$t1]<=$ar2[$t2]  and $ar1[$t2]>=$ar2[$t1] ){	
			return 0;
		}
		//when Req2 start_time > Req1 start_time and Req2 End time < Req1 End_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req2 start time < req1 start_time and req2 end_time < req1 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req2 start_time > req1 start_time and req2_end_time > req1 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
	}
		//when Req1 start_date > Req2 start_date and Req1 End date < Req2 end_date
	else if($ar2[$d1]>=$ar1[$d1] and $ar2[$d2]<=$ar1[$d2] and $ar2[$d1]<=$ar1[$d2]  and $ar2[$d2]>=$ar1[$d1] )
	{		
		//when Req1 start_time > Req2 start_time and Req1 End time < Req2 End_time
		if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req1 start time < req2 start_time and req1 end_time < req2 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req1start_time > req2 start_time and req1_end_time > req2 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
		//when Req2 start_time > Req1 start_time and Req2 End time < Req1 End_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req2 start time < req1 start_time and req2 end_time < req1 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req2 start_time > req1 start_time and req2_end_time > req1 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
	}
		//when Req1 start_date > Req2 start_date and Req1 End date > Req2 end_date
	else if($ar2[$d1]<=$ar1[$d1] and $ar2[$d2]<=$ar1[$d2] and $ar2[$d1]<=$ar1[$d2]  and $ar2[$d2]>=$ar1[$d1] ){	
		//when Req1 start_time > Req2 start_time and Req1 End time < Req2 End_time
		if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req1 start time < req2 start_time and req1 end_time < req2 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req1start_time > req2 start_time and req1_end_time > req2 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
		//when Req2 start_time > Req1 start_time and Req2 End time < Req1 End_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req2 start time < req1 start_time and req2 end_time < req1 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req2 start_time > req1 start_time and req2_end_time > req1 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
	}
		//when Req1 start_date < Req2 start_date and Req1 End date < Req2 end_date
	else if($ar2[$d1]>=$ar1[$d1] and $ar2[$d2]>=$ar1[$d2] and $ar2[$d1]<=$ar1[$d2]  and $ar2[$d2]>=$ar1[$d1] ){	
		//when Req1 start_time > Req2 start_time and Req1 End time < Req2 End_time
		if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req1 start time < req2 start_time and req1 end_time < req2 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req1start_time > req2 start_time and req1_end_time > req2 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
		//when Req2 start_time > Req1 start_time and Req2 End time < Req1 End_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){ 
			return 0;
		}
		//when Req2 start time < req1 start_time and req2 end_time < req1 end_time
		else if($ar2[$t1]<=$ar1[$t1] and $ar2[$t2]<=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
			//when req2 start_time > req1 start_time and req2_end_time > req1 end_time
		else if($ar2[$t1]>=$ar1[$t1] and $ar2[$t2]>=$ar1[$t2] and $ar2[$t1]<=$ar1[$t2]  and $ar2[$t2]>=$ar1[$t1] ){	
			return 0;
		}
	}
	return 1; //when confilct 0 and not confilct 1
}
$ar1=array(4 => 1);
$ar2=array(5 => 2);
$ar1['evenStartDate']='1999-10-11';
$ar1['evenStartTime']='08:21';
$ar1['evenEndDate']='1999-10-15';
$ar1['evenEndTime']='08:28';
$ar2['evenStartDate']='1999-11-10';
$ar2['evenStartTime']='08:23';
$ar2['evenEndDate']='1999-11-14';
$ar2['evenEndTime']='08:30';
	$t1='evenStartTime';
	$t2='evenEndTime';
	$d1='evenStartDate';
	$d2='evenEndDate';
$result=conflict($ar2,$ar1);
if($ar1[$t1]<=$ar2[$t1]){
echo "kapiliii$result</br>";}
?>

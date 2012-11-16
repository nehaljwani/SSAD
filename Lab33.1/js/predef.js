$(document).ready(function(){
		$('select').each(function(){  
			$(this).change(function(){    
				$room=$(this).val();         
				$batch=$(this).attr('name');         
				$('select').each(function(){        
					$(this).children(':not(#'+$batch+')').each(function(){
						if($(this).attr('id')==$room){
						$(this).hide();
						}
					})
				})               
			}) 
		})

		$room_values=[];
		for($i=1;$i<=$('select').length;$i++){ $room_values.push($('select').first().children(':nth-child('+$i+')').val()) }
			$i=0;
			$('select').each(function(){
				$(this).children().first().val($room_values[$i]);
				$(this).children().first().html($room_values[$i++]);
			})
})

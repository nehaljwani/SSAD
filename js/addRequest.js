$(document).ready(function() {
		$('#switchAlias').click(function() {
			if($('#switchAlias').is(':checked')){
			}
			else{
				$('#CP1').val($('#P1').val());
				$('#CP2').val($('#P2').val());
				$('#CP3').val($('#P3').val());
			}
		});
		$('#buildingName').change(function() {
			$building=($('#buildingName').val());
			$("select.room").children(':not(#'+$building+')').css('display','none');
			$("select.room").children('#'+$building).css('display','inline');
		});
			function t2s(time) {
				    time = time.split(/:/);
				        return time[0] * 3600 + time[1] * 60 + time[2];
			}
		$('#eventStartTime').change(function() {
/*			$('#eventEndTime').children().each(function(){ 
				if(parseInt(t2s($(this).val()))<=parseInt(t2s($('#eventStartTime').val()))){
					$(this).css('display','none');
				} 
				else{
					$(this).css('display','inherit');
				}
			});
*/
//			$('#eventEndTime :nth-child(4)').attr('selected', 'selected') // To select via index
			$("#eventEndTime").get(0).selectedIndex=($("#eventStartTime").get(0).selectedIndex+1)%48;

		});
});

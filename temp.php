<?php require_once('essential.php'); ?>
<?php require_once('header.php'); ?>
<div class="post">
  <h2 class="title"><a href="#">Welcome to TrendyBiz </a></h2>
  <div class="entry">
  <script language=javascript>
  $(document).ready(function(){
		$('#prop').children().children().each(function(){    $(this).hide()   })
		$('#e1').hover(function(){ 
			$('#prop').children().children().each(function(){    $(this).hide()   })
			$('.1p').show()    
		})
		$('#e2').hover(function(){ 
			$('#prop').children().children().each(function(){    $(this).hide()   })
			$('.2p').show()    
		})
		$('#e3').hover(function(){ 
			$('#prop').children().children().each(function(){    $(this).hide()   })
			$('.3p').show()    
		})
		$('#e4').hover(function(){ 
			$('#prop').children().children().each(function(){    $(this).hide()   })
			$('.4p').show()    
		})
	})
  </script>
  <table border=1 id="head" style="display:inline">
  	<tr>
		<td id=e1>1st Entry</td>
	</tr>
  	<tr>
		<td id=e2>2nd Entry</td>
	</tr>
  	<tr>
		<td id=e3>3rd Entry</td>
	</tr>
  	<tr>
		<td id=e4>4th Entry</td>
	</tr>
  </table>
  <table border=1 id="prop" style="display:inline">
  	<tr class='1p'><td >1: Prop1</td></tr>
  	<tr class='1p'><td >1: Prop2</td></tr>
  	<tr class='1p'><td >1: Prop3</td></tr>
  	<tr class='1p'><td >1: Prop4</td></tr>
  	<tr class='2p'><td >2: Prop1</td></tr>
  	<tr class='2p'><td >2: Prop2</td></tr>
  	<tr class='2p'><td >2: Prop3</td></tr>
  	<tr class='2p'><td >2: Prop4</td></tr>
  	<tr class='3p'><td >3: Prop1</td></tr>
  	<tr class='3p'><td >3: Prop2</td></tr>
  	<tr class='3p'><td >3: Prop3</td></tr>
  	<tr class='3p'><td >3: Prop4</td></tr>
  	<tr class='4p'><td >4: Prop1</td></tr>
  	<tr class='4p'><td >4: Prop2</td></tr>
  	<tr class='4p'><td >4: Prop3</td></tr>
  	<tr class='4p'><td >4: Prop4</td></tr>
  </table>
  </div>
</div>
.<?php require_once('footer.php'); ?>

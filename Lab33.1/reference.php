<?php require_once('essential.php'); ?>
<?php require_once('header.php'); ?>
<div class="post">
  <h2 class="title">Welcome to TrendyBiz </h2>
  <div class="entry">
  	<ul id = "tab-group">
	<li class="one active">Item 1 </li>
	<li class="two">Item 2 </li>
	<li class="three">Item 3 </li>
	</ul>
  </div>
  <div id="content">
	<div class="one">
		Div 1
	</div>
	<div class="two" style="display: none">
		Div 2
	</div>
	<div class="three" style="display: none">
		Div 3
	</div>

  </div>
</div>
<script type="text/javascript">
function switchTab(event){
	$(this).addClass('active').siblings().removeClass('active');
	var classes = $(this).attr('class');
	var classArray = classes.split(" ");
	var classNumber = classArray[0];
	var div = ["div#content div.", classNumber].join("");
	console.log(div);
	$(div).show().siblings().hide();

}
$('ul#tab-group li').on('click', switchTab);
</script>
<?php require_once('footer.php'); ?>

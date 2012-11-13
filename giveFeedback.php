<?php include "essential.php"; ?>
<?php include_once('header.php');?>
<script type='text/javascript' src='js/livevalidation_standalone.js'></script>
<div class="post">
<h2 class="title"><a href="#">Provide Feedback</a></h2>
<!--p class="meta">
<span class="date">September 12, 2012</span>
<span class="posted">Posted by <a href="#">Someone</a></span>
</p-->
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<form id="info" method="post" action='confirm_feedback.php'>
<table id="">	
<tr>
<td>Name</td>
<td><input type="text" name="name" id="name"></td>
</tr>
<tr>
<td>E-Mail</td>
<td><input type="text" name="email" id="email" value="<?php echo phpCAS::getUser(); ?>" READONLY></td>
</tr>
<tr>
<td valign="top">Feedback</td>
<td><textarea rows="8" cols="40" name="Feedback" id='feedback'></textarea></td>
</tr>
</table>	
<script type="text/javascript">
var f21 = new LiveValidation('name');
f21.add( Validate.Presence );
var f11 = new LiveValidation('feedback');
f11.add(Validate.Presence);
</script>
<?php
require_once("recaptchalib.php");
$publickey = "6LfA-NgSAAAAAI9-J_Llw-K2OkhfZxSzJy0IElfM";
echo recaptcha_get_html($publickey);
?>

<input type="submit" name="submit" value="Submit">
<!--p class="links">	
<a href="#" class="more">Read More</a>
<a href="#" title="b0x" class="comments">Comments</a>
</p-->
</form>	
</div>
</div>
<?php include_once('footer.php'); ?>

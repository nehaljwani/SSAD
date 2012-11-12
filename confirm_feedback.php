<?php include "essential.php";
  require_once("recaptchalib.php");
    $privatekey = "6LfA-NgSAAAAAPN9GjdtA6RG4MJdeS_We5sHpkAz";
      $resp = recaptcha_check_answer ($privatekey,
		                   $_SERVER["REMOTE_ADDR"],
				   $_POST["recaptcha_challenge_field"],
				   $_POST["recaptcha_response_field"]);

  	if (!$resp->is_valid) {
	      // What happens when the CAPTCHA was entered incorrectly
	      die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
			               "(reCAPTCHA said: " . $resp->error . ")");
	        } else {
			    
			  

session_start();
$email=$_SESSION['email'];
$name=$_POST['name'];
$comment=$_POST['Feedback'];
$query = "insert into Feedback_Form(Name,Email_id,Comment) values('$name','$email','$comment')".";";
$rv=execute($query);
if(!$rv)
{
	die('Error: ' . mysql_error());
}
else
{
	header("Location:giveFeedback.php");
}
}
?>

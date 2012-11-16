<?php include "essential.php";?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <title>Progress Bar</title>
</head>
<body>
<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php
// Total processes
courseToInstance();
 
// Tell user that the process is completed
echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
echo str_repeat(' ',1024*64);
flush(); 
sleep(2);
echo '<script language="javascript">window.location.replace("display.php")</script>';
echo str_repeat(' ',1024*64);
flush(); 
?>
</body>
</html>


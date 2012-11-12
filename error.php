<?php
include_once("essential.php");
require_once("header.php");
if($_GET['msg'])
{
echo "<h2 class='center'>".$_GET['msg']."</h2>";
}
include_once("footer.php");
?>


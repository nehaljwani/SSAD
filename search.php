<?php
require_once('essential.php');
require_once('header.php');
echo "<h2 class='center' style='text-transform:none;'><b>Advanced Search Options : </b></h2>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<table ><tr>";
echo " <td> <a class='button green' href='eventsdate.php'> Search Based on Date </a></td>
        <td> <a class='button red1' href='eventstype.php'> Search Based on event type </a></td>
        <td> <a class='button orange1' href='eventslocation.php'> Search Based on location </a></td>
        <td> <a class='button black1' href='eventskey.php'> Search Based on keywords </a></td>";
echo "</tr></table>";
include "footer.php";
?>

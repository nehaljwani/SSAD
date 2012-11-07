<?php
include("essential.php");
dbconnect();
require_once('header.php');
$q = "select * from Building;";
$r = execute($q);
$morstrt='08:00:00';
$morend='13:00:00';
$evestrt='14:00:00';
$eveend='22:00:00';
$m = "morning";
$e = "evening";
$time = time();
echo "<div class='post'>";
echo "<h2 class='title'>Click on the respective buildings for availablity status :</h2>";
echo "<br/>";
echo "<div class='entry'>";
echo "<table>";
echo "<tr>";
while($result = mysql_fetch_assoc($r))
{

        echo "
                <td><a class='button orange' href = 'nhome.php?m=".$m."&start_time=".$morstrt."&date=" . date("d-M-y",strtotime("+0 day",$time))."&end_time=".$morend."&building_id=".$result['buildId']."'>".$result['buildingName']."</a></td>";
}
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "<br/>";
require_once('footer.php');
?>

<?php// require_once('header.php'); ?>
<!--<div class="post">-->
<?php //echo $boxMsg; ?>
<!--<h2 class="title">login</h2>
        <div class="entry">
        <form name="login" method="post" action="login.php">
        <table>
        <tr>
                <td>Username</td>
                <td><input type="text" name="id"></td>
        </tr>
        <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
        </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
        </form>
        </div>
</div>-->
<?php //require_once('footer.php'); ?>

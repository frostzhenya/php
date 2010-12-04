<?php

require_once ('conf.php');
mysql_selectdb ("$rdb");
mysql_connect ("$dbip:$dbport","$dblogin","$dbpass");
$fp = @fsockopen ("$ip","$gameport",$errno,$errstr,1);
if ($fp)
echo "<center><b>Сервер</b><img src='img/on.gif' style='margin:5px' align='middle' />";
else
echo "<center><b>Сервер</b><img src='img/off.gif' style='margin:5px' align='middle' />";

?>

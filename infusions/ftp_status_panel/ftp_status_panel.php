<?php
/*---------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: user_info_panel.php
| Author: Nick Jones (Digitanium)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+
| Modified ftp_status_panel
| for php-fusion v.7.0.x
| ftp_status_panel - ver. 2.0
| Powered by modEx  © 2008
+--------------------------------------------------------+*/

if (!defined("IN_FUSION")) { die("Access Denied"); };

$moddir= INFUSIONS."ftp_status_panel/";

if (file_exists($moddir."locale/".$settings['locale'].".php")) {
	include $moddir."/locale/".$settings['locale'].".php";
  } else {
	include $moddir."/locale/Russian.php";
  }

function check_ftp_status($ip, $port, $timeout)
{
  global $moddir;
  $ftp=ftp_connect($ip,$port,$timeout);
   if (!$ftp) {
      return "<img src=".$moddir."images/off.gif  alt='Offline' border=0>&nbsp;<a href='ftp://".$ip."/'>$ip</a><br>\n";
    } else {
      ftp_close($ftp);
      return "<img src=".$moddir."images/on.gif  alt='Online!' border=0>&nbsp;<a href='ftp://".$ip."/'>$ip</a><br>\n";
    }
}
openside($locale['fsp00']);
$sql = dbquery("SELECT * FROM ".$db_prefix."ftp_status");
//print "<table cellspacing='0' cellpadding='0'>\n";
if (dbrows($sql) != 0) {
   while($data = dbarray($sql))
   {
  echo "".check_ftp_status($data['ftp_ip'], $data['ftp_port'], $data['ftp_timeout'])."";
   }
} else {
echo "<tr><td><center>".$locale['fsp08']."<center></td></tr>";
}
//print "</table>\n";
closeside();
?>
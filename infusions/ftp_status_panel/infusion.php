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

if (!defined("IN_FUSION")) { die("Access Denied"); }

if (file_exists(INFUSIONS."ftp_status_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."ftp_status_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."ftp_status_panel/locale/English.php";
}


$inf_title = $locale['fsp15'];
$inf_description = $locale['fsp16'];
$inf_version = "2.0";
$inf_developer = "modEx";
$inf_email = "mod@krastalk.ru";
$inf_weburl = "http://mod.rastrnet.ru/";

$inf_folder = "ftp_status_panel";
$inf_admin_image = "infusion_panel.gif";
$inf_admin_panel = "ftp_status_admin.php";

$inf_adminpanel[1] = array(
	"title" => "ftp_status_panel",
	"image" => "infusion_panel.gif",
	"panel" => "ftp_status_admin.php",
	"rights" => "FSTP"
);



$inf_newtable[1] = $db_prefix."ftp_status (
  ftp_id smallint(5) unsigned NOT NULL auto_increment,
  ftp_ip varchar(255) NOT NULL default '',
  ftp_port varchar(255) NOT NULL default '',
  ftp_timeout varchar(255) NOT NULL default '',
  PRIMARY KEY  (ftp_id)
  ) TYPE = MyISAM;";

$inf_droptable[1] = $db_prefix."ftp_status;";

?>